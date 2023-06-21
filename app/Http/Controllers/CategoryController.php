<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //call category data
        $category = Category::all(); //select * from category

        //redirect to category page
        return view('kategori.index',   compact('category'));

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


        //redirect to create category page
        return view('category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, ['namakategori'=>'required']);
        $input = $request->all();
        $save = Category::create($input);
        if($save) {
            return redirect()->route('kategori.index');
        } else {
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
