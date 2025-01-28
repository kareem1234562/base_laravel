<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailsVar;
use App\Models\Varities as ModelsVarities;
use Illuminate\Http\Request;

class DetailsVarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $details_varities = ModelsVarities::find($id);

        if ($details_varities) {
            return response()->json(new DetailsVar($details_varities)); // Wrap it in a resource, not collection
        } else {
            return response()->json(['message' => 'No details varities found'], 404);
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
        $details_varities = ModelsVarities::find($id)??null;
        if($details_varities){
          $data=$request->except(['_token']);
          $update = $details_varities->update($data);
          if($update){
            return response()->json(['message' => 'Details varities updated successfully']);

          }else{
            return response()->json(['message' => 'Details varities not updated successfully'],404);
          }
        }else{
            return response()->json(['message' => 'Details varities not found'],404);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        
        //
    }
}
