@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="p-3">
                        <a href="{{ route('mentor.create') }}" class="btn btn-primary">
                            Tambah Mentor
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
                                <th>Jumlah Mentee</th>
                                <th>Tanggal dibuat</th>
                                <th>Aksi</th>

                            </tr>
                            @foreach ($mentors as $mentor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mentor->name }}</td>
                                <td>{{ $mentor->email }}</td>
                                <td>{{ $menteeCount }}</td>
                                <td>{{ $mentor->created_at }}</td>
                                <td>
                                   <div class="d-flex gap-2">
                                     <a href= "{{ route('mentor.edit', $mentor->id) }}" class="btn btn-success">
                                         Edit
                                     </a>
                                     <form action="{{ route('mentor.destroy', $mentor->id) }}" method="POST">
                                     @csrf
                                     @method('DELETE')    
                                         <button type="submit" class="btn btn-danger">
                                             Hapus
                                         </button>
                                     </form>
                                   </div>
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
