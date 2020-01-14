@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      @foreach ($carts as $cart)
    <div class="card mb-3">
      <div class="card-body">
        <table class="table table-striped">
          <thead>
           <tr>
             <th scope="col">Title</th>
             <th scope="col">Price</th>
             <th scope="col">Quantity</th>
             <th scope="col">Status</th>
           </tr>
          </thead>
          <tbody>

          </tbody>
              @foreach ($cart->items as $item)
                <tr>
                  <td> {{ $item['title'] }}</td>
                  <td> {{ $item['price'] }}</td>
                  <td> {{ $item['qty'] }}</td>
                  <td> Paid</td>
                </tr>
                @endforeach
              </table>
      </div>
    </div>
    <p class="badge badge-pill badge-info mb-3 p-3 text-white">Total price: ${{$cart->totalPrice}}</p>
@endforeach
    </div>
  </div>
</div>

@endsection