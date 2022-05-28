@extends('layouts.app')



@section('content')
@include('cookie-consent::index')
<h1 class="text-center mb-5 mt-5 fw-bold" style="font-size:60px">ข่าวสารทั้งหมด</h1>
<div class="band">
  @php
      $numItems = count($news);
      $i=0;

  @endphp
  @foreach($news as $row)
      @if (++$i === $numItems)
        <div class="item-1">
          
          <a href="{{url('user/detail/news/'.$row->id)}}"  class="card">
            <img src="{{asset($row->image)}}" class="image-main">

              <article>
                <h1 class="fw-bold" style="font-size: 50px">{{Str::limit($row->title,100)}}</h1>
                <p style="font-size: 20px">{{Str::limit($row->content,150)}}</p>
              </article>
          </a>
        </div>
      @endif

  @endforeach

    @foreach($news as $row)
    
    <div class="item">
      
      <a href="{{url('user/detail/news/'.$row->id)}}" class="card">
          <img src="{{asset($row->image)}}" class="card-img">
        <article>
          <h3 class="fw-bold" style="font-size: 30px">{{Str::limit($row->title,80)}}</h3>
          <br><br>
          <p style="font-size: 20px">{{Str::limit($row->content,200)}}</p>
      </article>
      </a>
    </div>
    @endforeach


  

</div>




{{-- <div class="container bg-light">
  <div class="row">
    <h3 class="text-center mb-5 mt-5 fw-bold">ข่าวสารทั้งหมด</h3>

@foreach($news as $row)

    <div class="col-12 col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
      <div class="item-4">
        <a href="" class="card">
            <img src="{{asset($row->image)}}" class="card-img">
        <article>
          <h3>{{Str::limit($row->title,50)}}</h3>
          <p>{{Str::limit($row->content,50)}}</p>
        </article>
        </a>
      </div>
    </div>
@endforeach --}}
{{--    
  </div>
</div> --}}

{{-- @php
$now = $dt->isoFormat('YYYY-MM-DD');
$popupstart =$popup[0]->startDate;
$popupend =$popup[0]->endDate;

@endphp --}}
@php
      $numItems = count($posts);
      $i=0;

  @endphp
 
        {{-- @if($now >= $popupstart  && $now <= $popupend) --}}
            @foreach($posts as $row)
            @if (++$i === $numItems)
                    <div class="modal fade " id="Modalshow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            {{-- <h1 class="modal-title text-center" id="exampleModalLabel">Welcome</h1> --}}
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body ">
                            <img src="{{asset($row->image)}}" class="img-fluid" style="width:100%">
                          </div>

                          {{-- <div class="modal-footer"> --}}
                            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                          {{-- </div> --}}
                        </div>
                      </div>
                    </div>
                    @endif
                  @endforeach
           
        {{-- @endif --}}





@endsection
