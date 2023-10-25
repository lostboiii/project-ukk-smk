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
                        <a href="{{route('masakan.create')}}" class="btn btn-success mb-3 float-end">Add</a>
                        <table class="table table-bordered" style="background-color: #d4d4d4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($masak as $mas )
                                <tr>
                                    <td>{{++$no}}</td>
                                    <td>{{$mas->nama_masakan}}</td>
                                    <td>{{$mas->deskripsi}}</td>
                                    <td class="text-center"><img src="{{ Storage::url('public/posts/'.$mas->gambar)}}" class="rounded" style="width: 150px"></td>
                                    <td>{{$mas->harga}}</td>
                                    <td>{{$mas->status_masakan}}</td>
                                    <td> <a href="{{route('masakan.edit', $mas->id)}}" class="btn btn-sm btn-primary mr-2 mb-2">
                                        Ubah
                                      </a><form action="{{route('masakan.destroy', $mas->id)}}" method="post" style="display:inline;">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-sm btn-danger mb-2 mr-2 d-flex">
                                          Hapus
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

