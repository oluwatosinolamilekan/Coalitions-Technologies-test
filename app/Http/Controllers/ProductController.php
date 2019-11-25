<?php

namespace App\Http\Controllers;
use App\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   private $product;

   public function __construct(ProductService $product)
   {
       $this->product = $product;
   }

   public function index()
   {
      $products = $this->product->allProduct();
      $total = 0;
      foreach($products as $product) {
        $total += $product->price * $product->quantity;
      }
      return view('products.index',compact('products','total'));
   }

   public function getStore()
   {
       return view('products.create');
   }

   public function store(StoreProductRequest $request)
   {
       try {
           $validator = $request->validated();
           if($validator){
               $storeProduct = $this->product->storeProduct($request);
               if ($storeProduct) {
                   return response()->json($storeProduct);
               }
           }
       } catch (\Exception $e) {
           return response()->json($e->getMessage());
       }
   }
}
