@extends('admin.layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="py-12">
        {{-- <div class="wrapper">
            <div class="sidebar col-md-3 col-lg-2 " >
                <h2>Management</h2>
                <ul>
                    <li>
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashbord.user') }}">
                          <i class="fas fa-user"></i>                      
                          <span class="ml-4">USER</span>
                        </a></li>
                    <li>
                        <a class="nav-link " aria-current="page" href="{{ route('admin.dashbord.news') }}">
                          <i class="fas fa-newspaper"></i>
                          <span class="ml-2">NEWS</span>
                        </a>
                      
                    </li>
                    <li>
                        <a class="nav-link " aria-current="page" href="{{ route('admin.dashbord.popup') }}">
                          <i class="fas fa-image"></i>
                          <span class="ml-4">POPUP</span>
                        </a>
                    
                    </li>
                    <li>
                        <a class="nav-link " aria-current="page" href="{{ route('admin.dashbord.log') }}">
                          <i class="fas fa-tasks"></i>
                          <span class="ml-4">LOG</span>
                        </a>
                      
                    </li>
                </ul> 
            </div> --}}
        <div class="container">
            <div class="row mt-3" style="margin-left: 20px">
                <ol class="breadcrumb ms-3">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('userall')}}">User Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update User</li>

                  </ol>
                <div class="col-md-8">
                    <h1 class="text-center">User UpdateForm</h1>

                    {{-- <a href="{{route('userall')}}" class="btn btn-primary mb-3 btn-lg">back</a> --}}

                    <div class="card">
                        <div class="card-header card text-white bg-success mb-1 showtext text-center"  >FORM UPDATE USER</div>
                        <div class="card-body">
                            <form action="{{url('/user/update/'.$user->id)}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label  for="name">name</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                @error('name')
                                <div class="my-1">
                                <span class="text-danger py-2">{{$message}}</span>
                                </div>
                                @enderror

                                    <label for="username">username</label>
                                    <input type="text" name="username" class="form-control" value="{{$user->username}}">
                                @error('username')
                                <div class="my-1">
                                    <span class="text-danger py-2">{{$message}}</span>
                                </div>
                                @enderror
                                    <label for="email">email</label>
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}">

                                 @error('email')
                                    <div class="my-1">
                                        <span class="text-danger py-2">{{$message}}</span>
                                    </div>
                                 @enderror

                                    

                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="radio" id="is_admin" name="is_admin" value="0"
                                    checked>
                                    <label for="huey">user</label>
                                </div>
                               
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" id="is_admin" name="is_admin" value="1">
                                    <label for="is_admin">admin</label>
                                </div>

                                <div class="form-check mt-1">
                                    <input class="form-check-input" type="radio" id="isban" name="isban" value="0"
                                    checked>
                                    <label for="isban">enable</label>
                                </div>
                               
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" id="isban" name="isban" value="1">
                                    <label for="isban">disable</label>
                                </div>

                                <td><a href="{{url('/user/editpassword/'.$user->id)}}" class="btn btn-warning btn-lg">CHANGPASSWORD</a></td>

                                
                                    <input type="submit" value="SUBMIT" class="btn btn-success btn-lg">
                                </div>
                               
                            </form>
                        </div>
                    </div>
           
                      
                </div>
            </div>
        </div>
    </div>

</body>
</html>
@endsection
