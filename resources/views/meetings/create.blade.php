@extends('dashboard.layouts.master')

@section('main-content-section')
<div class="container">
    <h1>Create New Meeting</h1>

    <form action="{{ route('meetings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <!-- Add other fields as necessary -->
        <button type="submit" class="btn btn-primary">Create Meeting</button>
    </form>
</div>
@endsection