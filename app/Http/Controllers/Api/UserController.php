<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(protected UserService $userService)
    {
    }

    // Get all users
    public function index()
    {
        $users = $this->userService->getAllUsers();
        if ($users->isEmpty()) {
            return ApiResponse::notFound('No users found');
        }
        return ApiResponse::show(UserResource::collection($users), 'Users fetched successfully');
    }

    // Get a specific user
    public function show($id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return ApiResponse::notFound('User not found');
        }
        return ApiResponse::show(new UserResource($user), 'User fetched successfully');
    }

    // Create a new user
    public function register(StoreUserRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();

        if (empty($validatedData)) {
            return ApiResponse::validationError('Validation error', $validatedData);
        }

        $user = $this->userService->createUser($validatedData);

        if (!$user) {
            return ApiResponse::error('Failed to create user');
        }
        // Generate API token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Attach the token to the user object (optional)
        $user->api_token = $token;

        // Return success response with user resource and token
        return ApiResponse::created(['token' => $user->api_token], 'User created successfully');
    }

    // Login a user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;
            $user->api_token = $token;
            return ApiResponse::show(['token' => $user->api_token], 'Login successful');
        }
        return ApiResponse::unauthorized('Invalid email or password');
    }

    // Logout a user
    public function logout(Request $request)
    {
        if (!auth()->check()) {
            return ApiResponse::unauthorized('User not authenticated');
        }
        $request->user()->currentAccessToken()->delete();

        return ApiResponse::deleted('Logged out successfully');
    }

    // Update a user
    public function update(UpdateUserRequest $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validated();

        if (empty($validatedData)) {
            return ApiResponse::validationError($validatedData, 'Validation error');
        }

        $user = $this->userService->updateUser($validatedData, $id);

        if (!$user) {
            return ApiResponse::error('Failed to update user');
        }

        return ApiResponse::updated(new UserResource($user), 'User updated successfully');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return ApiResponse::notFound('User not found');
        }

        $this->userService->deleteUser($id);

        return ApiResponse::deleted('User deleted successfully');
    }
}
