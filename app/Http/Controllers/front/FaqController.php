<?php

namespace App\Http\Controllers\front;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Faq;


class FaqController extends Controller
{
    protected $faq;

    function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    public function index()
    {

        $view = View::make('front.faqs.index')
                ->with('faqs', $this->faq->where('active', 1)->get());

        if(request()->ajax()) {

             
    
            
        }

        return $view;
    }
}