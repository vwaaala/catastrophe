@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Donations</h1>

        @if ($donations->isEmpty())
            <p>No donations found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $donation->transactionid }}</td>
                            <td>{{ $donation->amount }}</td>
                            <td>{{ $donation->status ? 'Completed' : 'Pending' }}</td>
                            <td>{{ $donation->name }}</td>
                            <td>{{ $donation->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
