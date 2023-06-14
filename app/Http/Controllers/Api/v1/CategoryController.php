<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\v1\CategoryResource;
use Illuminate\Support\Str;
use App\Http\Requests\v1\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryResource::collection(Category::select('id','name','slug')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

    /**
    * Different ways to store auth user_id to categories table
    * below are some
    */
        //First Way

        // $category = Category::create($request->validated() + ['user_id' => auth()->id()]);

        //Second Way --Recommended Way
        $category = auth()->user()->categories()->create($request->validated());

// $category = Category::create(['name' => 'Test','user_id'=> auth()->id()]);

        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // return $category;
        return new CategoryResource($category);
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
