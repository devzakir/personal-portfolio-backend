@extends('layouts.admin')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
        <h2>Edit Order</h2>
        <div>
            <a href="{{ route('order.index') }}" class="btn btn-success">Go back to Orders</a>
            <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary">Show Order</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4 offset-4">
                <form action="{{ route('order.update', $order->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="paymentStatus">Payment Status</label>
                        <select name="payment_status" class="form-control" id="paymentStatus">
                            <option value="4" @if($order->payment_status == 4) selected @endif>Pending</option>
                            <option value="3" @if($order->payment_status == 3) selected @endif>Processing</option>
                            <option value="2" @if($order->payment_status == 2) selected @endif>Failed</option>
                            <option value="1" @if($order->payment_status == 1) selected @endif>Approved</option>
                        </select>
                    </div>
                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                        <a href="{{ route('order.show', $order->id) }}" class="btn btn-secondary btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
