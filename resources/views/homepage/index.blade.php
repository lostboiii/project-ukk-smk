@extends('layouts.template')
@section('content')
@auth
<h1 class="welkom">sugeng rawuh, {{ Auth::user()->name}}!</h1>
<h5 class="pengantar">Cari panganan bos?</h3>
@endauth
@guest
<h1 class="welkom">P!</h1>
<h5 class="pengantar">Login duls ga sie</h3>
@endguest
    <div class="container text-center">
        <div class="row boi" style="margin-top: 200px">
@foreach ($masak as $m )


            <div class="col-3 " style="margin-bottom:20px;">
                <div class=" card text bros">
                    <a href="{{URL::to('detail/'.$m->id)}}">
                    <img src="{{ Storage::url('public/posts/'.$m->gambar)}}" class="card-img"
                        alt="..." style="height:200px">

                    <div class="card-img-overlay bruw">
                        <h5 class="card-title texto" style="color: white; text-align:left;  text-shadow: 2px 2px 4px #000000; opacity:1.75">{{$m->nama_masakan}}</h5>
                        <p class="card-title texto" style="color: white; text-align:left;  text-shadow: 2px 2px 4px #000000; opacity:1.75">$ {{$m->harga}}</p>

                    </div>
                </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
