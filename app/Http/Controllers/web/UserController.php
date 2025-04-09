<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->userService->createUser($request->all());
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        return view('admin.users.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->userService->updateUser($request->all(), $id);
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function edit($id)
    {
        $user = $this->userService->getUserById($id);
        return view('admin.users.edit', compact('user'));
    }
}
