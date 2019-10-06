


@extends('backend.layouts.master')
@section('title')
 Order | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Manage Order</h4>
            </div>
           
            <div class="card-body">
            @include('backend.partial.message')
            <table class="table table-hover table-striped mt-3" id="dataTable">
            
            <thead>
            <tr>
            <th>Serial</th>
            <th>Order Id</th>
            <th>Order Name</th>
            <th>Order Phone No</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
            </thead>

          <tbody>

          @foreach($orders as $order)
            <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>#LE{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->phone }}</td>
            <td>
                <p>
                    @if($order->is_seen_by_admin)
                    <button type="button" class="btn btn-success btn-sm">Seen</button>
                    @else
                    <button type="button" class="btn btn-warning btn-sm">UnSeen</button>
                    @endif
                </p>

                <p>
                    @if($order->is_completed)
                    <button type="button" class="btn btn-success btn-sm">Completed</button>
                    @else
                    <button type="button" class="btn btn-warning btn-sm">Not Completed</button>
                    @endif
                </p>

                <p>
                    @if($order->is_paid)
                    <button type="button" class="btn btn-success btn-sm">Paid</button>
                    @else
                    <button type="button" class="btn btn-danger btn-sm">UnPaid</button>
                    @endif
                </p>
            </td>


            <td>
                <a href="{{ route('admin.order.show',$order->id) }}" class="btn btn-info btn-sm">Order view</a>
            <form id="delete-form-{{ $order->id }}" method="post" action="{{ route('admin.order.destroy',$order->id) }}"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
              <button type="button" class="btn btn-danger btn-sm" 
                  onclick="if(confirm('Are you sure? You want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $order->id }}').submit();
              }else {
                  event.preventDefault();
                      }"><a class="">delete</a></button>
           
            </td>
            </tr>
            @endforeach

          </tbody>
          
          <tfoot>
            <tr>
            <th>Serial</th>
            <th>Order Id</th>
            <th>Order Name</th>
            <th>Order Phone No</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
            </tfoot>
            </table>
            </div>


        </div>

        @include('backend.partial.footer')


@endsection