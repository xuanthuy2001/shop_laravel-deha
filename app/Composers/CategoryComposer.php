<?php
 
namespace App\Composers;

use App\Models\Category;
use Illuminate\View\View;
 
class CategoryComposer
{
  
    protected $category;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
 
    
    public function compose(View $view)
    {
        $view->with('categories', $this->category->getParents());
    }
}