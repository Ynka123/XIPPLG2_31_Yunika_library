<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'status' => 200,
            'message' => ' Categories retrieved succesfully.' ,
            'data' =>$categories
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:225']);
        $category = Category::create($request->all());
        return response()->json([
            'status' => 200,
            'message' => ' Categories retrieved succesfully.' ,
            'data' =>$categories
        ], 201);
    }

    public function show($id)
    {
        $categories = Category::find($id);

        if (!$category){
            return response()->json([
            'status' => 404,
            'message' => ' Category not found.' ,
            'data' =>null  
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => ' Categories retrieved succesfully.' ,
            'data' =>$categories
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $categories = Category::find($id);

        if (!$category){
            return response()->json([
            'status' => 404,
            'message' => ' Category not found.' ,
            'data' =>null  
            ], 404);
        }

        $request->validate(['name' => 'string|max:225']);
        $category->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => ' Categories retrieved succesfully.' ,
            'data' =>$categories
        ], 200);
    }

    public function destroy($id)
    {
        $categories = Category::find($id);

        if (!$category){
            return response()->json([
            'status' => 404,
            'message' => ' Category not found.' ,
            'data' =>null  
            ], 404);
        }

        $category->delete();

        return response()->json([
            'status' => 200,
            'message' => ' Categories retrieved succesfully.' ,
            'data' =>$categories
        ], 200);
    }
}
