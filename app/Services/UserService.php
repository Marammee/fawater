<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAll();
    }

    public function createUser($data)
    {
        if (isset($data['password']))
            $data['password'] = Hash::make($data['password']);

        $role = \App\Models\Role::where('name', $data['role'])->first();

        if (!$role) {
            throw new \Exception("Role '{$data['role']}' not found.");
        }

        return $this->userRepository->create($data);
    }

    public function getUserById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function updateUser($data,  $id)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        // update image profile
        // if (isset($data['profile_photo_path'])) {
        return $this->userRepository->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }
}
