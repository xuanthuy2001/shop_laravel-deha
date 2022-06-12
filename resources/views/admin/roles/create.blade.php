@extends('admin.layouts.app')
@section('title','roles')
@section('content')
<div class="carts">
      <form action="{{route('roles.store')}}" method="post">
            @csrf
            <div class="input-group  input-group-static  mb-4">
                  <label>name</label>
                  <input type="text" value="{{ old('name') }}" class="form-control" name="name">
                  @error('name')
                  <span class="text-danger"> {{ $message }}</span>
                  @enderror

            </div>
            <div class="input-group  input-group-static  mb-4">
                  <label>display name</label>
                  <input type="text" class="form-control" value="{{ old('display_name') }}" name="display_name">
                  <!-- nếu có lỗi xe hiển thị  -->
                  @error('display_name')
                  <span class="text-danger"> {{ $message }}</span>
                  @enderror
            </div>
            <div class="input-group input-group-static mb-4">
                  <label for="exampleFormControlSelect1" name="group" class="ms-0">group</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="group">
                        <option name="system">System</option>
                        <option name="user">User</option>
                        <option name="category">Category</option>
                        <option name="coupon">Coupon</option>

                  </select>
            </div>
            <div class="form-group">
                  <label for="">Permission </label>
                  <div class="row">
                        <!-- permissions là 1 mảng gán cho tên là $groupname -->
                        <!-- system => [] -->
                        @foreach ($permissions as $groupName => $permission)

                        <div class="col-5">
                              <h4>{{$groupName}}</h4>
                              <!-- permission là 1 mảng gán tên mảng đó là $item -->
                              <div>
                                    @foreach ($permission as $item )
                                    <div class="form-check">
                                          <input class="form-check-input" id="{{$item -> id}}" type="checkbox"
                                                value="{{$item -> id}}" name="permission_ids[]">
                                          <label class="custom-control-label"
                                                for="{{$item -> id}}">{{$item-> display_name}}</label>
                                    </div>
                                    @endforeach
                              </div>
                        </div>

                        @endforeach
                  </div>
            </div>

            <button type="submit" class="btn btn-primary"> create</button>

      </form>

</div>

@endsection