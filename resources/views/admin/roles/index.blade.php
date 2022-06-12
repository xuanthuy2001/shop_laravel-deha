@extends('admin.layouts.app')

@section('title','Role')
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
                  <td>Name</td>
                  <td>Display Name</td>
                  <td>Action</td>
            </tr>
            @foreach ($roles as $role)
            <tr>
                  <td>{{$role -> id}}</td>
                  <td>{{$role -> name}}</td>
                  <td>{{$role -> display_name}}</td>
                  <td>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>

                        <button href="{{route('roles.destroy', $role -> id)}}" class=" btn  btn-danger">
                              Delete
                        </button>
                  </td>
            </tr>
            @endforeach
      </table>
      {{ $roles->links() }}
</div>
@endsection