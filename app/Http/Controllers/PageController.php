<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Document;
use App\Models\Puppy;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', ['isHomePage' => true]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function catalog()
    {
        return view('pages.catalog');
    }

    public function catalogItem($slug)
    {
        $puppy = Puppy::where('slug', $slug)->firstOrFail();
        return view('pages.catalog-item', ['puppy' => $puppy]);
    }

    public function students()
    {
        return view('pages.students');
    }

    public function delivery()
    {
        return view('pages.delivery');
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function blogItem($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('pages.blog-item', ['blog' => $blog]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function document($slug)
    {
        $document = Document::where('slug', $slug)->firstOrFail();
        return view('pages.document', ['document' => $document]);
    }
}
