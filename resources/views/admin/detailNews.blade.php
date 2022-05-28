@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
              </ol>
            <h1 class="fw-bold">{{$data->title}}</h1>
            <small>{{$data->created_at}}</small>
            <div class="imageDetail">
                <img src="{{asset($data->image)}}" class="card-imgdetail shadow mt-4 mb-4"  style="width: 40%" >
            </div>
            <p class="mt-5 fs-5">{!! nl2br($data->content) !!}</p>
         
    </div>
</div>
@endsection
