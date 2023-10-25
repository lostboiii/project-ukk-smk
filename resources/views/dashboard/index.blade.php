@extends('layouts.menudash')

@section('content')
<h1 class="welkom">sugeng rawuh, Admin {{ Auth::user()->name}}!</h1>
<h5 class="pengantar">kerja sono!</h3>
@endsection
