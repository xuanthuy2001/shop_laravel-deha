<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
   
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }(
    protected $product;
    protected $category;

    public function __construct(Product $product, Category $category)
    {
        $this ->  product = $product ;
        $this ->  category = $category ;
    }

    public function index()
    {   
        $products = $this -> product  -> paginate(8);
        $categories = $this -> category -> getParents();
        $title = "book store";
        return view('client.home.index', [
            'products' => $products,
            'categories' => $categories,
            'title' => $title
        ]);
    }
    public function productListAjax()
    {
        $products = $this -> product->all();
        $dataProduct = [];

        foreach ( $products as $item )
        {
            $dataProduct[] = $item["name"]; 
        }
        return  $dataProduct;
    }

    public function search_product(Request $request)
    {
        $search_product = $request -> productName;
        if($search_product != '')
        {
            $product = Product::where("name" , "LIKE" , "%{$search_product}%")->first();
            if($product)
            {
                return redirect() -> route('client.products.show', ['id' => $product->id]);
            }
            else{
                return redirect() -> back();
            }
        }
        else{
            return redirect() -> back();
        }
    }
}
