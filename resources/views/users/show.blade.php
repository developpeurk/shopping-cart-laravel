@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
        <!--Test -->
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
               
            
                    <th scope="col">Formation</th>
                    <th scope="col">Student</th>
                    <th scope="col">FST</th>
                    <th scope="col">MEGA</th>
                    <th scope="col">Dossier</th>
                    <th scope="col">TYPE</th>
                    <th scope="col">Date</th>
                  
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach($payments as $payment)
                  <tr>
    
                    <td>
                        <span class="badge badge-danger">Licence Java JEE</span>
                    </td>
                    
                    
                    <td>{{$payment->user->name }}</td>
                   
                    <td>{{ $payment->fst }}</td> 
                     <td>{{ $payment->mega}}</td> 
                    <td>{{ $payment->dossier }}</td> 
                    <td>{{ $payment->type }}</td> 
                     <td>{{ date('d-M-Y',strtotime($payment->created_at)) }}</td>
                    </tr>       
                    @endforeach
                    <tr>
                        <th colspan="2">Total</th>
                        <td><strong>{{$payments->sum('fst')}}</strong></td>
                        <td><strong>{{$payments->sum('mega')}}</strong></td>
                        <td><strong>{{$payments->sum('dossier')}}</strong></td>
                       </tr>

                       <tr>
                           @if((($payments->sum('fst') + $payments->sum('mega') + $payments->sum('dossier')) - 30500) == 0  )
                        <th colspan="2">status</th>
                           <td><h3><span class="badge badge-success">Paid</span></h3></td>
                        @else
                        <th colspan="2">Reste à Payer</th>
                        <td>
                            <strong>
                                <h3>

                                    <span  class="badge badge-primary" >{{30500 - ($payments->sum('fst') + $payments->sum('mega') + $payments->sum('dossier')) }}</span>
                                </h3>
                            </strong>
                        </td>
                        @endif
                       </tr>
                     
     
                </tbody>
              </table>
        </div>
  
  
  <!-- fin test -->
        </div>
    </div>
</div>
@endsection