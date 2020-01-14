@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="row">

   
    @if($cart)
    
    <div class="col-md-8">
    
        @foreach ($cart->items as $product)
            <div class="card mb-2">
                <div class="card-title">
                    {{ $product['title'] }}
                </div>
                <div class="card-text">
                    ${{ $product['price'] }}
                    <a href="#" class="btn btn-danger btn-sm ml-4">Remove</a>
                <input type="number" name="qty" id="qty" value="{{ $product['qty'] }}">
                    <a href="#" class="btn btn-secondary btn-sm">Change</a>
                </div>
            </div>
        @endforeach
        <p><strong>Total: $ {{$cart->totalPrice}} </strong></p>
     </div>
   
     <div class="col-md-4">
         <div class="card bg-primary text-white">
             <div class="card-body">
                 <div class="card-title">
                     Your cart <hr>
                 </div>
                 <div class="card-text">
                     <p>
                         Total Amount is $ {{ $cart->totalPrice }}
                     </p>
                     
                     <p>
                        Total Quantities is $ {{ $cart->totalQty }}
                    </p>
                 <a class="btn btn-info" href="{{ Route('cart.checkout',$cart->totalPrice) }}">Checkout</a> 
                 </div>
             </div>
         </div>
     </div>
     @else
     <p>nothing here.....</p>
    @endif
   </div>
</div>
@endsection