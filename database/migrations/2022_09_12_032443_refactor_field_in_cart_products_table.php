<?php

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefactorFieldInCartProductsTable extends Migration
{
    
    public function up()
    {
        if(!Schema::hasColumn('cart_products', 'cart_id'))
        Schema::table('cart_products', function (Blueprint $table) {
            $table->foreignIdFor(Cart::class, 'cart_id')->constrained()->onDelete('cascade');
        });

        if(Schema::hasColumn('cart_products', 'user_id'))
        Schema::table('cart_products', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        if(Schema::hasColumn('cart_products', 'product_color'))
        Schema::table('cart_products', function (Blueprint $table) {
            $table->dropColumn('product_color');
        });
    }

   
    public function down()
    {
        if(Schema::hasColumn('cart_products', 'cart_id'))
        Schema::table('cart_products', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
            $table->dropColumn('cart_id');
        });

        if(!Schema::hasColumn('cart_products', 'user_id'))
        Schema::table('cart_products', function (Blueprint $table) {
            $table->foreignIdFor(Cart::class);
        });

        if(!Schema::hasColumn('cart_products', 'product_color'))
        Schema::table('cart_products', function (Blueprint $table) {
            $table->string('product_color');
        });
    }
}
