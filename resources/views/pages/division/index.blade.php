@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="p-3">
                        <a href="{{ route('division.create') }}" class="btn btn-primary">
                            Tambah Division
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
                                <th>Action</th>
                            </tr>
                            @foreach ($divisions as $division)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $division->name }}</td>
                                <td>
                                   <div class="d-flex gap-2">
                                     <a href=   "{{ route('division.edit', $division->id) }}" class="btn btn-success">
                                         Edit
                                     </a>
                                     <form action="{{ route('division.destroy', $division->id) }}" method="POST">
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
