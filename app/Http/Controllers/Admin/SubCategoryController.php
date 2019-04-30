<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::categoryParent();
        return view('admin.subcategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uploadedFile = $request->file('image');
        $path = $uploadedFile->store('public/files');
        $category = Category::create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $path,
            'status' => 1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $subcategory)
    {
        echo json_encode($subcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $subcategory)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($subcategory->image);
            $subcategory->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $request->file('image')->store('files', 'public')
            ]);
            return json_encode(['category' => $subcategory]);
        }
        $subcategory->update($request->except('image'));
        return json_encode(['category' => $subcategory]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $subcategory)
    {
        $subcategory->delete();
        if ($subcategory->image) {
            Storage::disk('public')->delete($subcategory->image);
        }
    }
}
