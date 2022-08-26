@extends('admin.layouts.app')
@section('title','categories')
@section('content')
      <form action="{{route('categories.update',$category ->id)}}" method="post"  >
            @csrf
                  <div class="input-group  input-group-static  mb-4">
                        <label>name</label>
                        <input type="text" value="{{ $category -> name ?? old('name') }}" class="form-control" name="name">
                        @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                  </div>

                  @if ($category->childrent->count() < 1)
                  <div class="input-group input-group-static mb-4">
                      <label name="group" class="ms-0">Parent Category</label>
                      <select name="parent_id" class="form-control">
                          <option value=""> Select Parent Category </option>
                          @foreach ($parentCategories as $item)
                              <option value="{{ $item->id }}"
                                  {{ (old('parent_id') ?? $category->parent_id) == $item->id ? 'selected' : '' }}>
                                  {{ $item->name }}</option>
                          @endforeach
                      </select>
                  </div>
              @endif
            <button type="submit" class="btn btn-primary"> create</button>
      </form>
@endsection


