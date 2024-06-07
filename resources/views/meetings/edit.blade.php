@extends('dashboard.layouts.master')

@section('main-content-section')
<div class="container">
    <h1>Edit Meeting</h1>

    <form action="{{ route('meetings.update', $meeting->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $meeting->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $meeting->description }}</textarea>
        </div>
        <!-- Add other fields as necessary -->
        <button type="submit" class="btn btn-primary">Update Meeting</button>
    </form>
</div>
@endsection