<!DOCTYPE html>
<html lang="en">
<head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />


        <!-- Website CSS style -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <!-- Website Font style -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
        <!-- Google Fonts -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin-ext" rel="stylesheet">

        <title>Products</title>
    </head>
   
    <body>
        <div class="container">
            <div class="row main">
                <div class="main-login main-center">
                    <form class="" method="post" action="#">
                        
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Product Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="product-name" id="product-name"  placeholder="Enter Product Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Quantity in stock</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="quantity" id="quantity"  placeholder="Enter Quantity in stock"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Price per item</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="price-per-item" id="price-per-item"  placeholder="Enter Price per item"/>
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group ">
                            <input type="button" id="button" class="btn btn-primary btn-lg btn-block login-button" value="Submit">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>


<div class="container" style="margin: 25px auto;">
        <table id="products" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Product name</th>
                <th>Quantity in stock</th>
                <th>Price per item</th>
                <th>Total value number</th>
                <th>Datetime submitted</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products_data as $product)
            <tr>
                <td>{{ $product['product_name'] }}</td>
                <td>{{ $product['quantity'] }}</td>
                <td>{{ $product['price_per_item'] }}</td>
                <td>{{ $product['total_value'] }}</td>
                <td>{{ $product['datetime_submitted'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
        
        </div><!--container-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    


    <script type="text/javascript">
    
        $(document).ready( function(){

            $('#button').click( function(e){
                e.preventDefault();
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('product.store') }}",
                    method: 'POST',
                    data: {
                        'product-name': $('#product-name').val(),
                        'quantity': $('#quantity').val(),
                        'price-per-item': $('#price-per-item').val()
                    }
                })
                .done(function(data){
                    console.log(data);

                    var obj = JSON.parse(data);
                    
                    $('#products').prepend('<tr><td>'+ obj.product_name +'</td><td>'+ obj.quantity +'</td><td>'+ obj.price_per_item +'</td><td>'+ obj.total_value +'</td><td>'+ obj.datetime_submitted +'</td></tr>')
                    

                    /*products.row.add( [ {
                        "name":       obj.product_name,
                        "position":   obj.quantity,
                        "salary":     obj.price_per_item,
                        "start_date": obj.total_value,
                        "office":     obj.datetime_submitted
                    }] )
                    .draw();*/

                })
            });
        })
    </script>
    </body>
</html>