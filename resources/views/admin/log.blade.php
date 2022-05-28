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

                {{-- <h1 class="text-center">LOG</h1> --}}
                
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
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</body>
</html>
@endsection




