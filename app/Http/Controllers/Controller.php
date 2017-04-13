<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $currentUser;

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
        $userCount = DB::table('users')->select(DB::raw('date(created_at) as x'), DB::raw('count(*) as y'))->groupBy('x')->get()->toJson();
        $productCount = DB::table('products')->select(DB::raw('date(created_at) as x'), DB::raw('count(*) as y'))->groupBy('x')->get()->toJson();
        if (Auth::user()->isAdmin()) {
            return view('admin.dashboard')->with([
                'newUsers' => $userCount,
                'newProducts' => $productCount
            ]);
        }

        return view('vendor.dashboard');
    }
}
