@extends('admin.layouts.dashbord')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body >
    <div class="py-12">
         <div class="wrapper">
                <div class="sidebar col-md-3 col-lg-2 col-sm-1" >
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
                </div>
        <div class="container">
            <div class="row mt-3" style="margin-left: 20px">
                
                <ol class="breadcrumb ms-3">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Management</li>
                  </ol>
                <h2 class="text-center mb-4" style="font-size: 45px">User Management</h2>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8" >
                    
                    @if (session('adduser'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'ADD SUCCESS',
                                text: 'DONE',
                            
                                })
                        </script>
                    @endif
                    @if (session('delete'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'DELETE SUCCESS',
                                text: 'DONE',
                            
                                })
                        </script>
                    @endif
                    @if (session('update'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'UPDATE SUCCESS',
                            text: 'DONE',
                        
                            })
                        </script>
                            @endif
                            @if (session('password'))
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'UPDATE PASSWORD SUCCESS',
                                    text: 'DONE',
                                
                                    })
                            </script>
                        @endif

                    <div class="card table-responsive">
                        <div class="card-header card text-dark  mb-1" style="background-color: rgba(37, 38, 49, 0.2)"><h4 class="showtexthead text-center">USER DETAIL</h4></div>
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th class="showtext" scope="col">ID</th>
                                        <th class="showtext" scope="col">Name</th>
                                        <th class="showtext" scope="col">Username</th>
                                        <th class="showtext" scope="col">EMAIL</th>
                                        <th class="showtext" scope="col">ROLES</th>
                                        <th class="showtext" scope="col">STATUS</th>
                                        <th class="showtext" scope="col">UPDATE</th>
                                        <th class="showtext" scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $row)
                                        <tr>
                                            <th class="showtext">{{$row->id}}</th>
                                            <td class="showtext">{{Str::limit($row->name,20)}}</td>
                                            <td class="showtext">{{$row->username}}</td>
                                            <td class="showtext fs-6">{{$row->email}}</td>
                                            @if($row->is_admin == 0)
                                                <td class="showtext"><span class="badge bg-secondary">User</span></td>
                                            @else
                                                <td class="showtext"><span class="badge bg-primary">Admin</span></td>
                                            @endif
                                            @if($row->isban == 0)
                                            <td class="showtext"> <span class="badge bg-success">enable</span>
                                            </td>
                                            @else
                                            <td class="showtext"><span class="badge bg-danger">disable</span>
                                            </td>
                                            @endif
                                            <td class="showtext"><a href="{{url('/user/edit/'.$row->id)}}" class="btn btn-warning btn-sm">UPDATE</a></td>
                                            

                                            <td class="showtext"><a href="{{url('/user/delete/'.$row->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('ต้องการลบข้อมูล ใช่ไหม ?')">
                                            DELETE</td>

                                        </tr>
                                        @endforeach
                                    
                                    
                                    </tbody>
                                </table>
                                
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card text-white bg-success mb-1"><h4 class="showtexthead text-center">FORM ADD USER</h4></div>
                        <div class="card-body">
                            <form action="{{route('adduser')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" class="form-control" >
                                @error('name')
                                <div class="my-1">
                                <span class="text-danger py-2">{{$message}}</span>
                                </div>
                                @enderror

                                    <label for="username">username</label>
                                    <input type="text" name="username" class="form-control" >
                                @error('username')
                                <div class="my-1">
                                    <span class="text-danger py-2">{{$message}}</span>
                                </div>
                                @enderror
                                    <label for="email">email</label>
                                    <input type="email" name="email" class="form-control" >

                                 @error('email')
                                    <div class="my-1">
                                        <span class="text-danger py-2">{{$message}}</span>
                                    </div>
                                 @enderror

                                    <label for="password">password</label>
                                    <input type="password" name="password" class="form-control" >
                                @error('password')
                                <div class="my-1">
                                    <span class="text-danger py-2">{{$message}}</span>
                                    </div>
                                @enderror  

                                <label for="password">confirm password</label>
                                    <input type="password" name="password_confirmation" class="form-control" >
                                @error('password')
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
                                    <label for="enable">enable</label>
                                </div>
                               
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" id="isban" name="isban" value="1">
                                    <label for="isban">disable</label>
                                </div>
                                
                                    <input type="submit" value="SUBMIT" class="btn btn-success btn-lg">
                                </div>
                               
                            </form>
                        </div>
                    </div>
                </div>

</body>
</html>
@endsection
