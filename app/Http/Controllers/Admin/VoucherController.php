<?php

namespace App\Http\Controllers\Admin;

use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::all();
        return view('admin.voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "discount" => ['required', 'integer'],
            "quantity" => ['required', 'integer', 'max:100', 'min:1'],
        ]);

        $uuid = Str::uuid();
        $code = "VC-" .  strtoupper(substr($uuid, 0, 20));
        $voucher = new Voucher();
        $voucher->name = $request->name;
        $voucher->code = $code;
        $voucher->discount = $request->discount;
        $voucher->quantity = $request->quantity;
        $voucher->save();
        toastr()->success('Thêm voucher thành công.');

        return redirect()->back();

     }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $voucher = Voucher::findOrFail($id);
        return view('admin.voucher.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => ['required'],
            "discount" => ['required', 'integer'],
            "quantity" => ['required', 'integer', 'max:100', 'min:1'],
        ]);

        $voucher = Voucher::findOrFail($id);
        $voucher->name = $request->name;
        $voucher->discount = $request->discount;
        $voucher->quantity = $request->quantity;
        $voucher->save();
        toastr()->success('Update voucher thành công.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();

        return response(['status' => 'success', 'message' => 'Xóa voucher thành công.']);
    }
}
