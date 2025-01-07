@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="row mb-3">
        
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-transparent text-center">
                    <h3 class="mb-0" style="font-family: 'Poppins', sans-serif; font-weight: 700; color: var(--text-color);">
                        Dashboard
                    </h3>
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <!-- Total Tickets -->
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm" style="background-color: var(--primary-bg); color: var(--text-color);">
                                <div class="card-body text-center">
                                    <i class="fas fa-ticket-alt fa-3x mb-3" style="color: #88c0d0;"></i>
                                    <div class="text-value" style="font-size: 2.5rem; font-weight: bold;">{{ number_format($totalTickets) }}</div>
                                    <div style="font-size: 1rem; font-weight: 500;">Total Tickets</div>
                                </div>
                            </div>
                        </div>

                        <!-- In Progress Tickets -->
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm" style="background-color: var(--secondary-bg); color: var(--text-color);">
                                <div class="card-body text-center">
                                    <i class="fas fa-spinner fa-3x mb-3" style="color: #5e81ac;"></i>
                                    <div class="text-value" style="font-size: 2.5rem; font-weight: bold;">{{ number_format($openTickets) }}</div>
                                    <div style="font-size: 1rem; font-weight: 500;">In Progress Tickets</div>
                                </div>
                            </div>
                        </div>

                        <!-- Resolved Tickets -->
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm" style="background-color: var(--danger-bg); color: var(--text-color);">
                                <div class="card-body text-center">
                                    <i class="fas fa-check-circle fa-3x mb-3" style="color: #bf616a;"></i>
                                    <div class="text-value" style="font-size: 2.5rem; font-weight: bold;">{{ number_format($closedTickets) }}</div>
                                    <div style="font-size: 1rem; font-weight: 500;">Resolved Tickets</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@parent
@endsection

<style>
    :root {
        /* Light mode colors */
        --primary-bg: #eaf4f8;
        --secondary-bg: #f0f4f8;
        --danger-bg: #fbe3e4;
        --primary-color: #88c0d0;
        --secondary-color: #5e81ac;
        --danger-color: #bf616a;
        --text-color: #2c3e50;
        --bg-color: #ffffff;
    }

    [data-theme="dark"] {
        /* Dark mode colors */
        --primary-bg: #4c566a;
        --secondary-bg: #434c5e;
        --danger-bg: #3b4252;
        --primary-color: #5e81ac;
        --secondary-color: #88c0d0;
        --danger-color: #d08770;
        --text-color: #eceff4;
        --bg-color: #2e3440;
    }

    body {
        background-color: var(--bg-color);
        color: var(--text-color);
        font-family: 'Poppins', sans-serif;
    }

    .card {
        transition: background-color 0.3s, color 0.3s;
    }

    .card .text-value {
        transition: color 0.3s;
    }

    .btn {
        transition: background-color 0.3s, color 0.3s;
    }
</style>
