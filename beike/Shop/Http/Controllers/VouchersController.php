<?php

namespace Beike\Shop\Http\Controllers;

use Beike\Repositories\VouchersRepo;
use Illuminate\Http\Request;

class VouchersController extends Controller
{
    protected $vouchersRepo;

    public function __construct(VouchersRepo $vouchersRepo)
    {
        $this->vouchersRepo = $vouchersRepo;
    }

    public function store(Request $request)
    {
        $data    = $request->all();
        $voucher = $this->vouchersRepo->create($data);

        return response()->json($voucher, 201);
    }

    public function index()
    {
        $vouchers = $this->vouchersRepo->getAll();

        return response()->json($vouchers);
    }

    public function show($id)
    {
        $voucher = $this->vouchersRepo->getById($id);

        if ($voucher) {
            return response()->json($voucher);
        }

        return response()->json(['message' => 'Voucher not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $data    = $request->all();
        $updated = $this->vouchersRepo->update($id, $data);

        if ($updated) {
            return response()->json(['message' => 'Voucher updated']);
        }

        return response()->json(['message' => 'Voucher not found'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->vouchersRepo->delete($id);

        if ($deleted) {
            return response()->json(['message' => 'Voucher deleted']);
        }

        return response()->json(['message' => 'Voucher not found'], 404);
    }
}
