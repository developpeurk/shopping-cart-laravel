@extends('layouts.app')
@section('style')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                  <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td> 
                </tr>       
                @endforeach
                </tbody>
              </table>
        </div>

        <div class="col-md-12">
            <table class="table">
            <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add user</button>
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FST</th>
                    <th scope="col">MEGA</th>
                    <th scope="col">Dossier</th>
                    <th scope="col">TYPE</th>
                    <th scope="col">USER_id</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $key=>$pay)
                  <tr>
                    <th scope="row">{{ $key+1}}</th>
                    <td>{{ $pay->fst }}</td>
                    <td>{{ $pay->mega }}</td>
                    <td>{{ $pay->dossier }}</td>
                    <td>{{ $pay->type }}</td> 
                    <td>{{ $pay->user->name }}</td> 

                </tr>       
                @endforeach
                </tbody>
              </table>
        </div>

        <!--Test -->
        <div class="col-md-12">
          <table class="table">
              <thead>
                <tr>
             
                  <th scope="col">Payments</th>
                  <th scope="col">Formation</th>
                  <th scope="col">Student</th>
                  <th scope="col">Total FST</th>
                  <th scope="col">Total MEGA</th>
                  <th scope="col">Total Dossier</th>
                  <th scope="col">TYPE</th>
                  <th scope="col">Etat</th>
                
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $key=>$student)                
                <tr>
  
                <td><a href="{{route('user.show',$student->id)}}"><button class="btn btn-success">Voir</button></a></td>
                  <td><span class="badge badge-danger">Licence Java</span>
                  </td>
                  <td>{{ $student->name }}</td> 
                  <td>{{ $student->payments->sum('fst') }}</td>
                  <td>{{ $student->payments->sum('mega')  }}</td>
                  <td>{{$student->payments->sum('dossier')  }}</td>                 
                  <td>{{ $student->payments[0]->type }}</td>
                  <td>  
                    <span>{{ round(((($student->payments->sum('fst') + $student->payments->sum('mega') + $student->payments->sum('dossier')) / 30500)) *100)}}%</span>
                    <div class="progress progress-xs progress-striped active">
                    <div class="progress-bar bg-success" style="width: {{ round(((($student->payments->sum('fst') + $student->payments->sum('mega') + $student->payments->sum('dossier')) / 30500)) *100)}}%"></div>
                    </div>




                  </td>
              </tr>       
              @endforeach
              </tbody>
            </table>
      </div>


<!-- fin test -->


        <!-- Modal -->
        <form action="{{url('/users/store')}}" method="POST">
          @csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un paiement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
        <div class="form-group">
          <select class="form-control" name="user_id">
            <option value="">Choisir l'option</option>
            @foreach($users as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
        </div>
         <div class="form-group">
           <input type="text" class="form-control" name="fst" placeholder="fst">
         </div>
         <div class="form-group">
           <input type="text" class="form-control" name="mega" placeholder="mega">
         </div>
         <div class="form-group">
           <input type="text" class="form-control" name="dossier" placeholder="dossier">
         </div>
         
         <div class="form-group">
           <select class="form-control" name="type">
             <option value="">Choisir l'option</option>
             <option value="virement">virement</option>
             <option value="espece">espèce</option>
           </select>
         </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
 
    </div>
  </div>
</div>
</form>
    </div>
</div>
@endsection