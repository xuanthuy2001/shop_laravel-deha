@extends('admin.layouts.app')
@section('title','Edit role' .$role -> name)
@section('content')
<div class="carts">
      <form action="{{route('roles.update',$role->id)}}" method="post">
            @csrf
            @method('put')
            <div class="input-group  input-group-static  mb-4">
                  <label>name</label>
                  <input type="text" value="{{ old('name') ?? $role->name  }}" class="form-control" name="name">
                  @error('name')
                  <span class="text-danger"> {{ $message }}</span>
                  @enderror

            </div>
            <div class="input-group  input-group-static  mb-4">
                  <label>display name</label>
                  <input type="text" class="form-control" value="{{ old('display_name')?? $role->display_name}}"
                        name="display_name">
                  <!-- nếu có lỗi xe hiển thị  -->
                  @error('display_name')
                  <span class="text-danger"> {{ $message }}</span>
                  @enderror
            </div>
            <div class="input-group input-group-static mb-4">
                  <label name="group" class="ms-0">Group</label>
                  <select class="form-control" name="group" value="{{$role -> group}}">
                        <option name=" system">System</option>
                        <option name="user">User</option>
                        <option name="category">Category</option>
                        <option name="coupon">Coupon</option>
                  </select>

                  @error('group')
                  <span class="text-danger"> {{ $message }}</span>
                  @enderror
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
                                    @foreach ($permission as $item)
                                    <div class="form-check">
                                          <input class="form-check-input" name="permission_ids[]" type="checkbox"
                                                {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                                value="{{ $item->id }}">
                                          <label class="custom-control-label"
                                                for="customCheck1">{{ $item->display_name }}</label>
                                    </div>
                                    @endforeach

                              </div>
                        </div>

                        @endforeach
                  </div>
            </div>

            <button type="submit" class="btn btn-primary"> update</button>

      </form>

</div>

@endsection