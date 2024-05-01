<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category_data = [];
    
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $category_data[$localeCode] = [
                'name' => $request->input('name_' . $localeCode),
                'description' => $request->input('description_' . $localeCode),
            ];
        }
    
        if ($request->hasFile('image')) {
            $category_data['image'] = uploadImage($request, 'image', 'categories');
        }
    
        $categories = Category::create($category_data);
        return $categories;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
