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
            <div class="row mt-3" style="margin-left: 20px">
                 
                <ol class="breadcrumb ms-3">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('newsall')}}">News Management</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Add News</li>
                  </ol>

                <h1 class="text-center">News Management</h1>
               
                <div class="col-md-12">
                    {{-- <a href="{{route('newsall')}}" class="btn btn-primary mb-3 btn-lg">back</a> --}}

                    <div class="card">
                        <div class="card-header card text-white bg-success mb-1 showtext text-center">ADD NEWS</div>
                        <div class="card-body">
                            <form action="{{route('addnews')}}" method="post" enctype="multipart/form-data">
                                @csrf

                            <div class="form-group">

                                     <label for="title">title</label>
                                     <textarea class="form-control" name="title" id="title" cols="30" rows="5"></textarea>
                                @error('title')
                                <div class="my-1">
                                <span class="text-danger py-2">{{$message}}</span>
                                </div>
                                @enderror
                            </div>

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



