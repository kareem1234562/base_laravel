<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category as ResourcesCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all()??null;
        if($categories){
            return response()->json(ResourcesCategory::collection($categories));
        }else{
            return response()->json(['message' => 'There are no categories'],404);
        }

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
    public function store(Request $request)
    {

        $data=$request->except(['_token']);
        $data['image']=upload_file('uploads/category', $request->image);
         $create= Category::create($data);
         if($create){
             return response()->json(['message' => 'Category created successfully']);
         }else{
            return response()->json(['message' => 'Category not created successfully']);
         }

        //
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
        $category=Category::find($id)??null;
        if($category){
          $data=$request->except(['_token']);

          if($request->hasFile('image')){
            $data['image']=upload_file('uploads/category', $request->image);
        }else{
            $data['image']=$category->image;
        }
        $update=$category->update($data);
        if($update){
            return response()->json(['message' => 'Category updated successfully']);
        }else{
            return response()->json(['message' => 'Category not updated successfully']);
        }
        }else{
            return response()->json(['message' => 'Category not found'],404);
        }




        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
        $category=Category::find($id)??null;
        if($category){
            $delete=$category->delete();
            if($delete){
                return response()->json(['message' => 'Category deleted successfully']);
            }else{
                return response()->json(['message' => 'Category not deleted successfully']);
            }
        }else{
            return response()->json(['message' => 'Category not found'],404);
        }
        //
    }
}
