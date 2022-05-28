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
                    <li class="breadcrumb-item active" aria-current="page">Update Password</li>

                  </ol>
                <h2 class="text-start">Update Password</h2>
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header card text-white bg-success mb-1 showtext" >เเก้ไขรหัสผ่าน</div>
                        <div class="card-body">
                            <form action="{{url('/user/updatepassword/'.$user->id)}}" method="post">
                                @csrf

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

                                
                                    <input type="submit" value="อัพเดท" class="btn btn-success mt-2 btn-lg">
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
