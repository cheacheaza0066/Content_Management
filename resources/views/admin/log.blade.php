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
        <div class="container">
            <div class="row">
                
                <ol class="breadcrumb ms-3">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Log</li>
                  </ol>

                <h1 class="text-center">LOG</h1>

                <div class="col-md-8 my-2">
                  <div class="search mb-2">
                      <form action="{{route('log_all')}}" method="get">

                          <label for="search">FIND : </label>
                              <select name="select" id="select" class="select" value="{{request()->query('search')}}">
                              <option value="id">ID</option>
                              <option value="log_name ">LOGNAME</option>
                              <option value="description ">Description</option>
                              <option value="causer_id ">Causer_id</option>

                              </select>

                     <input type="text" class="searchTerm p-3" placeholder="FIND HERE" name="search" value="{{request()->query('search')}}">
                     <button type="submit" class="searchButton">
                       <i class="fa fa-search mb-5"></i>
                    </button>
                  </form>

                  </div>
              </div>
                
                <div class="col-md-12">


                    <div class="card table-responsive">
                        <div class="card-header card text-dark mb-1" style="background-color: rgba(37, 38, 49, 0.2)" style="width:100%"><h2 class="text-center ">LOG DETAIL</h2></div>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                {{-- <th scope="col" class="text-center">ไอดี</th> --}}
                                <th scope="col" class="text-center showtext">id</th>
                                <th scope="col" class="text-center showtext">Logname</th>
                                <th scope="col" class="text-center showtext">description</th>
                                <th scope="col" class="text-center showtext">causer_id</th>

                                <th scope="col" class="text-center showtext">create</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($activity as $row)
                                <tr>
                                    <td class="text-center showtext">{{$row->id}}</td>
                                    <td class="text-center showtext">{{$row->log_name}}</td>
                                    <td class="text-center showtext">{{$row->description}}</td>
                                    <td class="text-center showtext">{{$row->causer_id}}</td>

                                    <td class="text-center showtext">{{$row->created_at}}</td>

                                    


                                  </tr>
                                @endforeach
                              
                             
                            </tbody>
                          </table>
                          <div class="d-flex justify-content-center">
                            {{$activity->appends(Request::all())->links();}}

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>
@endsection




