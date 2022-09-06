<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    
    public function definition()
    {
        return [
           'name' => $this-> faker  -> name(), 
           'type' => 'money',
           'value' => 20,
           'expery_date' =>Carbon::now()
        ];
    }
}
