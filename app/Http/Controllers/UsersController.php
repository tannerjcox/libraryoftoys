<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * Show a list of users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::user()->isAdmin()) {
            return view('users.index')->with([
                'users' => User::all()
            ]);
        } else {
            return Redirect::route('home');
        }
    }
    /**
     * Show a list of users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        if(Auth::user()->isAdmin() || $user->id == Auth::user()->id) {
            return view('users.edit')->with([
                'user' => $user
            ]);
        } else {
            return Redirect::route('home');
        }
    }
}
