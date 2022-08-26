<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
        protected $category;

        public function __construct(Category $category)
        {
            $this->category = $category;
        }

        public function index()
        {
            $categories = $this->category ->paginate(3);
            // dd($categories[1]->parent->name);
            return view('admin.categories.index',[
            'categories' => $categories
         ]);
        }

        public function create()
        {
            $parentCategories = $this -> category ->getParents();
            return view('admin.categories.create',[
                'parentCategories' => $parentCategories
             ]);
        }
        public function store(CreateCategoryRequest  $request)
        {
            $dataCreate = $request->all();
            $category = $this -> category -> create($dataCreate);
            return redirect() -> route('categories.index')->with('message','create new category:'.$category -> name . " success");
        }
        public function edit($id)
        {
            $parentCategories = $this -> category ->getParents();
            $category = $this -> category -> findOrFail($id);
            return view('admin.categories.edit',[
                'category' => $category,
                'parentCategories' => $parentCategories,
             ]);
        
        }
        public function update(Request $request, $id)
        {

            $dataUpdate = $request->all();

            $category = $this->category->findOrFail($id);

            $category->update($dataUpdate);

            return redirect()->route('categories.index')->with(['message' => 'Update  category: '. $category->name." success"]);

        }
        public function destroy($id)
        {
            $category = $this->category->findOrFail($id);
    
            $category->delete();
    
            return redirect()->route('categories.index')->with(['message' => 'Delete  category: '. $category->name." success"]);
        }
}
