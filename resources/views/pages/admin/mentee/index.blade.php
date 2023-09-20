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
                    <small class="text-muted">Halaman untuk menampilkan data Mentee</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="p-3">
                    <a href="{{ route('mentee.create') }}" class="btn btn-primary">
                        <i data-feather="plus"></i>
                        Tambah Mentee
                    </a>
                </div>
                <div class="card-body">
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
                            @forelse ($mentees as $mentee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mentee->name }}</td>
                                    <td>{{ $mentee->email }}</td>
                                    <td>{{ $mentee->is_active === 0 ? 'Belum terverifikasi' : 'Sudah terverifikasi' }}</td>
                                    <td>{{ $mentee->created_at }}</td>
                                    <td>
                                        @if ($mentee->is_active === 1)
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('mentee.edit', $mentee->id) }}" class="btn btn-success">
                                                    <i data-feather="edit"></i>
                                                    Edit
                                                </a>
                                                <form action="{{ route('mentee.destroy', $mentee->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                    <i data-feather="trash"></i>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <form action="{{ route('mentee.update', $mentee->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="is_active" value="{{ $mentee->is_active }}">
                                                <button type="submit" class="btn btn-warning">
                                                    Verifikasi
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center fw-bold">
                                        Data Not Found
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
