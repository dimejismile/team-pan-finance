@extends('layouts.app')
@push('style')
    <style>
        .nav-pills>li>a {
            background-color: rgb(248, 249, 250);
            color: #5829B8 !important;
        }

        .nav-pills>li>a.active {
            background-color: #5829B8 !important;
            color: #fff !important;
        }

        .nav-tabs>li>a {
            background-color: rgb(248, 249, 250);
            color: #5829B8 !important;
        }

        .nav-tabs>li>a.active {
            background-color: #5829B8 !important;
            color: #fff !important;
        }

        .btn-primary {
            background-color: #5829B8 !important;
            color: #fff;
            border: thin solid #5829B8;
        }
    </style>
@endpush
@section('content')
    <div class="pl-5">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h2>Home</h2>
                <p style="font-size: 120%; font-weight: 300;">Welcome back, {{ $user->full_name }}</p>
                <h4 class="pt-3 pb-3 mb-5 col-md-4" style="background-color: #fff">Total amount tracked by you:
                    <br><br> NGN
                    {{ $user->expenses->sum('amount') }}
                </h4>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-primary p-3 mt-1" href="{{ route('expenses.create') }}">RECORD AN EXPENSE</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="my-4 table-responsive">
                <h3>EXPENSES RECORDS</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Item</th>
                        <th>Description</th>
                        <th>Amount (NGN)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($user->expenses as $expense)
                    <tr>
                        <td>{{ $expense->date->format('Y-m-d') }}</td>
                        <td>{{ $expense->item }}</td>
                        <td>{{ $expense->description ?? '--' }}</td>
                        <td>{{ number_format($expense->amount) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">You are yet to add a record.</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
    </div>

@endsection