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
                        <a class="nav-link " aria-current="page" href="{{ route('admin.dashbord.user') }}">
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
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashbord.popup') }}">
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
                    <li class="breadcrumb-item"><a href="{{route('popupall')}}">Popup Management</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Add Popup</li>
                  </ol>
                <h1 class="text-center mb-3">Popup Management</h1>
               
                <div class="col-md-12">
                    {{-- <a href="{{route('popupall')}}" class="btn btn-primary mb-3 btn-lg">back</a> --}}

                    <div class="card">
                        <div class="card-header card text-white bg-success mb-1 showtext text-center">ADD POPUP</div>
                        <div class="card-body">
                            <form action="{{route('addpopup')}}" method="post" enctype="multipart/form-data">
                                @csrf

                       
                            <div class="form-group">
                                    <label for="image">image</label>
                                    <input type="file" name="image" class="form-control my-2" >
                                @error('image')
                                    <div class="my-1">
                                    <span class="text-danger py-2">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
       
                            <div class="form-group">
                                <label for="content">content</label>
                                <textarea class="form-control mb-3" name="content" id="content" cols="30" rows="10"></textarea>

                               
                                    @error('content')
                                    <div class="my-1">
                                    <span class="text-danger py-2">{{$message}}</span>
                                    </div>
                                    @enderror

                            </div>

                            <div class="form-group">
                                    <label for="content">startdate</label>
                                    <input type="date" name="startDate" id="startDate" class="mb-3 form-control">    
                    
                                        @error('startDate')
                                        <div class="my-1">
                                        <span class="text-danger py-2">{{$message}}</span>
                                        </div>
                                        @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">enddate</label>
                                <input type="date" name="endDate" id="endDate" class="form-control mb-3">    
                
                                    @error('endDate')
                                    <div class="my-1">
                                    <span class="text-danger py-2">{{$message}}</span>
                                    </div>
                                    @enderror
                        </div>
                                
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



