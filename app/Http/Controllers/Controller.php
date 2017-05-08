<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $days = Input::get('days');
        $start = Carbon::now()->subDays($days ?: 7);

        for ($i = 0 ; $i <= $days; $i++) {
            $dates[$i]['x'] = $start->copy()->addDays($i)->toDateString();
            $dates[$i]['y'] = 0;
        }
        $dates = json_encode($dates);
        $userCount = DB::table('users')->select(DB::raw('date(created_at) as x'), DB::raw('count(*) as y'))->where('created_at', '>=', $start)->groupBy('x')->get()->toJson();
        $productCount = DB::table('products')->select(DB::raw('date(created_at) as x'), DB::raw('count(*) as y'))->where('created_at', '>=', $start)->groupBy('x')->get()->toJson();
        if (Auth::user()->isAdmin()) {
            return view('admin.dashboard')->with([
                'newUsers' => $userCount,
                'newProducts' => $productCount,
                'dates' => $dates
            ]);
        }

        return view('vendors.dashboard');
    }
}
