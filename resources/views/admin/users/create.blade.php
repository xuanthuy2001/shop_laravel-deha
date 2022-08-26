@extends('admin.layouts.app')
@section('title','roles')
@section('content')
<div class="carts">
  
      <form action="{{route('users.store')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="row align-items-end">
                  <div class="col-4 ">
                        <div class="input-group  input-group-static  mb-0">
                              <label>Image</label>
                              <input type="file" accept="image/*" value="{{ old('name') }}" class="form-control" name="image" id="image-input">
                              @error('name')
                              <span class="text-danger"> {{ $message }}</span>
                              @enderror
                            
                        </div>
                  </div> 
                  <div class="col-8"> 
                       <div class="row">
                              <div class="col-3">
                              </div>
                              <div class="col-9">
                                    <img style="width: 250px" src="" id="show-image" alt="">
                              </div>
                       </div>
                  </div>
            </div> 
            

            <div class="row">
               
                  <div class="col-6">
                        <div class="row">
                              <div class="col-8">
                                    <div class="input-group  input-group-static  mb-4">
                                          <label>name</label>
                                          <input type="text" value="{{ old('name') }}" class="form-control" name="name">
                                          @error('name')
                                          <span class="text-danger"> {{ $message }}</span>
                                          @enderror
                                    </div>
                              </div>
                              <div class="col-4">
                                    <div class="input-group  input-group-static  mb-4">
                                          <label>Phone number</label>
                                          <input type="text" class="form-control" value="{{ old('phone') }}" name="phone">
                                          <!-- nếu có lỗi xe hiển thị  -->
                                          @error('phone')
                                          <span class="text-danger"> {{ $message }}</span>
                                          @enderror
                                    </div>
                              </div>
                        </div>

                        <div class="row">
                              <div class="col-10">
                                   <div class="row">
                                    <div class="col-6">
                                          <div class="input-group input-group-static mb-4">
                                          <label class="ms-0">city</label>
                                          <select class="form-control" name="city" id='select-city'></select>
                                    </div>
                              </div>
                                    <div class="col-6"> <div class="input-group input-group-static mb-4">
                                          <label>District</label>
                                          <select class="form-control" name="district" id='select-district'></select>
                                    </div>
                              </div>
                                   </div>
                              </div>
                              <div class="col-2">
                                    <div class="input-group input-group-static mb-4">
                                          <label for="exampleFormControlSelect1" name="group" class="ms-0">gender</label>
                                          <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                                <option name="male">male</option>
                                                <option name="fe-male">female</option>
                                          </select>
                                    </div>
                              </div>
                        </div>
                        <div class="row">
                              <div class="input-group  input-group-static  mb-4">
                                    <label>address</label>

                                    <textarea class="form-control" name="address" id = "address"   rows="1">{{ old('address') }}</textarea>
                             
                                    @error('address')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                     
                       
                  </div>
               
      
                  <div class="col-6">
                        <div class="input-group  input-group-static  mb-4">
                              <label>Email</label>
                              <input type="email" class="form-control" value="{{ old('email') }}" name="email">
                              <!-- nếu có lỗi xe hiển thị  -->
                              @error('email')
                              <span class="text-danger"> {{ $message }}</span>
                              @enderror
                        </div>
                        <div class="input-group  input-group-static  mb-4">
                              <label>Password</label>
                              <input type="password" class="form-control" value="" name="password">
                              <!-- nếu có lỗi xe hiển thị  -->
                              @error('password')
                              <span class="text-danger"> {{ $message }}</span>
                              @enderror
                        </div>      
      
                  </div>
            </div>
            <div class="form-group">
                  <label for="">Roles</label>
                  <div class="row">
                        @foreach ($roles as $groupName => $role)
                              <div class="col-5">
                                    <h4>{{$groupName}}</h4>
                                    <div>
                                          @foreach ($role as $item )
                                                <div class="form-check">
                                                      <input class="form-check-input" id="{{$item -> id}}" type="checkbox"
                                                            value="{{$item -> id}}" name="role_ids[]">
                                                      <label class="custom-control-label"
                                                            for="{{$item -> id}}">{{$item-> display_name}}
                                                      </label>
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

@section('script') 

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script>
            async function loadDistricts() {
                  $('#select-district').empty();
                  const path = $("#select-city option:selected").data('path');
                  const response = await fetch('{{ asset('locations/')}}' + path );
                  const districts = await response.json();
                        $.each(districts.district,function(index, each){
                              $("#select-district").append(`
                              <option>
                                    ${each.name}
                              </option>`)
                  })
                  const district = document.getElementById('select-district').value;
                  const city = document.getElementById('select-city').value;
                  let address = `${district} -  ${city}`;
                  $("#address").val(address)  
            } 
            
            $(document).ready(
                  
            async function() {
                   const response = await fetch('{{ asset('locations/index.json') }}');
                   const cities = await response.json();
                   $.each(cities,function(index, each){
                       $("#select-city").append(`
                       <option data-path='${each.file_path}'>
                             ${index}
                       </option>`)
                   })
                  
                   $('#select-city').change(function(){
                        loadDistricts();
                   });
                   $('#select-district').change(function(){
                        const district = document.getElementById('select-district').value;
                        const city = document.getElementById('select-city').value;
                        let address = `(${district})  ${city}`;
                        $("#address").val(address) 
                   });
                 
                   loadDistricts();
                   generateAddress();
       });

      


      </script>
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






@endsection
