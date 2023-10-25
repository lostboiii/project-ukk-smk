@extends('layouts.template')
@section('content')
@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="alert alert-warning">{{ $error }}</div>
@endforeach
@endif
@if ($message = Session::get('error'))
<div class="alert alert-warning">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
 <main>
    <div class="container mb-4">

        <div class="row no-gutters mt-4">

            <div class="col-12 col-md-7">
                <div class="row no-gutters w-100">

                    <div class="col-12 col-lg-10 flex-lg-last border-full-1px-solid border-color-a0">
                        <div class="d-flex justify-content-center align-items-center w-100 px-5">
                            <img src="{{ Storage::url('public/posts/'.$masak->gambar)}}" class="img-fluid" id="main-image" style="max-height:600px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5">
                <div class="pt-0 pr-2 pb-2 pl-1 pl-md-5">

                    <div class="mb-4 border-full-2px-solid border-top-0 border-left-0 border-right-0 border-color-inverse">


                        <h1>{{$masak->nama_masakan}}</h1>
                    </div>

                    <div class="mb-5 ">
                        <h6 class="text-muted font-size-08 text-uppercase ">Harga:</h6>
                        <h4>$ {{$masak->harga}} /porsi</h4>
                    </div>
                    <!--                   Size-->
                    <form action="{{ route('detailorder.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">DESC</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Apa hayo">{{ old('description') }}</textarea>

                            <!-- error message untuk title -->
                            @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <select name="order_id">
                            @foreach($order as $ord)
                            <option value="{{ $ord->id }}">{{ $ord->meja }}</option>
                            @endforeach
                        </select>
                    <!--Button-->
                    <div class="w-100">

                            <input type="hidden" name="masakan_id" value={{$masak->id}}>
                            <button class="btn btn-block btn-primary form-control" type="submit">
                                <i class="fa fa-shopping-cart"></i> Pesen Lek
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="my-5">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-color-a1  active" data-toggle="tab" href="#deskripsi" role="tab">Deskripsi</a>
                </li>
            </ul>

            <div class="tab-content font-size-09" style="background-color:#fafafa">
                <div class="tab-pane fade show active px-3 py-4 text-color-a2" id="deskripsi" role="tabpanel">
                    {{$masak->deskripsi}}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
