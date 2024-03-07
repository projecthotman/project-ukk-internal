@extends('layouts.app')

@section('title', 'Top Up')

@section('content')
    @include('partials.alert')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="card mb-4">
                <div class="card-header">
                    <h4><strong>Top Up</strong></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('topUp-action') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah:</label>
                            <input type="number" class="form-control" name="jumlah" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Top Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
