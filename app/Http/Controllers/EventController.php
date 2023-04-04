<?php

namespace App\Http\Controllers;

use App\Models\Shape;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function postShapes(Request $request)
    {
    $shapes = $request->json()->all();
    foreach ($shapes as $pathString) {
        Shape::create([
            'path'=> $pathString
        ]);
    }
    return response()->json(['message' => 'Shapes saved successfully']);
    }

    public function getAllShapes()
    {
    $shapes = Shape::all()->toArray();
    return response()->json($shapes);
    }
public function deleteLatter()
{
    $shape = Shape::latest()->first();
    $deletedShape = $shape->toArray(); 
    $shape->delete();
    return response()->json(['message' => 'Shape deleted successfully', 'data' => $deletedShape]); 
}
public function index()
{
echo 'Teste';
}

}