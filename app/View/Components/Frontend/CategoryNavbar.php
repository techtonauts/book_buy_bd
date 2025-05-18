<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\DummyCategoryService;

class CategoryNavbar extends Component
{
    public $categories;

    public function __construct()
    {
        // Using dummy data for now
        $this->categories = DummyCategoryService::getCategories();

        // When database is ready, replace with:
        // $this->categories = Category::with('subcategories')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.category-navbar');
    }
}
