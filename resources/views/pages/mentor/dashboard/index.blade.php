@extends('layouts.app')

@section('content')
        <h4>Dashboard Mentor</h4>
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
                        
                    </table>
                </div>
            </div>
        </div>
@endsection