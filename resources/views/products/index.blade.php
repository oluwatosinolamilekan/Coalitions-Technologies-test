@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-sm-3 col-md-8">
       @if(count($products) > 0)
      <table class="table table-striped" id="table">
         <thead>
            <tr>
               {{-- <th scope="col">#</th> --}}
               <th scope="col">Product Name</th>
               <th scope="col">Quantity in stock</th>
               <th scope="col">Price per item</th>
               <th scope="col">Datetime submitted</th>
               <th scope="col">Total value number</th>
               <th scope="col">Sum of Total Value Numbers</th>

            </tr>
         </thead>
         <tbody>
            @foreach($products as $key => $product)
            <tr>
               {{-- <th scope="row">{{++$key}}</th> --}}
               <td>{{$product->name}}</td>
               <td>{{$product->quantity}}</td>
               <td>{{$product->price}}</td>
               <td>
                  {{ Carbon\Carbon::parse($product->created_at)->toDayDateTimeString() }}
               </td>
               <td>
                  {{$product->stock * $product->price}}
               </td>
            </tr>
            @endforeach
         </tbody>
         <tfoot>
            <tr>
                <th id="total" colspan="5">Total :</th>
                <td>{{$total}}</td>
            </tr>
            </tfoot>
      </table>
      {{$products->render()}}
      @else
        <span>No Product Available</span>
      @endif
   </div>
   <div class="col-sm-9 col-md-4">
       <h2>Add New Product</h2>
       <br>
      @include('products.create')
   </div>
</div>
@endsection