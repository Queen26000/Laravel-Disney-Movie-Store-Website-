@extends('layouts.app')

@section('content')
    <form action="{{ route('messages-send') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="to">To</label>
            <select class="form-control" name="to" id="to">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}, {{ $user->email }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter subject" value="{{ $subject }}">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
