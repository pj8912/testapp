<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

	public function index(){
		$products = Product::all();
		return view('product.list', ['products' => $products]);
	}

	public function create(){

		return view('product.add');
	}

	public function store(Request $request){

		$newPost = Product::create([
			'title' => $request->title,
			'short_notes' => $request->short_notes,
			'price'=> $request->price
		]);
		// return redirect('product/'.$newPost->id.'/edit');
		return redirect('product/');
	}

	public function show(Product $product){
		//
	}

	public function  edit($id){

		$product = Product::findOrFail($id);
		return view('product.edit',  compact('product'));
	}

	// public function update(Request $request, Product $product){

	// 	$product->update([

	// 		'title' => $request->title,
	// 		'short_notes' => $request->short_notes,
	// 		'price' => $request->price
	// 	]);

	// 	return redirect('product/');

	// }

	public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('product/'.$id.'/edit');
    }



	public function destroy($id){

		Product::destroy($id);
		return redirect('product/');
	}

   
}
