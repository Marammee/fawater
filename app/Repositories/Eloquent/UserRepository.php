<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private User $user)
    {
    }
    public function getAll()
    {
        return $this->user->all();
    }

    public function findById($id)
    {
        return $this->user->find($id);
    }

    public function create($data)
    {
        $user = $this->user->create($data);

        $user->addRole($data['role']);

        return $user;
    }

    public function update($id, $data)
    {
        $user = $this->findById($id);
        
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = $this->findById($id);
        $user->delete();
    }
}
