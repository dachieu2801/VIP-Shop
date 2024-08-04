<?php

namespace Beike\Admin\Http\Controllers;

use Beike\Repositories\VouchersRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VouchersController extends Controller
{
    protected $vouchersRepo;

    public function __construct(VouchersRepo $vouchersRepo)
    {
        $this->vouchersRepo = $vouchersRepo;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'            => 'required|string|max:50',
            'status'          => 'required|in:active,inactive',
            'discount_type'   => 'required|in:percentage,fixed',
            'discount_value'  => 'required|numeric',
            'usage_limit'     => 'required|numeric',
            'start_date'      => 'nullable|date',
            'end_date'        => 'nullable|date|after_or_equal:start_date',
            'description'     => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $data    = $request->all();
            $voucher = $this->vouchersRepo->create($data);

            return response()->json($voucher, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Có lỗi xảy ra khi tạo voucher: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function index(Request $request)
    {
        $vouchers = $this->vouchersRepo->getAllWithFilters($request);

        $data = [
            'vouchers' => $vouchers,
            'vouchers_format'  =>  $vouchers->jsonSerialize(),
        ];

        return view('admin::pages.vouchers.index', $data);
    }

    public function show($id)
    {
        $voucher = $this->vouchersRepo->getById($id);

        if ($voucher) {
            return response()->json($voucher);
        }

        return response()->json(['message' => 'Voucher not found'], 404);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'              => 'required|numeric',
            'name'            => 'nullable|string|max:50',
            'status'          => 'nullable|in:active,inactive',
            'discount_type'   => 'nullable|in:percentage,fixed',
            'discount_value'  => 'nullable|numeric',
            'usage_limit'     => 'nullable|numeric',
            'start_date'      => 'nullable|date',
            'end_date'        => 'nullable|date|after_or_equal:start_date',
            'description'     => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $data    = $request->all();
        $updated = $this->vouchersRepo->update($data['id'], $data);

        if ($updated) {
            return response()->json(['message' => 'Voucher updated']);
        }

        return response()->json(['message' => 'Voucher not found'], 404);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'              => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }
        $data    = $request->all();
        $deleted = $this->vouchersRepo->delete($data['id']);
        if ($deleted) {
            return response()->json(['message' => 'Voucher deleted']);
        }
        return response()->json(['message' => 'Voucher not found'], 404);
    }


}
