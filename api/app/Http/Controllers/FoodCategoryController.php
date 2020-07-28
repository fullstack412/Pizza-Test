<?php

namespace App\Http\Controllers;

use App\FoodCategory;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\FoodResource;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    //
    public function index()
    {
        return CategoryResource::collection(FoodCategory::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, ["name" => "required|min:1|max:50"]);

        $category = new FoodCategory();
        $category->fill($request->all());

        if ($category->save())
            return response(["id" => $category->id], 200);
        return response('', 500);
    }

    public function show($id)
    {
        return new CategoryResource(FoodCategory::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ["name" => "required|min:1|max:50"]);

        $category = FoodCategory::find($id);
        $category->fill($request->all());
        
        if ($category->save())
            return response('', 200);
        return response('', 500);
    }

    public function destroy($id)
    {
        $category = FoodCategory::find($id);

        if ($category->delete())
            return response('', 200);
        return response('', 500);
    }
}
