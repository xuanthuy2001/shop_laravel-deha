@extends('admin.layouts.app')
@section('title', 'Edit Product')
@section('content')
    <div class="cards">
        <h1>Edit Product</h1>
            <form action="{{ route('products.update',$product -> id) }}" method="post" id="createForm" enctype="multipart/form-data">
                @csrf
                @method ('put')
                <div class="row">
                    <div class=" input-group-static col-4 mb-4">
                        <label>Image</label>
                        <input type="file" accept="image/*" name="image" id="image-input" class="form-control">
  
                        @error('image')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-8">
                       <div class="row">
                          <div class="col-3"></div>
                          <div class="col-9">
                                <img style="width: 250px" src="{{ $product->images ? asset('upload/' . $product->images->first()->url) : 'upload/default.jpg' }}"
                                id="show-image" alt="">
                          </div>
                       </div>
                    </div>
                </div>
              

                   <div class="row">
                        <div class="col-4">
                            <div class="input-group input-group-static mb-4">
                            <label>Name</label>
                            <input type="text" value="{{ old('name') ?? $product-> name }}" name="name" class="form-control">
        
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group input-group-static mb-4">
                                <label>Price</label>
                                <input type="number" step="0.1" value="{{ old('price') ?? $product-> price }}" name="price" class="form-control">
                                @error('price')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
            
                        </div>
                        <div class="col-4">
                            <div class="input-group input-group-static mb-4">
                                <label>Sale</label>
                                <input type="number" value="{{ old('sale') ?? $product-> sale }}" name="sale" class="form-control">
                                @error('sale')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-6">                <div class="input-group input-group-static mb-4">
                            <label name="group" >Category</label>
                            <select name="category_ids[]" class="form-control mt-4" multiple>
                                @foreach ($categories as $item)
                                    <option   value="{{ $item->id }}" {{$product -> categories-> contains('id', $item -> id )  ? 'selected' : ''}} >{{ $item->name }}</option>
                                @endforeach
                            </select>
        
                            @error('category_ids')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div></div>
                        <div class="col-6"> <div class="form-group">
                            <label>Description</label>
                            <div class="row w-100 h-100">
                                <textarea name="description" id="description" class="form-control"
                                    style="width: 100%">{{ old('description') ?? $product-> description }} </textarea>
                            </div>
                            @error('description')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div></div>
                     </div>
                <input type="hidden" id="inputSize" name='sizes'>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddSizeModal">
                    Add size
                </button>

                <!-- Modal -->
                <div class="modal fade" id="AddSizeModal" tabindex="-1" aria-labelledby="AddSizeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="AddSizeModalLabel">Add size</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="AddSizeModalBody">
                                
                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn  btn-primary btn-add-size">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                

             <button type="submit" class="btn btn-submit btn-primary">Submit</button>
          </form>
    </div>
@endsection



@section('style')
    <style>
        .w-40 {
            width: 40%;
        }

        .w-20 {
            width: 20%;
        }

     

    </style>
@endsection

@section('script') 
    <script type="text/javascript">
        $(() =>{
            function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#show-image').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#image-input").change(function(){
                    readURL(this);
                });
        });

    </script>

    <script>
      const size =  document.getElementById("AddSizeModalBody");
        console.log(size);
    </script>

@endsection

@section('js') 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
    integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('plugin/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script>
      
        let sizes = @json($product->details);

        rederSizes(sizes);
        appendSizesToForm();

        function renderSizes(sizes)
        {
            for(let zize of sizes)
            {
                renderSizes(zize);
            }
        }
        </script>
    <script src="{{ asset('admin/assets/js/product/product.js') }}"></script>
@endsection
