<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller 
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
            // Інші поля користувача
        ]);
        $user->mediaManage($request);
        // if ($request->hasFile('image')) {
        //     $user->addMedia($request->file('image'))->toMediaCollection('profile');
        // }
 
     
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(UserRequest $request, $id)
    {
        /** @var User $user */
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            // Додайте інші поля, які ви хочете оновити
            
        ]);      
        $user->mediaManage($request); 
        // if ($request->hasFile('image')) {
        //     $user->addMedia($request->file('image'))->toMediaCollection('profile');
        // }
    
        return redirect()->route('users.index');
    // Перенаправте користувача на список користувачів
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
