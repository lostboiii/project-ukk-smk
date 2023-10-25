@extends('layouts.template')
@section('content')
<div class="masakan-index">
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="col-10">
                <div class="card shadow-rounded">
                    <h1 class="card-title" style="text-align: center">Daftar Order</h1>

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
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($order as $ord )
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td> @foreach ($order_detail as $detail)
                                        @if ($detail->order_id == $ord->id)
                                                {{$detail->masakan->nama_masakan}}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($order_detail as $detail)
                                        @if ($detail->order_id == $ord->id)
                                        {{$detail->masakan->deskripsi}}, <br>
                                        @endif
                                        @endforeach
                                    </td>
                                            <td class="text-center">
                                                @foreach ($order_detail as $detail)
                                                @if ($detail->order_id == $ord->id)
                                                <img src="{{ Storage::url('public/posts/'.$detail->masakan->gambar)}}" class="rounded" style="width: 150px">
                                                @endif
                                                @endforeach</td>
                                            <td>@foreach ($order_detail as $detail)
                                                @if ($detail->order_id == $ord->id){{$detail->masakan->harga}}<br>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($order_detail as $detail)
                                        @if ($detail->order_id == $ord->id)
                                        {{$detail->status_detail}}<br>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <h6 class="">Harga Total:{{$ord->total_harga}} </h6>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- <script>
    window.print();
</script> --}}
