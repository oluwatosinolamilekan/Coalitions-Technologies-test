<div class="row">
        <div class="col-md-12">
           <div class="mb-3 float-right">
              <a href="{{route('product.add')}}" class="btn btn-primary">Add Product</a>
           </div>
           <table class="table table-striped">
              <thead>
                 <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity in stock</th>
                    <th scope="col">Price per item</th>
                    <th scope="col">Datetime submitted</th>
                    <th scope="col">Total value number</th>
                 </tr>
              </thead>
              <tbody>
                 @foreach($products as $key => $product)
                 <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->stock}}</td>
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
           </table>
           {{$products->render()}}
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
           @include('products.create')
        </div>
     </div>