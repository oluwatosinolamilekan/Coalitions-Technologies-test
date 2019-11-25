<div class="form-group">
    <form>
        @csrf
        <div class="form-group">
            <label for="">Product Name</label>
            <input type="text" class="form-control"  name="name" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
            <label for="">Quantity in stock</label>
            <input type="number" class="form-control" name="quantity" placeholder="Enter Stock">
        </div>
        <div class="form-group">
            <label for="">Price Per item</label>
            <input type="number" class="form-control" name="price" placeholder="Enter Stock">
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var route = "{{route('product.store')}}";
            $("#submit").click(function(e){
                e.preventDefault();
                var name = $("input[name=name]").val();
                var quantity  = $("input[name=quantity]").val();
                var price = $("input[name=price]").val();
                $.ajax({
                    type:'POST',
                    url:route,
                    data:{
                        name:name, 
                        quantity :quantity , 
                        price:price
                    },
                    success:function(data){
                        location.reload();
                        // $('#table').append("<tr"+"'><td>" + data.name + "</td><td>" + data.quantity +"</td><td>" + data.price + "</td><td>"+data.created_at+"</td></tr>");
                        $("input[name=name]").val('');
                        $("input[name=quantity]").val('')
                        $("input[name=price]").val('')
                    }
                });
            });
        });
    </script>
@endsection