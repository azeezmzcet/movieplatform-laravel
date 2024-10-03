<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\signuplist;
// use Exception;
// use Illuminate\Database\QueryException;

// use Illuminate\Database\Eloquent\ModelNotFoundException;

// class signupform extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     { 
//         logger("dfvdf");
//         try {
//             $signup = signuplist::all();
//             return response()->json($signup);
//         }catch(Exception $signup){
//             logger("svsdv",([$signup]));
//             return response()->json(['error'=>'som issuse in get','message'=>'some issue in get method'],500);       
//          }
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         try{
//             $signup =signuplist::create($request->all());
//             return response()->json($signup,200);
//         }catch(QueryException $signup){
//             return response()->json(['error'=>'failed to store','message'=>'please check the store and craeate'],400);
//         }
//     }

//     /**
//      * Display the specified resource.
//       */
//     // public function show(string $id)
//     // {
//     //     //
//     // }

//     /**
//      * Update the specified resource in storage.
//      */
//     // public function update(Request $request, string $id)
//     // {
//     //     //
//     // }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
        
//         try{
//             $signup=signuplist::findOrFail($id);
//             $signup->delete();
//             return response()->json(['message'=>'deleted successfully']);    
//         }catch(ModelNotFoundException $signup){
//             return response()->json(['error'=>'no yet to signup','message'=>'not found'],404);
//         }
//     }
// }
