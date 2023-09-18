@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="p-3">
                        <a href="{{ route('mentee.create') }}" class="btn btn-primary">
                            Tambah Mentee
                        </a>
                    </div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Tanggal dibuat</th>
                                <th>Aksi</th>

                            </tr>
                            @foreach ($mentees as $mentee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mentee->name }}</td>
                                <td>{{ $mentee->email }}</td>
                                <td>{{ $mentee->isActive === 0 ? "Belum terverifikasi" : "Sudah terverifikasi"}}</td>
                                <td>{{ $mentee->created_at }}</td>
                                <td>
                                    @if($mentee->isActive === 1)
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('mentee.edit', $mentee->id) }}" class="btn btn-success">
                                                Edit
                                            </a>
                                            <form action="{{ route('mentee.destroy', $mentee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')    
                                                <button type="submit" class="btn btn-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                        @else
                                        <form action="{{ route('mentee.update', $mentee->id) }}" method="POST">
                                            @csrf  
                                            @method('PUT')
                                            <input type="hidden" name="isActive" value="{{ $mentee->isActive }}">
                                            <button type="submit" class="btn btn-warning">
                                                Verifikasi
                                            </button>
                                        </form>
                                   @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
