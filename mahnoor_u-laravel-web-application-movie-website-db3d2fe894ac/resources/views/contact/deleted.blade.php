@extends('layouts.app')

@section('content')
    @if (count($messages) > 0)
        <ul class="list-group">
            @foreach($messages as $message)
                <li class="list-group-item">
                    <strong>From: {{$message->userFrom->name }}, {{ $message->userFrom->email }}</strong> | Subject: {{ $message->subject }}
                    <a href="{{ route('messages-return', $message->id) }}" class="btn btn-info float-right btn-sm">Return message to inbox</a>
                </li>
            @endforeach
        </ul>
    @else
        No messages!
    @endif
@endsection
