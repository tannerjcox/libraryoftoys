<?php
use Illuminate\Support\Facades\Input;

if (!function_exists('active_link_to_route')) {
    function active_link_to_route($url, $title, $parameters = [], $attributes = [], $conditions = null)
    {
        $active = false;
        if (Route::currentRouteName() == $url) {
            $active = true;
        }

        if ($parameters) {
            $activeRoute = Route::getCurrentRoute();
            foreach ($parameters as $key => $value) {
                $activeRoute_key = $activeRoute->parameter($key);
                $input_key = Input::get($key);
                if ($input_key != $value && $activeRoute_key != $value && ($input_key !== null || $activeRoute_key !== null)) {
                    $active = false;
                }
            }
        }
        return '<li' . ($active == true ? ' class="active"' : '') . '>' . link_to_route($url, $title, $parameters, $attributes) . '</li>';
    }
}