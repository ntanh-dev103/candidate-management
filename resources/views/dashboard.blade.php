@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <!-- ================================================= -->
        <!-- Tiêu đề Dashboard -->
        <!-- ================================================= -->

        <h2 class="mb-4">
            Dashboard
        </h2>

        <!-- ================================================= -->
        <!-- Thống kê -->
        <!-- ================================================= -->

        <div class="row">

            <!-- Tổng ứng viên -->

            <div class="col-md-3 mb-3">

                <div class="card bg-primary text-white shadow">

                    <div class="card-body">

                        <h5>Total Candidates</h5>

                        <h2>{{ $total }}</h2>

                    </div>

                </div>

            </div>

            <!-- Applied -->

            <div class="col-md-3 mb-3">

                <div class="card bg-secondary text-white shadow">

                    <div class="card-body">

                        <h5>Applied</h5>

                        <h2>{{ $applied }}</h2>

                    </div>

                </div>

            </div>

            <!-- Interview -->

            <div class="col-md-3 mb-3">

                <div class="card bg-warning shadow">

                    <div class="card-body">

                        <h5>Interview</h5>

                        <h2>{{ $interview }}</h2>

                    </div>

                </div>

            </div>

            <!-- Hired -->

            <div class="col-md-3 mb-3">

                <div class="card bg-success text-white shadow">

                    <div class="card-body">

                        <h5>Hired</h5>

                        <h2>{{ $hired }}</h2>

                    </div>

                </div>

            </div>

        </div>

        <!-- ================================================= -->
        <!-- Biểu đồ -->
        <!-- ================================================= -->

        <div class="row mt-4">

            <div class="col-md-8">

                <div class="card shadow">

                    <div class="card-header">

                        Candidate Status Chart

                    </div>

                    <div class="card-body">

                        <canvas id="statusChart"></canvas>

                    </div>

                </div>

            </div>

        </div>

        <!-- ================================================= -->
        <!-- Latest Candidate + Quick Menu -->
        <!-- ================================================= -->

        <div class="row mt-4">

            <!-- Candidate mới -->

            <div class="col-md-8">

                <div class="card shadow">

                    <div class="card-header">

                        Latest Candidates

                    </div>

                    <div class="card-body p-0">

                        <table class="table table-striped mb-0">

                            <thead>

                                <tr>

                                    <th>Name</th>

                                    <th>Country</th>

                                    <th>Status</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($latestCandidates as $candidate)
                                    <tr>

                                        <td>

                                            {{ $candidate->full_name }}

                                        </td>

                                        <td>

                                            {{ $candidate->current_country }}

                                        </td>

                                        <td>

                                            {{ $candidate->status }}

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3" class="text-center">

                                            No Candidate

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <!-- Quick Menu -->

            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-header">

                        Quick Menu

                    </div>

                    <div class="card-body">

                        <a href="{{ route('candidates.index') }}" class="btn btn-primary w-100 mb-2">

                            Candidate List

                        </a>

                        <a href="{{ route('candidates.create') }}" class="btn btn-success w-100">

                            Add Candidate

                        </a>

                    </div>

                </div>

            </div>
            <div class="col-md-3 mb-3">

                <div class="card bg-info text-white shadow">

                    <div class="card-body">

                        <h5>

                            Profile Complete

                        </h5>

                        <h2>

                            {{ $completedProfile }}

                        </h2>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- ===================================================== --}}
    {{-- Chart JS --}}
    {{-- ===================================================== --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('statusChart');

        new Chart(ctx, {

            type: 'bar',

            data: {

                labels: [

                    'Applied',

                    'Interview',

                    'Hired',

                    'Rejected'

                ],

                datasets: [

                    {

                        label: 'Candidates',

                        data: [

                            {{ $applied }},

                            {{ $interview }},

                            {{ $hired }},

                            {{ $rejected }}

                        ]

                    }

                ]

            }

        });
    </script>
@endsection
