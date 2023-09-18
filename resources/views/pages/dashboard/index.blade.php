@extends('layouts.app')

@section('content')
    <div class="container">
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
        </div>
    </div>
@endsection
