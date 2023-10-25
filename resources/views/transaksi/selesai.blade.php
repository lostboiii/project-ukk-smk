@extends('layouts.menudash')
@section('content')
<div class="masakan-index">
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="col-10">
                <div class="card shadow-rounded">
                    <div class="card-body">
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
                        {{-- <form class="d-flex mb-2" role="search" action="{{route('transaksi.selesai')}}" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Cari Disini..." aria-label="Search" name="key">
                            <button class="btn btn-outline-success" type="submit">Cari</button>
                          </form> --}}
                        <table class="table table-bordered" style="background-color: #d4d4d4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Meja</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pemesan</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($orders as $o )
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$o->meja}}</td>
                                    <td>{{$o->tanggal}}</td>
                                    <td>{{$o->user->name}}</td>
                                    <td>{{$o->description}}</td>
                                    <td>{{$o->total_harga}}</td>
                                    <td>{{$o->status_order}}</td>
                                    <td>
                                        @if ($o->status_order == 'proses')
                                        <form action="{{route('transaksi.sukses', $o->id)}}" method="post" style="display:inline;">
                                            @csrf
                                            {{ method_field('patch') }}
                                            <button type="submit" class="btn btn-sm btn-danger mb-2 mr-2 d-flex">
                                              Selesai
                                            </button>
                                          </form>
                                          @else
                                          <a href="{{route('transaksi.print', $o->id)}}" class="btn btn-success">Print</a>
                                          @endif</td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <h3 class="">Total: ${{$tot}} </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

