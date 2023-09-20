@extends('layouts.app')

@section('content')

<div class="card rounded">
    <div class="card-body">

        <div class="d-flex gap-2 justify-content-between">
            <div class="d-flex gap-2">
                <div class="d-flex shadow-none border p-3 align-items-center">
                    <i data-feather="tool"></i>
                </div>
                <div class="align-self-center">
                    <h1 class="h3 mb-0">Halaman Divisi</h1>
                    <small class="text-muted">Halaman untuk menampilkan data Divisi</small>
                </div>
            </div>

            <div>
                <a href="{{ route('division.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <form action="{{ route('division.update', $division->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Division</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukkan Nama Role.." value="{{ $division->name }}">
                                </div>
                                <button type="submit" class="btn btn-success">Edit Division</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
@endsection
