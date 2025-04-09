<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Http\Resources\BillResource;
use App\Models\Bill;
use App\Services\BillService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BillController extends Controller
{
    use ApiResponse;


    public function __construct(protected BillService $billService)
    {
    }

    // Get all bills
    public function index()
    {
        $bills = $this->billService->getUserBills();
        if ($bills->isEmpty()) {
            return ApiResponse::notFound('No bills found');
        }
        return ApiResponse::show(BillResource::collection($bills), 'Bills fetched successfully');
    }

    // Get a specific bill
    public function show($id)
    {
        $bill = $this->billService->getBillById($id);
        if (!$bill) {
            return ApiResponse::notFound('Bill not found');
        }

        $this->authorize('view', $bill);
        return ApiResponse::show(new BillResource($bill), 'Bill fetched successfully');
    }

    // Create a new bill
    public function store(StoreBillRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();

        if (empty($validatedData)) {
            return ApiResponse::validationError('Validation error', $validatedData);
        }

        $bill = $this->billService->createBill($validatedData);

        if (!$bill) {
            return ApiResponse::error('Failed to create bill');
        }

        return ApiResponse::created(new BillResource($bill), 'Bill created successfully');
    }

    // Update a bill
    public function update(UpdateBillRequest $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validated();

        if (empty($validatedData)) {
            return ApiResponse::validationError('Validation error', $validatedData);
        }

        $bill = $this->billService->getBillById($id);
        $this->authorize('update', $bill);

        if (!$bill) {
            return ApiResponse::notFound('Bill not found');
        }
        $bill = $this->billService->updateBill($id, $validatedData);

        return ApiResponse::updated(new BillResource($bill), 'Bill updated successfully');
    }

    // Delete a bill
    public function destroy($id)
    {
        $bill = $this->billService->getBillById($id);
        $this->authorize('delete', $bill);
        $bill = $this->billService->deleteBill($id);
        if (!$bill) {
            return ApiResponse::notFound('Bill not found');
        }

        return ApiResponse::deleted('Bill deleted successfully');
    }
}
