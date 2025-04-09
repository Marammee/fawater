<?php

namespace App\Repositories\Eloquent;

use App\Models\Bill;
use App\Repositories\Contracts\BillRepositoryInterface;

class BillRepository implements BillRepositoryInterface
{
    public function __construct(private Bill $bill)
    {
    }

    public function getAll()
    {
        return $this->bill->with('category:id,name')->latest()->get();
    }

    public function findById($id)
    {
        $bill = $this->bill->find($id);
        if (!$bill) {
            throw new \Exception('Bill not found', 404);
        }
        return $bill;
    }

    public function create($data)
    {
        $user = $this->getUser();
        return $user->bills()->create($data);
    }

    public function update($id, $data)
    {
        $user = $this->getUser();
        $bill = $user->bills()->find($id);
        $bill->update($data);
        return $bill;
    }

    public function delete($id)
    {
        $bill = $this->findById($id);
        $bill->delete();
        return $bill;
    }

    public function getUser()
    {
        return auth()->user();
    }
}
