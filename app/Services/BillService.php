<?php

namespace App\Services;

use App\Repositories\Contracts\BillRepositoryInterface;

class BillService
{

    public function __construct(private BillRepositoryInterface $billRepository)
    {
    }

    public function getAllBills()
    {
        return $this->billRepository->getAll();
    }

    public function getUserBills()
    {
        return $this->getAllBills()->where('user_id', auth()->user()->id);
    }

    public function getBillById($id)
    {
        return $this->billRepository->findById($id);
    }
    public function createBill($data)
    {
        return $this->billRepository->create($data);
    }

    public function updateBill($id,  $data)
    {
        return $this->billRepository->update($id, $data);
    }

    public function deleteBill($id)
    {
        return $this->billRepository->delete($id);
    }
}
