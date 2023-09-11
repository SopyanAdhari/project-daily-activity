@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="p-3">
                        <a href="{{ route('role.create') }}" class="btn btn-primary">
                            Tambah Role
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
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                   <div class="d-flex gap-2">
                                     <a href="{{ route('role.edit', $role->id) }}" class="btn btn-success">
                                         Edit
                                     </a>
                                     <form action="{{ route('role.destroy', $role->id) }}" method="POST">
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
