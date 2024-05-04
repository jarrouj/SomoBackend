<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show_user()
    {
        $user = User::latest()->paginate(10);

        return view('admin.user.show_users', compact('user'));
    }

    public function update_user($id)
    {
        $user = User::find($id);

        return view('admin.user.update_user', compact('user'));
    }

    public function update_user_confirm(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;

        $user->save();

        return redirect('/admin/show_user')->with('message', 'User Updated');
    }

    public function delete_user($id)
    {
        $user = user::find($id);

        $user->delete();

        return redirect()->back()->with('message', 'User Deleted');
    }
}
