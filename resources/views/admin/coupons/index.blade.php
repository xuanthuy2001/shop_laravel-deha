@extends('admin.layouts.app')

@section('title','coupons')
@section('content')
@if (session('message'))
<h1 class="text-primary">
      {{session('message')}}
</h1>
@endif
<h1>Category list</h1>
<div>
      <a href="{{route('coupons.create')}}" class="btn btn-primary">Create</a>
</div>
<div>
      <table class="table table-hover ">
            <tr>
                  <td>#</td>
                  <td>Name</td>
                  <td>type</td>
                  <td>value</td>
                  <td>expery_date</td>
                  <td>Action</td>
            </tr>
            @foreach ($coupons as $item)
            <tr>
                  <td>{{$item -> id}}</td>
                  <td>{{$item -> name}}</td>
                 
                  <td>{{$item -> type}}</td>
                  <td>{{$item -> value}}</td>
                  <td>{{$item -> expery_date}}</td>
                  <td>
                        <a href="{{ route('coupons.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('coupons.destroy', $item->id) }}"
                            id="form-delete{{ $item->id }}" method="post">
                            @csrf
                            @method('delete')

                        </form>

                        <button class="btn btn-delete btn-danger" data-id={{ $item->id }}>Delete</button>

                    </td>
            </tr>
            @endforeach 
      </table>
      {{ $coupons->links() }}
</div>
@endsection

