@extends('layouts.app')

@section('content')
    <div class="card rounded">
        <div class="card-body">
            <div class="d-flex gap-2 justify-content-between">
                <div class="d-flex gap-2">
                    <div class="d-flex shadow-none border p-3 align-items-center">
                        <i data-feather="users"></i>
                    </div>
                    <div class="align-self-center">
                        <h1 class="h3 mb-0">Form Tambah Mentee</h1>
                        <small class="text-muted">Halaman untuk menambahkan data Mentee</small>
                    </div>
                </div>
                <div>
                    <a href="{{ route('mentee.index') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('mentee.store') }}" method="POST">
                    @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Mentee</label>
                                <input type="text" class="form-control @error('name') @enderror" name="name"
                                    placeholder="Masukkan Nama Mentee.." value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control  @error('email') @enderror" name="email"
                                    placeholder="Masukkan Email.." value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="division" class="form-label">Division:</label>
                                <select id="division" name="division" class="form-control @error('division') @enderror">
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                                @error('division')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control  @error('password') @enderror"
                                    name="password" placeholder="Masukkan Password.." value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                                <input type="password" id="confirmPassword"
                                    class="form-control  @error('confirmPassword') @enderror" name="confirmPassword"
                                    placeholder="Konfirmasi Password..">
                                @error('confirmPassword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Mentee</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
@endsection
