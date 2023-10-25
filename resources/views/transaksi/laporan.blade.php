@extends('layouts.menudash')
@section('content')
<div class="masakan-index">
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="col-10">
                <div class="card shadow-rounded">
                    <h1 class="card-title" style="text-align: center">Laporan</h1>
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
                                    <th>Total Harga</th>
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
                                    <td>{{$o->total_harga}}</td>
                                    <td>{{$o->status_order}}</td>

                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <h3 class="">Penghasilan: $ {{$tot}} </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- <script>
    window.print();
</script> --}}


