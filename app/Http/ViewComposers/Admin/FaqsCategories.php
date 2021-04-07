<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Models\DB\FaqCategory;

class FaqsCategories
{
    public $categories;

    public function __construct()
    {
        $this->faqs_categories = FaqCategory::where('active', 1)->orderBy('name', 'asc')->get();
    }

    public function compose(View $view)
    {
        $view->with('faqs_categories', $this->faqs_categories);
    }
}