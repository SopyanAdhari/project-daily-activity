@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="card">
                    <div>
                        <a href="{{ route('mentor.index') }}">Kembali</a>
                    </div>
                    <div class="card-header">{{ __('Dashboard') }}</div>


                    <form action="{{ route('mentor.update', $mentor->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Mentor</label>
                                    <input type="text" class="form-control @error('name') @enderror" name="name"
                                        placeholder="Masukkan Nama Mentor.." value="{{ $mentor->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control  @error('email') @enderror" name="email"
                                        placeholder="Masukkan Email.." value="{{ $mentor->email }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" value="1" name="role">
                                </div>
                                <div class="mb-3">
                                    <label for="division" class="form-label">Division:</label>
                                    <select id="division" name="division" class="form-control @error('division') @enderror">
                                        @foreach($divisions as $division)
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
                                        placeholder="Masukkan Password.." value="{{ $mentor->name }}">
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
                                <button type="submit" class="btn btn-success">Edit Mentor</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
