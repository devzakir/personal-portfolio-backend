@extends('layouts.admin')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom d-flex justify-content-between align-items-center">
        <h2>Order List</h2>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Create User</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th> Id </th>
                            <th> Course Name </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Amount </th>
                            <th> Payment Status </th>
                            <th> Status </th>
                            <th style="width: 150px"> Handle </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($orders->count())
                        @foreach($orders as $order)
                        <tr>
                            <td> {{ $order->id }} </td>
                            <td> {{ $order->course->title }} </td>
                            <td> {{ $order->name }} </td>
                            <td> {{ $order->email }} </td>
                            <td> {{ $order->amount }} </td>
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
                                {{ $order->status }}
                            </td>
                            <td style="width: 150px" class="d-flex">
                                <a href="{{ route('order.edit', $order->id) }}" class="mr-1 btn btn-primary btn-sm"> <i class="mdi mdi-square-edit-outline"></i> </a>
                                <a href="{{ route('order.show', $order->id) }}" class="mr-1 btn btn-success btn-sm"> <i class="mdi mdi-eye"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">
                                <h5 class="text-center pt-5 pb-5">NO Order Found</h5>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
