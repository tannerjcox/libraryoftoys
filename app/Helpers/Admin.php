<?php

if (!function_exists('active_link_to_route')) {
    function active_link_to_route($name, $title, $parameters = [], $attributes = [], $conditions = null)
    {
        $active = false;
        if (Route::currentRouteName() == $name) {
            $active = true;
        }

        if ($parameters) {
            $activeRoute = Route::getCurrentRoute();
            foreach ($parameters as $key => $value) {
                $activeRoute_key = $activeRoute->parameter($key);
                $input_key = Illuminate\Support\Facades\Input::get($key);
                if ($input_key != $value && $activeRoute_key != $value && ($input_key !== null || $activeRoute_key !== null)) {
                    $active = false;
                }
            }
        }
        return '<li' . ($active == true ? ' class="active"' : '') . '>' . link_to_route($name, $title, $parameters, $attributes) . '</li>';
    }
}

if (!function_exists('prettyDate')) {
    function prettyDate(\Carbon\Carbon $date, $type = null)
    {
        if ($date) {
            if($type == 'time') {
                return $date->format('F j, Y h:i A');
            } elseif($type == 'short') {
                return $date->format('M j, \'y');
            }
            return $date->format('F j, Y');
        }
        return '';
    }
}

if (!function_exists('formatMoney')) {
    function formatMoney($price, $decimals = 2)
    {

        if ($price) {
            return '$' . number_format((double) $price, $decimals);
        }
        return '';
    }
}
