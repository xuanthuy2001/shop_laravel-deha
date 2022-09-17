<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product_detail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;

class ProductController extends Controller
{
    protected $category;
    protected $product;
    protected $productDetail;

    public function __construct(Product $product, Category $category, Product_detail $productDetail)
    {
        $this->product = $product;
        $this->category = $category;
        $this->productDetail =  $productDetail;
    }
    public function index()
    {
        $products =$this->product->latest('id')->paginate(3);
       
        // compact truyền dữ liệu sang view
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->category->get(['id','name']);
        return view('admin.products.create', compact('categories'));
    }
    public function store(CreateProductRequest  $request)
    {
        $dataCreate = $request->except('sizes');
        $sizes = $request->sizes ? json_decode($request->sizes) : [];
        $product = Product::create($dataCreate);
        $dataCreate['image'] = $this->product->saveImage($request);

        $product->images()->create(['url' => $dataCreate['image']]);
        $product->assignCategory($dataCreate['category_ids']);
        $sizeArray = [];
        foreach ($sizes as $size) {
            $sizeArray[] = ['size' => $size->size, 'quantity' => $size->quantity, 'product_id' => $product->id];
        }
        $this->productDetail->insert($sizeArray);

        return redirect()->route('products.index')->with(['message' => 'create product success']);
    }
    public function show($id)
    {
        $product =  $this->product->with(['details', 'categories'])->findOrFail($id);


        return view('admin.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product =  $this->product->with(['details', 'categories'])->findOrFail($id);
        $categories = $this->category->get(['id','name']);
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }
    public function update(UpdateProductRequest $request, $id)
    {
        $dataUpdate = $request->except('sizes');
        $sizes = $request->sizes ? json_decode($request->sizes) : [];
        $product = $this->product->findOrFail($id);
        $currentImage =  $product->images ? $product->images->first()->url : '';
        // dd(time() . '.' . $request->file('image')->getClientOriginalExtension(), $currentImage);
        $dataUpdate['image'] = $this->product->updateImage($request, $currentImage);

        $product->update($dataUpdate);
        $product->images()->delete();
        $product->images()->create(['url' => $dataUpdate['image']]);
        $product->assignCategory($dataUpdate['category_ids']);
        $sizeArray = [];
       
        foreach ($sizes as $size) {
            $sizeArray[] = ['size' => $size->size, 'quantity' => $size->quantity, 'product_id' => $product->id];
        }
        $product->details()->insert($sizeArray);
        return redirect()->route('products.index')->with(['message' => 'Update product success']);
    }
    public function destroy($id)
    {
        $product = $this -> product->findOrFail($id);
        $product -> delete();
        $product -> details()->delete();
        $imageName  = $product -> images -> count() > 0 ? $product -> images -> first() -> url : '';
        $this -> product -> deleteImage($imageName);
        return redirect()->route('products.index')->with(['message' => 'Delete product success']);
    }
}
