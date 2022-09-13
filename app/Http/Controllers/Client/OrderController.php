<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class OrderController extends Controller
{ 
  protected $order;
  public function __construct(Order $order)
  {
    $this ->order = $order;
  }

  public function index()
  {
    $orders = $this ->order-> getWithPaginateBy(auth() ->  user()-> id);
    return view('orders.index',[
      'orders' => $orders
    ]);
  }
  public function cancel($id)
  {
    $order =  $this -> order  -> findOrFail($id);
    $order -> update(['status' => 'cancel']);
    return redirect()-> route('client.orders.index') -> with(['message' => 'cancel success']);
  }
}
