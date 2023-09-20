@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                Total Mentee
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                Total Mentor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                Chart js
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        Log Aktifitas
                    </div>
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>Tanggal Dibuat</td>
                        </tr>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->isoformat('DD MMMM YYYY'); }}</td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </table>
                </div>
            </div>
        </div>@extends('layouts.app')

        @section('content')
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex gap-2 ">
                        <div class="d-flex shadow-none border p-3 align-items-center">
                            <i data-feather="home"></i>
                        </div>
                        <div class="align-self-center">
                            <h1 class="h3 mb-0">Halaman Dashboard</h1>
                            <small class="text-muted">Halaman untuk menampilkan keseluruhan Data</small>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card rounded">
                                <div class="card-body">
                                    <div class="d-flex gap-2 ">
                                        <div class="d-flex shadow-none border p-3 align-items-center">
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="align-self-center">
                                            <h1 class="h5 mb-0">Total Mentee</h1>
                                            <h4 class="fw-bold">{{ $total_mentee }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card rounded">
                                <div class="card-body">
                                    <div class="d-flex gap-2 ">
                                        <div class="d-flex shadow-none border p-3 align-items-center">
                                            <i data-feather="users"></i>
                                        </div>
                                        <div class="align-self-center">
                                            <h1 class="h5 mb-0">Total Mentor</h1>
                                            <h4> class="fw-bold">{{ $total_mentor }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    Chart js
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <span class="fw-bold">
                              <i data-feather="clock" class="me-2"></i>
                                Aktifitas Penambahan Akun
                            </span>
                            <table class="table">
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="fw-bold">{{ $user->name }}</td>
                                        <td>
                                            <small>
                                                ditambahkan pada tanggal
                                                <br />
                                               <b> {{ \Carbon\Carbon::parse($user->created_at)->isoformat('DD MMMM YYYY') }}</b>
                                            </small>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </table>
                        </div>
        
                    </div>
                </div>
            </div>
        @endsection
        
@endsection
