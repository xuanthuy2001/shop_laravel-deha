<?php

namespace App\Http\Controllers\Admin;

use App\Models\coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coupons\CreateCouponRequest;
use App\Http\Requests\Coupons\UpdateCouponRequest;

class CounponController extends Controller
{
    public function __construct(coupon $coupon)
    {
            $this  -> coupon = $coupon;
    }

    public function index()
    {
        $coupons = $this -> coupon -> latest('id') ->paginate(3);
        return view('admin.coupons.index', [
            'coupons' => $coupons
         ]);
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCouponRequest $request)
    {
        $dataCreate = $request->all();
        $coupon = $this -> coupon -> create($dataCreate);
        return redirect() -> route('coupons.index')->with('message', 'create new coupon:'.$coupon -> name . " success");
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $coupon = $this -> coupon -> findOrFail($id);
        return view('admin.coupons.edit', [
            'coupon' => $coupon,
         ]);
    }

  
    public function update(UpdateCouponRequest $request, $id)
    {
           
        $dataUpdate = $request->all();

        $coupon = $this->coupon->findOrFail($id);

        $coupon->update($dataUpdate);

        return redirect() -> route('coupons.index')->with('message', 'Update new coupon:'.$coupon -> name . " success");
    }


    public function destroy($id)
    {
        $coupon=$this->coupon->findOrFail($id);
        $coupon->delete();
        return redirect() -> route('coupons.index')->with('message', 'Delete success');
    }
}
