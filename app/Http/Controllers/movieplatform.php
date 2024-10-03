<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movielist;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class movieplatform extends Controller
{
    /**
     * Store a newly created resource in storage.
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $movie = movielist::all();
       return response()->json($movie);  
        }catch (Exception $movie){
            return response()->json(['error'=>'please check ur (get)  '],500);
        }
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        logger('error');
        try{
            $movie = movielist::create($request->all());
            return response()->json($movie , 201);

        }catch(QueryException $movie){
            logger('as',[$movie]);
            return response()->json(['error'=>'failed to post'],400);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $movie = movielist::findOrFail($id);
            return response()->json($movie);
        }catch(ModelNotFoundException $movie){
            return response()->json(['error'=>'list not found please check the show method', 'message' => 'employee not created'],404);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            logger("request-check", [$request]);
            $movie = movielist::findOrFail($id);
            $movie->update($request->all());
            return response()->json($movie);
        }catch(ModelNotFoundException $movie){
            return response()->json(['error'=>'not found','message' => 'movie not created'],404);
        }catch(QueryException $movie){
            return response()->json(['error'=>'failed to update','message'=>'movie not created'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       try{
        $movie = movielist::findOrFail($id);
        $movie->delete();
        return response()->json(['message'=>'movie deleted']); 
         }catch(ModelNotFoundException $movie){
            return response()->json(['error'=>'movie not found','message'=>'noe found'],404);
         }
    }
}
