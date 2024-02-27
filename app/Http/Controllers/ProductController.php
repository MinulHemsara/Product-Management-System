<?php

namespace App\Http\Controllers;

use Log;
use Exception;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

  // Show all products
    public function index(){
        return view('products.index',[
            'products'=>Product::latest()->get()
        ]);
    }

    //Show single product
    public function show(Product $product){         
        return view('products.show', [
            'product' => $product
        ]);
    }

    // Show Create Form
    public function create(){
        return view('products.create');
    }

    // Store Product Data
    public function store(Request $request){

      try {
          // Validate the form fields
          $formFields = $request->validate([
              'product_name'=> 'required',
              'price'=> ['required','numeric'],
              'description'=> 'required',
          ]);
  
          // Check if image file is present in the request and store it
          if($request->hasFile('image')){
              $formFields['image'] = $request->file('image')->store('images','public');
          }
  
          // Add the user_id to the form fields
          $formFields['user_id'] = auth()->id();
  
          // Create Product
          Product::create($formFields);
  
          return redirect('/')->with('message','Product Created Successfully');
      } catch (Exception $e) {
          // Log the error
          Log::error('Error while storing product: ' . $e->getMessage());
  
          // Return back with error message
          return back()->withInput()->withErrors(['error' => 'An error occurred while processing your request. Please try again later.']);
      }
  }
  

    // Show Edit Form
    public function edit(Product $product){
          return view('products.edit', ['product'=> $product]);
    }


  // Update Product Data
  public function update(Request $request,Product $product){

  // Check if the current user is authorized to update the listing
  if($product->user_id != auth()->id()){
    abort(403,'unauthorized action');
  }


    $formFields = $request->validate([
      'product_name'=> 'required',
      'price'=> ['required','numeric'],
      'description'=> 'required',
    ]);
  
    if($request->hasFile('image')){
      $formFields['image'] = $request->file('image')->store('images','public');
    }
  
  
     $product->update($formFields);
  
      return redirect('/')->with('message','Product Updated Successfully');
  
  }

  // Delete Product
  public function delete(Product $product){

    // Check if the current user is authorized to delete the listing
    if($product->user_id != auth()->id()){
      abort(403,'unauthorized action');
    }

    // Delete the Product
    $product->delete();

    // Redirect to the home
    return redirect('/')->with('message','Product Deleted Successfully');
  }

  // Manage Products
  public function manage(){
    return view('products.manage',['products'=>auth()->user()->products()->get()]);
}
}