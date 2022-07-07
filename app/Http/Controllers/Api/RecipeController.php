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

    return response()->json([
      'message' => 'Recipe Added Successfully'
    ], 200);
  }

  public function update(Request $request, $id)
  {
    // $data = $request->validate([
    //   'name' => 'nullable|string|max:100',
    //   'servings' => 'nullable|integer'
    // ]);
    $recipe = Recipe::where('id', $id)->first();
    if ($recipe) {
      // $recipe->update($data);
      $data = $recipe->update([
        'name' => $request->name,
        'servings' => $request->servings,
        'quantity' => $request->quantity,
        'energy' => $request->energy,
        'slug' => Str::slug($request->name, '-')
      ]);
      $recipe['nutrition']->update([
        'protein' => $request->protein,
        'fat' => $request->fat,
        'carb' => $request->carb
      ]);
      return response()->json([
        'message' => 'Recipe Added',
        'data' => $data
      ], 200);
    } else {
      return response()->json([
        'message' => 'Recipe Failed to Add'
      ], 404);
    };
  }
  public function destroy($id)
  {
    $recipe = Recipe::where('id', $id)->first();
    $data = $recipe->delete();
    if ($data) {
      return response()->json([
        'message' => 'Success Destroy Recipe'
      ], 200);
    } else {
      return response()->json([
        'message' => 'Failed Destroy Recipe'
      ], 400);
    }
  }
}
