<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveOrderIdCouponUserTable extends Migration
{
    public function up()
    {
        if(Schema::hasColumn('coupon_users', 'order_id'))
        Schema::table('coupon_users', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropColumn('order_id');
        });
    }

    
    public function down()
    {
        if(!Schema::hasColumn('coupon_user', 'order_id'))
        Schema::table('coupon_user', function (Blueprint $table) {
            $table->foreignIdFor(Order::class);
        });
    }
}
