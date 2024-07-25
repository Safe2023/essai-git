<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creat_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "nom_produit" => 'required',
            "description_produit" => 'required',
            "description_complete" => 'required',
            "image_produit" => 'required',
            "prix_produit" => 'required',
        ]);
        $data = Product::create($validateData);
        return response()->json([
            "status" => true,
            "message" => "Ajouter avec succès!",
            "data" => $data
        ], 201);
    }

    public function liste()
    {
        $liste = Product::all();
        return response()->json([
            "status" => true,
            "message" => "L'ensmble des produits",
            "data" => $liste

        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit = Product::findOrFail($id);
        return response()->json([
            "status"=> true,
            "data" => $produit,
            "message"=> "Detail du produit",
        ],201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit= Product::findOrFail($id);

        return view('modifier', compact('produit'));
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
       
        $request->validate([
            "nom_produit" => 'required',
            "description_produit" => 'required',
            "description_complete" => 'required',
            "image_produit" => 'required',
            "prix_produit" => 'required',
        ]);
       
        $produit= Product::findOrFail($id);
       $produit->update($request->all());
       return response()->json([
        "status" => true,
        "message" => "Modifier avec succès!",
        "data" => $produit
       ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Product::findOrFail($id);
        $produit->delete();
        return response()->json([
            "status" => true,
            "message" => "Supprimer avec succès!",
            "data" => $produit
        ], 201);
    }
}
