@extends('client.layouts.app')
@section('title')
      {{ $title  }}
@endsection

@section('content')
<div class="container-fluid mb-5">
      <div class="row  px-xl-5">
            <div class="col-lg-3">
                
            </div>
<div class="col-lg-9">
      <!-- Featured Start -->
      <div class="container-fluid pt-5" style="padding-left: 0">
            <div class="row  pb-3">
                  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                              <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                              <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                              <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                              <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                              <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                              <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                              <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                              <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                        </div>
                  </div>
            </div>
      </div>
<!-- Products Start -->
<div class="container-fluid pt-5" style="padding-left: 0">
      <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">List Product</span></h2>
      </div>
      <div class="row  pb-3">
            @foreach($products as $product)
            <a href="{{ route('client.products.show', $product->id) }}">
                  <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                              <div
                                    style="text-align: center"
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img src="{{ $product->images->count() > 0 ? asset('upload/' . $product->images->first()->url) : 'upload/default.jpg' }}"  width="200px" height="200px" alt="">
                              </div>
                              <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{ $product-> name }}</h6>
                                    <div class="d-flex justify-content-center">
                                          <h6>${{ $product-> price }}</h6>
                                          <h6 class="text-muted ml-2"><del>${{ $product-> sale }}</del></h6>
                                    </div>
                              </div>
                              <div
                              style="text-align: center"
                              class="card-footer  bg-light border">
                                    <a href="{{ route('client.products.show', $product->id) }}" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                  
                              </div>
                        </div>
                       </div>
            </a>
            @endforeach
   
      </div>
</div>
<!-- Products End -->
</div>
      </div>
</div>





{{ $products->links() }}

@endsection

