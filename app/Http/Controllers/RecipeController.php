<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResources;
use Illuminate\Support\Str;
use App\Models\Recipe;
use App\Models\Nutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $collections = Http::get('http://recipe-api.test/api/recipes');
    $data = [
      'title' => 'Recipe List'
    ];

    if (isset($_SERVER['HTTP_REFERER'])) {
      $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
    } else {
      $backurl = '';
    }
    return view('recipes.index', ['collections' => $collections['data']], compact('data', 'backurl'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    if (isset($_SERVER['HTTP_REFERER'])) {
      $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
    } else {
      $backurl = '/';
    }
    $data = [
      'title' => 'New Recipe'
    ];
    return view('recipes.create', compact('backurl', 'data'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // $collections = Http::get('http://recipe-api.test/api/recipes')->json();
    // $recipe = new Recipe;
    // $recipe->name = $request->name;
    // $recipe->servings = $request->servings;
    // $recipe->quantity = $request->quantity;
    // $recipe->energy = $request->energy;
    // $recipe->slug = Str::slug($request->name, '-');
    // $recipe->nutrition = $request->id;
    // $recipe_result = $recipe->save();
    // dd($recipe);
    $recipe = Recipe::create([
      'name' => $request->name,
      'servings' => $request->servings,
      'quantity' => $request->quantity,
      'energy' => $request->energy,
      'slug' => Str::slug($request->name, '-')
    ]);

    $nutrition = Nutrition::create([
      'recipe_id' => $recipe->id,
      'protein' => $request->protein,
      'fat' => $request->fat,
      'carb' => $request->carb
    ]);

    return redirect()->route('recipes.index', compact('recipe', 'nutrition'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($slug)
  {
    $collection = Http::get('http://recipe-api.test/api/recipe/show/{id}')->json();
    $recipe = Recipe::where('slug', $slug)->first();
    if (isset($_SERVER['HTTP_REFERER'])) {
      $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
    } else {
      $backurl = '/';
    }
    $data = [
      'title' => $recipe['name'] . "'s Info"
    ];

    return view('recipes.show', compact('slug', 'recipe', 'data', 'backurl'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($slug)
  {
    $recipe = Recipe::where('slug', $slug)->first();
    if (isset($_SERVER['HTTP_REFERER'])) {
      $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
    } else {
      $backurl = '';
    }
    $nutrition = Nutrition::all();

    return view('recipes.edit', compact('slug', 'recipe', 'backurl', 'nutrition'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Recipe $recipe)
  {
    $recipe->delete();

    return redirect()->route('recipes.index');
  }
}
