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
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning mb-2">Edit</a>

                        <form action="{{ route('roles.destroy', $role->id) }}" id="form-delete{{ $role->id }}"
                              method="post">
                              @csrf
                              @method('delete')

                          </form>

                          <button class="btn btn-delete btn-danger" data-id={{ $role->id }}>Delete</button>
                  </td>
            </tr>
            @endforeach
      </table>
      {{ $roles->links() }}
</div>
@endsection

@push('script')
<script

@endpush