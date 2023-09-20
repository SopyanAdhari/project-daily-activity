@extends('layouts.app')

@section('content')
    <div class="card rounded">
        <div class="card-body">
            <div class="d-flex gap-2 justify-content-between">
                <div class="d-flex gap-2">
                    <div class="d-flex shadow-none border p-3 align-items-center">
                        <i data-feather="user"></i>
                    </div>
                    <div class="align-self-center">
                        <h1 class="h3 mb-0">Form Tambah Mentor</h1>
                        <small class="text-muted">Halaman untuk menambahkan data Mentor</small>
                    </div>
                </div>
                <div>
                    <a href="{{ route('mentor.index') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <form action="{{ route('mentor.store') }}" method="POST">
                    @csrf
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Mentor</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Masukkan Nama Mentor..">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Masukkan Email..">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" value="1" name="role">
                            </div>
                            <div class="mb-3">
                                <label for="division" class="form-label">Divisi: </label>
                                <select id="division" name="division" class="form-control @error('division') @enderror">
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password"
                                    placeholder="Masukkan Password..">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Konfirmasi Password</label>
                                <input type="text" class="form-control" name="confirmPassword"
                                    placeholder="Konfirmasi Password..">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Mentor</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
