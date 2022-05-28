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
                @if (session('success'))
                    <script>
                        Swal.fire(
                            'อัพเดทเรียบร้อย!',
                            'You clicked the button!',
                            'success'
)
                    </script>
                    @endif
                <div class="col-md-8">
                    {{-- <a href="{{route('admin.home')}}" class="btn btn-primary mb-3 btn-lg">กลับ</a> --}}
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">EditProfile</li>
                      </ol>
                    <h1 class="text-center mb-3">EDIT PROFILE</h1>
                    <div class="card">
                        <div class="card-header card text-white bg-success mb-1 showtext" >เเก้ไข PROFILE</div>
                        <div class="card-body">
                            <form action="{{route('admin.profile.update')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label class="my-2" for="name">name</label>
                                    <input type="text" name="name" class="form-control" value="{{$profile->name}}">
                                @error('name')
                                <div class="my-1">
                                <span class="text-danger py-2">{{$message}}</span>
                                </div>
                                @enderror

                                    <label class="my-2" for="email">email</label>
                                    <input type="email" name="email" class="form-control" value="{{$profile->email}}">

                                 @error('email')
                                    <div class="my-1">
                                        <span class="text-danger py-2">{{$message}}</span>
                                    </div>
                                 @enderror

                           
                                
                                
                                    <input type="submit" value="อัพเดท" class="btn btn-success mt-3 btn-lg">
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