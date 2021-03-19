@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-3 p-5">
       <img src="/svg/gojo.jpg" style="height:150px"class="rounded-circle ">
       </div>

       <div class="col-9 pt-5 ">
          <div class="d-flex justify-content-between align-items-baseline">
               <h4> {{ $user->username }}</h4>
               <a href="/p/create"> Add new posyt </a>


        </div>
          <div class="d-flex">
            <div class="pr-3"><strong>{{ $user->posts->count() }}</strong> posts</div>
            <div class="pr-3" > <strong>23k</strong> followros</div>
            <div class="pr-3" ><strong>212</strong> following</div>
          </div>

          <div> {{ $user->profile->title  ?? 'N/A'}}</div>
          <div> {{$user->profile->description  ?? 'N/A' }}</div>
          <div> <a href="#" > {{ $user->profile->url ?? 'N/A'}} </a> </div>
        </div>

    </div>

<div class="row pt-5">
@foreach ($user->posts as $post )
    <div class="col-4 pb-4" >
        <a href="/p/{{ $post->id }}">
        <img src="/storage/{{ $post->image }}" class="w-100">
        </a>
    </div>
@endforeach

</div>



</div>
@endsection
