
@extends('client.layouts.app')
@section('title', 'Order')
@section('content') <div class="row px-xl-5">
    @if (session('message'))
    <div class="row">
        <h3 class="text-danger">{{ session('message') }}</h3>
    </div>
@endif

<div class="col card">
    <div>
        <table class="table table-hover">
            <thead class="bg-secondary text-dark">
                <tr>
                    <th>id</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Ship</th>
                    <th>Customer_name</th>
                    <th>Customer_email</th>
                    <th>Customer_address</th>
                    <th>Note</th>
                    <th>Payment</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($orders as $item)
                    <tr id="">
                            <td>{{ $item-> id }}</td>
                            <td>{{ $item-> status }}</td>
                            <td>{{ $item-> total }}</td>
                            <td>{{ $item-> ship }}</td>
                            <td>{{ $item-> customer_name }}</td>
                            <td>{{ $item-> customer_email }}</td>
                            <td>{{ $item-> customer_address }}</td>
                            <td>{{ $item-> note }}</td>
                            <td>{{ $item-> payment }}</td>
                            <td>
                                @if($item -> status == 'pending')
                                  <form action="{{ route('client.orders.cancel',$item -> id) }}">
                                    @csrf
                                    <button class="btn btn-cancel btn-danger" data-id="{{ $item -> id }}">
                                        Cancle Order
                                    </button>
                                  </form>
                                @else
                                    
                                @endif
                            </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $orders -> links() }}
    </div>
</div>
@endsection
@section('js')
    <script>
        $(function()
        {
            $(document).on('click',".btn-cancel",function(e){
                e.preventDefault();
                let id = $(this).data("id");
                confirmDelete()
                    {
                        .then(function() {
                            $(`#form-cancel${id}`).submit();
                        })
                        .catch();
                    }
                ;
            } )
        })
    </script>
@endsection