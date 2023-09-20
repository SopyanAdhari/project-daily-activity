@extends('layouts.app')

@section('content')
    <div class="card rounded">
        <div class="card-body">
            <div class="d-flex gap-2 ">
                <div class="d-flex shadow-none border p-3 align-items-center">
                    <i data-feather="users"></i>
                </div>
                <div class="align-self-center">
                    <h1 class="h3 mb-0">Halaman Mentee</h1>
                    <small class="text-muted">Halaman untuk mengedit data Mentee</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('mentee.update', $mentee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Mentee</label>
                                <input type="text" class="form-control @error('name') @enderror" name="name"
                                    placeholder="Masukkan Nama Mentee.." value="{{ $mentee->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control  @error('email') @enderror" name="email"
                                    placeholder="Masukkan Email.." value="{{ $mentee->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" value="2" name="role">
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
                            {{-- <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" id="password" class="form-control  @error('password') @enderror" name="password"
                                        placeholder="Masukkan Password.." value="{{ $mentee->name }}">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
                            {{-- <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                                    <input type="text" id="confirmPassword" class="form-control  @error('confirmPassword') @enderror" name="confirmPassword"
                                        placeholder="Konfirmasi Password..">
                                    @error('confirmPassword')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
                            <button type="submit" class="btn btn-success">Edit Mentee</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
