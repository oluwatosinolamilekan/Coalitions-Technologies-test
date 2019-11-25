<?php

namespace App\Services;
use Carbon\Carbon;
use App\Models\Product;
use DB;
class ProductService
{

    public function allProduct()
    {   
        $products = Product::orderBy('name')->latest()->paginate(15);
        return $products;        
    }

    public function storeProduct($request)
    {
        DB::beginTransaction();

        $createProduct = Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'stock' => 13,
            'created_at' => Carbon::now()
        ]);

        if ($createProduct) {
            DB::commit();
            return $createProduct;
        }else{
            DB::rollback();
            return false;
        }
    }

    public function editProduct($id,$request)
    {
        DB::beginTransaction();

        $createProduct = Product::where('id',$id)->create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'updated_at' => Carbon::now()
        ]);

        if ($createProduct) {
            DB::commit();
            return $createProduct;
        }else{
            DB::rollback();
            return false;
        }
    }


    public function deleteProduct($id)
    {
        $findProduct = Product::find($id)->delete();
        return $findProduct;
    }
}