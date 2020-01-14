@extends('layouts.app')
@section('content')
   <div class="container">
       <div class="section">
           @if( session()->has('success'))
             <div class="alert alert-success">
                 {{ session()->get('success') }}
             </div>
           @endif
           <div class="row">
               @foreach ($products as $item)
                   <div class="col-md-4">
                    <div class="card mb-2">
                        <img class="card-img-top" src="{{ $item->image }}" alt="{{ $item->title }}">
                        <div class="card-body">
                          <h5 class="card-title">{{ $item->title }}</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <p>
                            <span class="badge badge-danger">{{ $item->price }} $</span>
                        </p>
                          <a href="{{ Route('cart.add',$item->id) }}" class="btn btn-primary">Buy</a>
                        </div>
                      </div>
                   </div>
               @endforeach
           </div>
       </div>

   </div>
@endsection