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
                        <table class="table table-bordered" style="background-color: #d4d4d4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Meja</th>

                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($orders as $o )
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$o->masakan->nama_masakan}}</td>
                                    <td>{{$o->masakan->deskripsi}}</td>
                                    <td class="text-center"><img src="{{ Storage::url('public/posts/'.$o->masakan->gambar)}}" class="rounded" style="width: 150px"></td>
                                    <td>{{$o->masakan->harga}}</td>
                                    <td>{{$o->status_detail}}</td>
                                    <td>{{$o->order->meja}}</td>
                                    <td><form action="{{route('transaksi.update', $o->id)}}" method="post" style="display:inline;">
                                        @csrf
                                        {{ method_field('patch') }}
                                        <button type="submit" class="btn btn-sm btn-danger mb-2 mr-2 d-flex">
                                          Selesai
                                        </button>
                                      </form></td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

