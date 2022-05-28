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
        <div class="wrapper">
            <div class="sidebar col-md-3 col-lg-2 " >
                <h2>Management</h2>
                <ul>
                    <li>
                        <a class="nav-link " aria-current="page" href="{{ route('admin.dashbord.user') }}">
                          <i class="fas fa-user"></i>                      
                          <span class="ml-4">USER</span>
                        </a></li>
                    <li>
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashbord.news') }}">
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
        </div>4
        <div class="container">
            
            <div class="row mt-3" style="margin-left: 20px"">
                
                <ol class="breadcrumb ms-3">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">News Management</li>
                  </ol>

                <h1 class="text-center">News Management</h1>
                
                <div class="col-md-12">

                    <a href="{{route('addnewspage')}}" class="btn btn-success mb-3 btn-lg">ADD NEWS</a>

                    @if (session('addnews'))
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

                    <div class="card table-responsive">
                        <div class="card-header card text-dark mb-1" style="background-color: rgba(37, 38, 49, 0.2)"><h2 class="text-center ">NEWS DETAIL</h2></div>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                {{-- <th scope="col" class="text-center">ไอดี</th> --}}
                                <th scope="col" class="text-center showtext">image</th>
                                <th scope="col" class="text-center showtext" style="width: 100px">title</th>
                                <th scope="col" class="text-center showtext">content</th>
                                <th scope="col" class="text-center showtext">Update</th>
                                <th scope="col" class="text-center showtext">Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $row)
                                <tr>
                                    {{-- <th class="text-center">{{$row->id}}</th> --}}
                                    <td>
                                        <img src="{{asset($row->image)}}" alt="" width="100px" height="100px " class="rounded mx-auto d-block ">
                                    </td>
                                    <td>{{Str::limit($row->title,100)}}</td>
                                    
                                    <td>{{Str::limit($row->content,400)}}</td>
                                   
                                    <td><a href="{{url('/news/edit/'.$row->id)}}" style="width: auto" class="btn btn-warning btn-lg">UPDATE</a></td>
                                    

                                    <td><a href="{{url('/news/delete/'.$row->id)}}" style="width: auto" class="btn btn-danger btn-lg" onclick="return confirm('ต้องการลบข้อมูล ใช่ไหม ?')">DELETE</td>

                                  </tr>
                                @endforeach
                              
                             
                            </tbody>
                          </table>
                    </div>
                </div>
                
            </div>
        </div>

</body>
</html>
@endsection




