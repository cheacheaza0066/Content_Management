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
                    <li class="breadcrumb-item active" aria-current="page">Popup Management</li>
                  </ol>

                <h1 class="text-center">Popup Management</h1>
                
                <div class="col-md-12">
                    @if (session('addpopup'))
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

                <div class="col-md-8">
                    <div class="search mb-2">
                        <form action="{{route('popupall')}}" method="get">

                            <label for="search">FIND : </label>
                                <select name="select" id="select" class="select" value="{{request()->query('search')}}">
                                <option value="id">ID</option>
                                <option value="content">CONTENT</option>
                                </select>

                       <input type="text" class="searchTerm p-3" placeholder="FIND HERE" name="search" value="{{request()->query('search')}}">
                       <button type="submit" class="searchButton">
                         <i class="fa fa-search mb-5"></i>
                      </button>
                    </form>

                    </div>
                </div>

                    <a href="{{route('addpopuppage')}}" class="btn btn-success mb-3 btn-lg">+ ADD POPUP</a>

                   

                    <div class="card table-responsive">
                        <div class="card-header card text-dark mb-1"style="background-color: rgba(37, 38, 49, 0.2)"><h2 class="text-center">POPUP DETAIL</h2></div>
                        <table class="table table-bordered" >
                            <thead>
                              <tr>
                                <th scope="col" class="text-center fs-5" style="width: 60px">@sortablelink('id', trans('ID'),)</th>
                                <th scope="col" class="text-center showtext">IMAGE</th>
                                <th scope="col" class="text-center showtext">CONTENT</th>
                                <th scope="col" class="text-center showtext">START</th>
                                <th scope="col" class="text-center showtext">END</th>
                                <th scope="col" class="text-center showtext">@sortablelink('created_at', trans('CREATED AT'),)</th>

                                <th scope="col" class="showtext text-center"style="width: 20px" >UPDATE</th>
                                <th scope="col" class="showtext text-center" style="width: 20px">DELETE</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($popup as $row)
                                <tr>
                                    <th class="text-center">{{$row->id}}</th>
                                    <td>
                                        <img src="{{asset($row->image)}}" alt="" width="100px" height="100px " class="rounded mx-auto d-block">
                                    </td>
                                    <td>{{Str::limit($row->content,400)}}</td>
                                   
                                    <td class="text-center">{{$row->startDate}}</td>
                                    <td class="text-center">{{$row->endDate}}</td>
                                    <td class="text-center">{{$row->created_at->diffForHumans()}}</td>

                                    <td ><a href="{{url('/popup/edit/'.$row->id)}}" style="width: auto" class="btn btn-warning btn-lg ">UPDATE</a></td>
                                    

                                    <td><a href="{{url('/popup/delete/'.$row->id)}}" style="width: auto" class="btn btn-danger btn-lg" onclick="return confirm('ต้องการลบข้อมูล ใช่ไหม ?')">DELETE</td>

                                  </tr>
                                @endforeach
                              
                             
                            </tbody>
                          </table>
                          <div class="d-flex justify-content-center">
                            {!! $popup->links() !!}
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

</body>
</html>
@endsection




