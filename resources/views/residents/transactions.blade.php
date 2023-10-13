@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transactions for {{ $resident->name }}</h1>

        @if ($transactions->isEmpty())
            <p>No transactions found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Transaction</th>
                        <th>Date</th>
                        <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->action }}</td>
                            <td>{{ $transaction->created_at }}</td>
                            <td>{{ $transaction->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
