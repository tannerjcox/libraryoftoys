<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\User;

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
        return view('admin.users.index')->with([
            'users' => User::all()
        ]);
    }

    /**
     * Show a list of user products.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function products($id)
    {
        $user = User::find($id);

        return view('admin.users.products')->with([
            'user' => $user
        ]);
    }

    /**
     * Show a list of users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admins()
    {
        return view('admin.users.index')->with([
            'users' => User::admins()->get()
        ]);
    }

    public function adminsJson()
    {
        return response()->json([
            'admins' => User::admins()->get(['name', 'email', 'created_at'])
        ]);
    }

    /**
     * Edit a user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.edit');
    }

    /**
     * Store a user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin == 'on'
        ]);

        return \Redirect::route('users.edit', $user->id)->with([
            'user' => $user
        ]);
    }

    /**
     * Edit a user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Edit a user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->is_admin = $request->is_admin == 'on';
        $user->save();

        return \Redirect::route('users.edit', $user->id)->with([
            'user' => $user,
            'success' => true,
            'message' => 'Success'
        ]);
    }
}
