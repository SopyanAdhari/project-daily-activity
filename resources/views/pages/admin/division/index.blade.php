@extends('layouts.app')

@section('content')
    <div class="card rounded">
        <div class="card-body">
            <div class="d-flex gap-2 ">
                <div class="d-flex shadow-none border p-3 align-items-center">
                    <i data-feather="tool"></i>
                </div>
                <div class="align-self-center">
                    <h1 class="h3 mb-0">Halaman Divisi</h1>
                    <small class="text-muted">Halaman untuk menampilkan data Divisi</small>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="p-3">
                    <a href="{{ route('division.create') }}" class="btn btn-primary">
                        <i data-feather="plus"></i>
                        Tambah Division
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                            @forelse ($divisions as $division)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $division->name }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('division.edit', $division->id) }}" class="btn btn-success">
                                                <i data-feather="edit"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('division.destroy', $division->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                <i data-feather="trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center fw-bold">
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
