<?php

namespace App\Http\Controllers;

use App\Models\PlateIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlateIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PlateIngredient::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plate_id' => 'required',
            'ingredient_id' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'created' => false,
                'errors'  => $validator->errors()->all()
            ];
        }

        PlateIngredient::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PlateIngredient::find($id);
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
        $plateIngredient = PlateIngredient::findOrFail($id);
        $plateIngredient->fill($request->all());
        $plateIngredient->save();

        return $plateIngredient;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plateIngredient = PlateIngredient::findOrFail($id);
        $plateIngredient->delete();

        return $plateIngredient;
    }
}
