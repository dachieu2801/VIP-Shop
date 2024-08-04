<?php

namespace Beike\Admin\Http\Controllers;

use Beike\Models\Vouchers;
use Beike\Repositories\VouchersRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            throw new \Exception('Đầu vào không hợp lệ');
        }

        try {
            $data    = $request->all();
            $this->vouchersRepo->create($data);

            $query    = Vouchers::query();
            $vouchers = $query->paginate($request->input('per_page', 15));
            $new      = [
                'vouchers'         => $vouchers,
                'vouchers_format'  => $vouchers->jsonSerialize(),
            ];

            return view('admin::pages.vouchers.index', $new);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function index(Request $request)
    {
        $vouchers = $this->vouchersRepo->getAllWithFilters($request);

        $data = [
            'vouchers'         => $vouchers,
            'vouchers_format'  => $vouchers->jsonSerialize(),
        ];

        return view('admin::pages.vouchers.index', $data);
    }

    public function show($id)
    {
        $voucher = $this->vouchersRepo->getById($id)->jsonSerialize();

        if (! $voucher) {
            throw new \Exception('Mã giảm giá không tồn tại');
        }

        $data = [
            'voucher' => $voucher,
            'type'    => 'edit',
        ];

        Log::info('ádasd', $data);

        return view('admin::pages.vouchers.form', $data);
    }

    public function create()
    {
        $data = [
            'voucher' => [],
            'type'    => 'create',
        ];

        return view('admin::pages.vouchers.form', $data);
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
            throw new \Exception('Đầu vào không hợp lệ');
        }

        $data    = $request->all();
        try{
           $this->vouchersRepo->update($data['id'], $data);
        } catch (\Exception $e) {
            return throw new \Exception($e->getMessage());
        }
        $query    = Vouchers::query();
        $vouchers = $query->paginate($request->input('per_page', 15));
        $new      = [
            'vouchers'         => $vouchers,
            'vouchers_format'  => $vouchers->jsonSerialize(),
        ];
        return view('admin::pages.vouchers.index', $new);
    }

    public function formCreate() {}

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
