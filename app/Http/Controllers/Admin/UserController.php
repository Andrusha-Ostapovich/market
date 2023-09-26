<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $query = User::query();

        $name = $request->input('name');
        $email = $request->input('email');
        $roles = $request->input('role', []);
        $date = $request->input('date');
        $sortField = $request->input('sort', 'name');

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($email) {
            $query->where('email', 'like', '%' . $email . '%');
        }

        if (!empty($roles)) {
            $query->whereIn('role', $roles);
        }

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        if ($request->has('reset_sort')) {
            $users = $query->latest()->paginate(10);
        } else {
            $users = $query->orderBy($sortField)->paginate(10);
        }

        return view('admin.users.index', compact('users','roles'));
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


        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function edit($id)
    {
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

        return redirect()->route('admin.users.index');
        // Перенаправте користувача на список користувачів
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
    public function showProfile(User $user)
    {
        $user = Auth::user();

        return view('admin.profile.index', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }
    public function updateProfile(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        $user->mediaManage($request);
        return redirect()->route('profile');
    }
    public function testPolicy(User $user)
    {

        if (Gate::allows('view', $user)) {
            // Користувач з роллю "seller" має доступ
            return view('user.leyouts.index', compact('user'));
        } else {
            // Інші користувачі не мають доступу
            abort(403);
        }
    }
}
