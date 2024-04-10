
@extends('frontend.layouts.master')

@section('title')
    Manager Orders
@endsection

@section('contents')
<section class="show-cart mb-5">
    <div class="row">
          <div class="col-md-12 border-end">
                <div class="row">
                      <div class="col-md-12">
                          <h1 class="ms-2 mt-4"> Your List Orders</h1>
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" colspan="6">#</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="pt-2"># {{ $order->id }}</td>
                                        <th class="pt-2" scope="row">
                                            <p class="fw-bold">Đơn hàng - {{ $order->code_order }}</p>
                                        </th>
                                        <td class="pt-2"><span class="fw-bold">Apply Voucher: </span> <code>{{ $order->voucher }}</code></td>
                                        <td class="pt-2">
                                            <label for="" class="btn btn-secondary btn-group btn-group-sm fw-bold">Đang chờ xử lý</label>
                                        </td>
                                        <td class="pt-2 fw-bold">Total Price: <code>{{ $order->total }} đ</code></td>
                                        <td class="pt-2">
                                            <button class="btn btn-warning btn-group btn-group-sm text-white fw-bold">Detail</button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                          </table>
                      </div>
                </div>
          </div>
    </div>
</section>
@endsection
