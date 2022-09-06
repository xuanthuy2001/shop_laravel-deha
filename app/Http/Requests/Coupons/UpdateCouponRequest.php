<?php

namespace App\Http\Requests\Coupons;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
        'name' => 'required|unique:coupons,name,'.$this->coupon,
        'type' => 'required',
        'value' => 'required',
        'expery_date' => 'required',
        ];
    }
}
