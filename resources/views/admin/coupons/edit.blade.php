@extends('admin.layouts.app')
@section('title','categories')
@section('content')
      <form action="{{route('coupons.update', $coupon->id)}}" method="post"  >
            @csrf
            @method('put')
                <div class="row">
                 <div class="col-3">
                  <div class="input-group  input-group-static  mb-4">
                        <label>name</label>
                        <input type="text" value="{{ old('name') ?? $coupon -> name }}" class="form-control" name="name">
                        @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                  </div>
                 </div>

                 <div class="col-3">
                    <div class="input-group input-group-static mb-4">
                        <label name="group" class="ms-0">Type</label>
                        <select name="type" class="form-control">
                            <option> Select Type </option>
                            <option value="money" {{ (old('type') ?? $coupon->type) == 'money' ? 'selected' : '' }}> Money
                            </option>
    
                        </select>
                    </div>
                    @error('type')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                 </div>

                 <div class="col-4">
                  <div class="input-group  input-group-static  mb-4">
                        <label>value</label>
                        <input type="text" value="{{ old('value') ?? $coupon -> value }}" class="form-control" name="value">
                        @error('value')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                  </div>
                 </div>

                 <div class="col-2">
                    <div class="input-group  input-group-static  mb-4">
                        <label>Expery date</label>
                        <input type="date" name="expery_date" value="{{ old('expery_date', date('Y-m-d')) }}" class="form-control">
                        @error('expery_date')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                   </div>

                 
                </div>

                 
            <button type="submit" class="btn btn-primary">Update</button>
      </form>
@endsection


