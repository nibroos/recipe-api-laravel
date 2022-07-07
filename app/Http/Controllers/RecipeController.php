<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    $collections = Http::get('http://recipe-api.test/api/recipes')->json();
    $data = [
      'title' => 'Recipe List'
    ];

    if (isset($_SERVER['HTTP_REFERER'])) {
      $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
    } else {
      $backurl = '';
    }
    // return view('recipes.index', ['collections' => $collections['data']], compact('data', 'backurl'));
    return view('recipes.index', compact('collections', 'data', 'backurl'));
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
    $response = Http::asForm()->post('http://recipe-api.test/api/recipe/store', [
      'name' => $request->name,
      'servings' => $request->servings,
      'quantity' => $request->quantity,
      'energy' => $request->energy,
      'slug' => Str::slug($request->name, '-'),
      'protein' => $request->protein,
      'fat' => $request->fat,
      'carb' => $request->carb
    ]);
    // $recipe = Recipe::create([
    //   'name' => $request->name,
    //   'servings' => $request->servings,
    //   'quantity' => $request->quantity,
    //   'energy' => $request->energy,
    //   'slug' => Str::slug($request->name, '-')
    // ]);

    // $nutrition = Nutrition::create([
    //   'recipe_id' => $recipe->id,
    //   'protein' => $request->protein,
    //   'fat' => $request->fat,
    //   'carb' => $request->carb
    // ]);

    return redirect()->route('recipes.index', compact('response'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // $json = json_decode(file_get_contents('http://host.com/api/v1/users/1'), true);
    $collection = Http::get('http://recipe-api.test/api/recipe/show/' . $id)->json();
    // $recipe = Recipe::where('slug', $slug)->first();
    if (isset($_SERVER['HTTP_REFERER'])) {
      $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
    } else {
      $backurl = '/';
    }
    $data = [
      'title' => $collection['name'] . "'s Info"
    ];

    return view('recipes.show', compact('collection', 'data', 'backurl'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    // $recipe = Recipe::where('slug', $slug)->first();
    $collection = Http::get('http://recipe-api.test/api/recipe/show/' . $id)->json();
    if (isset($_SERVER['HTTP_REFERER'])) {
      $backurl = htmlspecialchars($_SERVER['HTTP_REFERER']);
    } else {
      $backurl = '';
    }
    // $nutrition = Nutrition::all();

    return view('recipes.edit', compact('backurl', 'collection'));
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
    Http::asForm()->post('http://recipe-api.test/api/recipe/update/' . $id, [
      'id' => $request->id,
      'name' => $request->name,
      'servings' => $request->servings,
      'quantity' => $request->quantity,
      'energy' => $request->energy,
      'slug' => Str::slug($request->name, '-'),
      'protein' => $request->protein,
      'fat' => $request->fat,
      'carb' => $request->carb
    ]);
    return redirect()->route('recipes.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Http::delete('http://recipe-api.test/api/recipe/delete/' . $id)->json();
    return redirect()->route('recipes.index');
  }
}
