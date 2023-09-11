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
                        <a href="{{ route('role.index') }}">Kembali</a>
                    </div>
                    <div class="card-header">{{ __('Dashboard') }}</div>


                    <form action="{{ route('role.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Role</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Masukkan Nama Role.." value="{{ $role->name }}">
                                </div>
                                <button type="submit" class="btn btn-success">Edit Role</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
