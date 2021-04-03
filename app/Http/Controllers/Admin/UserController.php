<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function profile()
    {
        return view('pages.admin.profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('pages.admin.profile', array('user' => Auth::user()));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles === 1) {
            $items = User::all();

            return view('pages.admin.user.index', [
                'items' => $items
            ]);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->roles === 1) {
            $users = User::all();

            return view('pages.admin.user.create', [
                'users' => $users
            ]);
        } else {
            return abort(404);
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if (Auth::user()->roles === 1) {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);

            User::create($data);
            return redirect()->route('user.index')
                ->with('success', 'Data berhasil ditambah');
        } else {
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->roles === 1) {
            $item = User::findOrFail($id);

            return view('pages.admin.user.edit', ['item' => $item]);
        } else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->roles === 1) {
            $data = $request->all();

            $item = User::findOrFail($id);

            $item->update($data);

            return redirect()->route('user.index')
                ->with('success', 'Data berhasil diedit');
        } else {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->roles === 1) {
            $item = User::findOrFail($id);
            $item->delete();
            return redirect()->route('user.index')
                ->with('success', 'Data berhasil dihapus');
        } else {
            return abort(404);
        }
    }
}
