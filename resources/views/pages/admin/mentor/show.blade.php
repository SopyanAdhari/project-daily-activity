@extends('layouts.app')

@section('content')
<div class="card mb-3">
    <div class="card border-bottom rounded-0 rounded-top shadow-none" id="headingOne">
        <div class="card-body d-flex gap-2 justify-content-between">
            <div class="row">
                <div class="col-md-12">
                    <span class="fw-bold">Tambahkan Mentee ke Mentor {{ $mentor->name }}</span>
                </div>
            </div>
            <div>
                <a href="{{ route('mentor.index') }}">Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('mentor.store-mentee', $mentor->id) }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nama Mentee</label>
                        <select class="select2 form-select" name="user_id" id="user_id">
                            <option disabled selected>Pilih Mentee</option>
                            @foreach ($mentees as $mentee)
                            <option value="{{ $mentee->id }}">{{ $mentee->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                </div>
            </div>
            <div class="col-md d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-outline-primary mt-1">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
<div class="card mb-5">
    <div class="card-body py-3">
        <div class="table-responsive" id="table-unit">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal dibuat</th>
                    <th>Aksi</th>
        
                </tr>
                @forelse ($mentors as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->user->created_at }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{ route('mentor.destroy-mentee', [$mentor->id, $item->id]) }}" method="POST">
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
                        <td colspan="6" class="text-center fw-bold">
                            Data Not Found
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection
