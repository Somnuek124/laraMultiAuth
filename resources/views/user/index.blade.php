@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
 
                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    <a href="{{url('admin/routes')}}">Admin</a>
                   
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                            <h2> Table User</h2>
                            @if(\Session::has('success'))
                            <div class="alert alert-success">
                            <p>{{ \Session::get('sucess') }}</p>
                            </div>
                            @endif
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                

                                    </tr>
                                    @foreach ($users as $row)<tr>
                                    <td>{{$row['id']}}</td> 
                                    <td>{{$row['name']}}</td> 
                                    <td>{{$row['email']}}</td>
            
                                    </tr>
                                    @endforeach
                                </table>
                        </div>
                       
                    </div>
                    </div>

                    

                    @else
                    <div class="panel-heading">Normal User</div>
                    

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection