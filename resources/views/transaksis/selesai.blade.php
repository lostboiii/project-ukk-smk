@extends('layouts.menukas')
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
                                    <th>Meja</th>
                                    <th>Tanggal</th>
                                    <th>Nama Pemesan</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>

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
                                    <td>{{$o->status_order}}</td>
                                    <td>
                                        @if ($o->status_order == 'proses')
                                        <form action="{{route('kasir-transaksi.sukses', $o->id)}}" method="post" style="display:inline;">
                                            @csrf
                                            {{ method_field('patch') }}
                                            <button type="submit" class="btn btn-sm btn-danger mb-2 mr-2 d-flex">
                                              Selesai
                                            </button>
                                          </form>
                                          @else
                                          <a href="{{route('kasir-transaksi.print', $o->id)}}" class="btn btn-success">Print</a>
                                          @endif</td>
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

