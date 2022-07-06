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
}
