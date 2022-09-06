@extends('admin.layouts.app')
@section('title','categories')
@section('content')
  
      <form action="{{route('coupons.store')}}" method="post"  >
            @csrf
                <div class="row">
                 <div class="col-3">
                  <div class="input-group  input-group-static  mb-4">
                        <label>name</label>
                        <input type="text" value="{{ old('name') }}" class="text-uppercase form-control" name="name">
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
                            <option value="money"> Money </option>
    
                        </select>
                    </div>
                 </div>

                 <div class="col-4">
                  <div class="input-group  input-group-static  mb-4">
                        <label>value</label>
                        <input type="text" value="{{ old('value') }}" class="form-control" name="value">
                        @error('value')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                  </div>
                 </div>

                 <div class="col-2">
                  <div class="input-group input-group-static mb-4">
                        <label>Expery date</label>
                        <input type="date" value="{{ old('expery_date') }}" name="expery_date" class="form-control">
    
                        @error('expery_date')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                 </div>
                </div>

                 
            <button type="submit" class="btn btn-primary"> create</button>
      </form>
@endsection


