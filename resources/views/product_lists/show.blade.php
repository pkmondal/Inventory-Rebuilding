@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $product->product_name }}</div>
                <div class="card-body">
	               <a class="btn btn-default" href="/product_lists">Go Back</a>
                    <hr/>
                        <div class="row">
                            <div class="col-md-4 text-md-right"> Product ID: </div>
                            <div class="col-md-6"> {{ $product->id }} </div>
                        </div>                   
                        <div class="row">
                            <div class="col-md-4 text-md-right"> Category ID: </div>
                            <div class="col-md-6"> {{ $product->category_id }} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-md-right"> Product Number: </div>
                            <div class="col-md-6"> {{ $product->product_number }} </div>
                        </div>                        
                        <div class="row">
                            <div class="col-md-4 text-md-right"> Party ID: </div>
                            <div class="col-md-6"> {{ $product->party_id }} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-md-right"> Barcode: </div>
                            <div class="col-md-6"> {{ $product->barcode }} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-md-right"> Sale Price: </div>
                            <div class="col-md-6"> {{ $product->sale_price }} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-md-right"> Print Quantity: </div>
                            <div class="col-md-6"> {{ $product->print_quantity }} </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-md-right"> Status: </div>
                            <div class="col-md-6">
                                @if($product->published == 1)
                                    Yes
                                @else
                                    No
                                @endif 
                            </div>
                        </div>                                                                                                                       
	
                    <hr/>
                	<small>Product added on {{ $product->created_at }}</small>
                	<hr/>

                    @if(!Auth::guest())
                        @if(Auth::user()->id == $product->user_id)
                            <a class="btn btn-default" href="/$products/{{ $product->id }}/edit">Edit</a>
                            {!! Form::open(['action' => ['$productsController@destroy', $product->id], 'method' => 'PSOT', 'class' => 'pull-right']) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {!! Form::close() !!}
                        @endif
                    @endif
                 </div>
            </div>
        </div>
    </div>
</div>  
@endsection