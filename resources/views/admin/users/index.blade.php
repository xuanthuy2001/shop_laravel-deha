@extends('admin.layouts.app')

@section('title','Users')
@section('content')
@if (session('message'))
<h1 class="text-primary">
      {{session('message')}}
</h1>
@endif
<h1>User list</h1>
@hasrole('super-admin')
<div>
      <a href="{{route('users.create')}}" class="btn btn-primary">Create</a>
</div>
@endhasrole
<div>
      <table class="table table-hover ">
            <tr>
                  <td>#</td>
                  <td>Name</td>
                  <td>Image</td>
                  <td>Email</td>
                  <td>Phone</td>
                  <td>Action</td>
            </tr>
            @foreach ($users as $user)
            <tr>
                  <td>{{$user -> id}}</td>
                  <td>{{$user -> name}}</td>
                  <td>
                        <img src="{{ $user -> image_path }}"  width="200px" height="200px" alt="">
                  </td>
                  <td>{{$user -> email}}</td>
                  <td>{{$user -> phone}}</td>
                  <td>
                        @can('update-user')
                               <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning mb-2">Edit</a>
                        @endcan
                       

                      
                        @can('delete-user')
                              <form action="{{ route('users.destroy', $user->id) }}" id="form-delete{{ $user->id }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-delete btn-danger" type="submit"
                                    data-id={{ $user->id }}>Delete</button>

                              </form>
                        @endcan
                  </td>
            </tr>
            @endforeach 
      </table>
      {{ $users->links() }}
</div>
@endsection

