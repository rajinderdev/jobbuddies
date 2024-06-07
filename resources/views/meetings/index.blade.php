@extends('dashboard.layouts.master')

@section('main-content-section')
<div class="container">
    <h1>Meetings</h1>

    @if (isset($meeting))
    <div class="meeting-details">
        <h2>Meeting Details</h2>
        <p>ID: {{ $meeting->id }}</p>
        <p>Title: {{ $meeting->title }}</p>
        <p>Description: {{ $meeting->description }}</p>
        <!-- Add other meeting details as necessary -->
    </div>
    @else
    <div class="meetings-list">
        <h2>All Meetings</h2>
        <ul>
            @if($meetings)
            @foreach ($meetings as $meeting)
            <li>
                <a href="{{ route('meetings.show', $meeting->id) }}">{{ $meeting->title }}</a>
                <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
            @endforeach
            @endif
        </ul>
    </div>
    @endif
</div>
@endsection