<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class projet_2control extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            // "table" => 'required',
        ]);

        Product::create($validateData);

        return redirect()->back()->with('success', 'Ajouter avec succès!');
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
        return view('detail', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Product::findOrFail($id);

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
            //  "table" => 'required',
        ]);

        $produit = Product::findOrFail($id);
        $produit->update($request->all());
        //     dd($request->all());
        return redirect()->route('table')->with('success', 'produit modifié avec succés!');
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

        return redirect()->back()->with('success', 'produit modifié avec succès!');
    }

    public function liste()
    {
        $liste = Product::all();

        return view('liste', ['liste' => $liste]);
    }

    public function table()
    {
        $table = Product::all();

        return view('table', ['table' => $table]);
    }
}
