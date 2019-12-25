@extends('layouts.app')
@section('content')
             <!-- row -->
           @if(auth()->user()->is_admin == 1)
                                                <h2> Table User</h2>
                                                @if(\Session::has('success'))
                                                <div class="alert alert-success">
                                                <p>{{ \Session::get('success') }}</p>
                                                </div>
                                                @endif
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Profile Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        @foreach ($users as $row)<tr>
                                                        <td>{{$row['id']}}</td> 
                                                        <td>{{$row['name']}}</td> 
                                                        <td>{{$row['email']}}</td>
                                                        <td><img src="/images/paris.jpg" width="40%" class="img-thumbnail" /></td>
                                                        <td>
                                                            <form action="#" method="post">
                                                                <a href="#" class="btn btn-primary">Show</a>
                                                                <a href="#" class="btn btn-warning">Edit</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                  
                                      
                                        @else
                                        <div class="panel-heading">Normal User</div>
                                        @endif
            <!-- #/ container -->
@endsection