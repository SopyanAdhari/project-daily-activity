@extends('layouts.app')

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
                                    <h4 class="fw-bold">{{ $total_mentor }}</h3>
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
                            <canvas id="myChart"></canvas>
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
                                <td class="fw-bold">
                                    {{ $user->name }}<br/>
                                <small class="text-muted">
                                  @if ($user->role->name == 'Mentor' || $user->role->name == 'mentor')
                                      <span class="badge bg-primary">Mentor</span>
                                  @elseif($user->role->name == 'Mentee' || $user->role->name == 'mentee')
                                      <span class="badge bg-success">Mentee</span>
                                  @endif
                                </small>
                                </td>
                                <td>
                                    <small>
                                        ditambahkan pada tanggal
                                        <br />
                                       <b> {{ \Carbon\Carbon::parse($user->created_at)->isoformat('DD MMMM YYYY') }}</b>
                                    </small>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center fw-bold">
                                Tidak ada data
                            </td>
                        </tr>
                        @endforelse
                    </table>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [
                    {
                        label: 'Mentor',
                        data: @json($mentorData),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Mentee',
                        data: @json($menteeData),
                        backgroundColor: 'rgba(0, 128, 0, 0.2)',
                        borderColor: 'rgba(0, 128, 0, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush
@endsection