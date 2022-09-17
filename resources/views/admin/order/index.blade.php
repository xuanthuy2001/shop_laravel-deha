@extends('admin.layouts.app')

@section('title','Order')
@section('content')
@if (session('message'))
<h1 class="text-primary">
      {{session('message')}}
</h1>
@endif
<h1>Role</h1>
<div>
      <a href="{{route('roles.create')}}" class="btn btn-primary">Create</a>
</div>
<div>
      <table class="table table-hover ">
            <tr>
                  <td>#</td>
                  <td>Status</td>
                  <td>total</td>
                  <td>ship</td>
                  <td>customer name</td>
                  <td>customer email</td>
                  <td>customer address</td>
                  <td>note</td>
                  <td>payment</td>
            </tr>
            @foreach ($orders as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    <div class="input-group input-group-static mb-4">
                        <select name="status" class="form-control select-status"
                            data-action="{{ route('admin.orders.update_status', $item->id) }}">
                            @foreach (config('order.status') as $status)
                                <option value="{{ $status }}"
                                    {{ $status == $item->status ? 'selected' : '' }}>{{ $status }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td>${{ $item->total }}</td>

                <td>${{ $item->ship }}</td>
                <td>{{ $item->customer_name }}</td>
                <td>{{ $item->customer_email }}</td>

                <td>{{ $item->customer_address }}</td>
                <td>{{ $item->note }}</td>
                <td>{{ $item->payment }}</td>
               
            </tr>
            @endforeach
      </table>
</div>
@endsection
@section('js')
<script src="{{ asset('admin/assets/order/order.js') }}"></script>
@endsection