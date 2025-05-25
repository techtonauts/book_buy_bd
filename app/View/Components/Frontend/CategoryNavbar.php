<?php

namespace App\View\Components\Frontend;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class CategoryNavbar extends Component
{
    public $categories;

    public function __construct()
    {

        $this->categories = Category::where('parent_id', null)
            ->with('children')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.category-navbar');
    }
}
