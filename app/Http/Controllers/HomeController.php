<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Plate;

class HomeController extends Controller
{
    public function index()
    {
        $plates = Plate::all();

        $plateIngredients = [];
        foreach($plates as $plate){
            $plate = Plate::find($plate->id);
            $ingredients = [];
            foreach ($plate->ingredients as $ingredient) {
                $ingredients[] = [
                    "quantity" => $ingredient->pivot->quantity,
                    "name" => $ingredient->name
                ];
            }
            $plateIngredients[] = ['plate' => $plate, 'ingredients' => $ingredients];
        }

        return view('prueba', ['plateIngredients' => $plateIngredients]);
    }

    // public function index()
    // {
    //     $plates = Plate::all();
    //     foreach ($plates as $plate) {
    //         $ingredients = DB::table('plates_ingredients')
    //         ->select('plates_ingredients.quantity', 'ingredients.name')
    //         ->leftjoin('ingredients', 'plates_ingredients.id_ingredient', '=', 'ingredients.id')
    //             ->where('plates_ingredients.id_plate', '=', $plate->id)
    //             ->get();

    //         $plateIngredients[] = ['plate' => $plate, 'ingredients' => $ingredients];
    //     }

    //     return view('prueba', ['plateIngredients' => $plateIngredients]);
    // }
}
