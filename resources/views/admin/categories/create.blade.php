@extends('admin.layouts.app')
@section('title','categories')
@section('content')
  
      <form action="{{route('categories.store')}}" method="post"  >
            @csrf
                  <div class="input-group  input-group-static  mb-4">
                        <label>name</label>
                        <input type="text" value="{{ old('name') }}" class="form-control" name="name">
                        @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                  </div>

                  <div class="input-group input-group-static mb-4">
                        <label for="exampleFormControlSelect1" name="group" class="ms-0"> Parent Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                              <option value="">Select Parent Category</option>
                              @foreach($parentCategories as $item)
                               <option value="{{ $item->id }}" {{ old('parent_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>  
                              @endforeach
                        </select>
                  </div>
            <button type="submit" class="btn btn-primary"> create</button>
      </form>
@endsection


