<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use App\Models\Nutrition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResources;

class RecipeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // return Recipe::all();
    return RecipeResources::collection(Recipe::all());
  }

  public function show($id)
  {
    $recipe = Recipe::where('id', $id)->first();
    return new RecipeResources($recipe);
  }

  public function store(Request $request)
  {
    $recipe = Recipe::create([
      'name' => $request->name,
      'servings' => $request->servings,
      'quantity' => $request->quantity,
      'energy' => $request->energy,
      'slug' => Str::slug($request->name, '-')
    ]);
    Nutrition::create([
      'recipe_id' => $recipe->id,
      'protein' => $request->protein,
      'fat' => $request->fat,
      'carb' => $request->carb
    ]);

    // $recipe = new Recipe;
    // $recipe->name = $request->name;
    // $recipe->servings = $request->servings;
    // $recipe->quantity = $request->quantity;
    // $recipe->energy = $request->energy;
    // $recipe->slug = Str::slug($request->name, '-');

    // // $recipe->nutrition->protein = $request->protein;
    // // $recipe->nutrition->fat = $request->fat;
    // // $recipe->nutrition->carb = $request->carb;

    // $nutrition = new Nutrition;
    // $nutrition->recipe_id = $recipe->id;
    // $nutrition->protein = $request->protein;
    // $nutrition->fat = $request->fat;
    // $nutrition->carb = $request->carb;

    // $recipe->save();
    // $nutrition->save();
    return response()->json([
      'message' => 'Recipe Added Successfully'
    ], 200);
  }
}
