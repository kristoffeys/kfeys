<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at', 'desc')->get();

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        $page = new Page();
        return view('admin.pages.form', compact('post'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.form', compact('page'));

    }
}
