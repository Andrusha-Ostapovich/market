<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        return view('user.my.index', [
            'user' => $user
        ]);
    }
    public function edit()
    {
        $user = auth()->user();
        return view('user.my.edit', [
            'user' => $user
        ]);
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(
            'name',
            'email',
            'password'
        ));
        $user->mediaManage($request);
        return redirect()->route('my');
    }
}
