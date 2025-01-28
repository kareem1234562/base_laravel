<?php

namespace App\Http\Controllers;

use App\Http\Resources\Varities;
use App\Models\Category;
use App\Models\Varities as ModelsVarities;
use Illuminate\Http\Request;

class VaritiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $varities=Category::find($id)->varities??null;
        if($varities){
            return response()->json(Varities::collection($varities));
        }else{
            return response()->json(['message'=>'No varities found'],404);
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
    public function store(Request $request,$id)
    {
        // make validation first

        $data=$request->except(['_token']);
        $data['category_id']=$id;
        $data['image']=upload_file('uploads/varities', $request->image);
       $create=ModelsVarities::create($data);
       if($create){
           return response()->json(['message' => 'Varity created successfully']);
       }else{
              return response()->json(['message' => 'Varity not created successfully'],404);
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
    public function update(Request $request,  $id)
    {
        $varity=ModelsVarities::find($id);
        if($varity){
            $data=$request->except(['_token']);
          if($request->hasFile('image')){
            $data['image']=upload_file('uploads/varities', $request->image);
        }else{
            $data['image']=$varity->image;
        }
            $update=$varity->update($data);
            if($update){
                return response()->json(['message' => 'Varity updated successfully']);
            }else{
                   return response()->json(['message' => 'Varity not updated successfully'],404);
            }
        }else{
            return response()->json(['message' => 'Varity not found'],404);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $varity=ModelsVarities::find($id);
        if($varity){
              $varity->delete();
              return response()->json(['message' => 'Varity deleted successfully']);
        }else{
            return response()->json(['message' => 'not found '],404);
        }
        //
    }
}
