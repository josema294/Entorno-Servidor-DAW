<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class ProductController
{
    public function index()
{
    $products = Product::all();
    return view('products', compact('products'));
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('products')->with('success', 'Product deleted successfully');
}

public function create()
{
    return view('products.create');
}

public function store(Request $request)
{
    // Validación de los datos del formulario
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric'
    ]);

    // Creación del nuevo producto en la base de datos
    $product = new Product;
    $product->name = $request->name;
    $product->price = $request->price;
    $product->save();

    // Redireccionar al usuario a una página, por ejemplo, la lista de productos
    return redirect()->route('products')->with('success', 'Product added successfully!');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    // Validar los datos de entrada
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        // Asegúrate de validar todos los campos que necesitas actualizar
    ]);

    // Buscar el producto, si no existe, fallará y lanzará un ModelNotFoundException
    $product = Product::findOrFail($id);

    // Actualizar el producto con los datos validados
    $product->update($validatedData);

    // Redireccionar al usuario a la lista de productos con un mensaje de éxito
    return redirect()->route('products')->with('success', 'Producto actualizado correctamente.');
}




}
