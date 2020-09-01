@extends('layouts.admin')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
          <h2>Order Show Page</h2>
          <div>
              <a href="{{ route('order.index') }}" class="btn btn-success">Go back to Orders</a>
              <a href="{{ route('order.edit', $order->id) }}" class="btn btn-primary">Edit Order</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 offset-3">
              <table class="table">
                  <tbody>
                        <tr>
                            <td> User </td>
                            <td>
                                {{ $order->user->name }}
                            </td>
                        </tr>
                        <tr>
                            <td> Course </td>
                            <td>
                                {{ $order->course->title }}
                            </td>
                        </tr>
                        <tr>
                            <td> Billing Name </td>
                            <td> {{ $order->name }} </td>
                        </tr>
                        <tr>
                            <td> Email </td>
                            <td> {{ $order->email }} </td>
                        </tr>
                        <tr>
                            <td> Phone </td>
                            <td> {{ $order->phone }} </td>
                        </tr>
                        <tr>
                            <td> Payment Status </td>
                            <td>
                                @if($order->payment_status == 4)
                                    <div class="badge badge-warning">
                                        Pending
                                    </div>
                                @elseif($order->payment_status == 3)
                                    <div class="badge badge-primary">
                                        Processing
                                    </div>
                                @elseif($order->payment_status == 2)
                                    <div class="badge badge-danger">
                                        Failed
                                    </div>
                                @elseif($order->payment_status == 1)
                                    <div class="badge badge-success">
                                        Approved
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td> Order Status </td>
                            <td>
                                @if($order->status)
                                    <div class="badge badge-success">
                                        Active
                                    </div>
                                @else
                                    <div class="badge badge-success">
                                        Active
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td> Amount </td>
                            <td> {{ $order->amount }} </td>
                        </tr>
                        <tr>
                            <td> Coupon Code </td>
                            <td> {{ $order->coupon_code }} </td>
                        </tr>
                        <tr>
                            <td> Discount Amount </td>
                            <td> {{ $order->discount_amount }} </td>
                        </tr>
                        <tr>
                            <td> Payment Method </td>
                            <td> {{ $order->payment_method }} </td>
                        </tr>
                        <tr>
                            <td> Payment Sender </td>
                            <td> {{ $order->payment_sender }} </td>
                        </tr>
                        <tr>
                            <td> Verify Code </td>
                            <td> {{ $order->verify_code }} </td>
                        </tr>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection