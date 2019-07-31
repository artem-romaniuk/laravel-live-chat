@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div>
                        @forelse($messages as $message)
                            <div>
                                <p>{{ $message->message }}</p>
                                <span>{{ $message->user->name }}</span>
                            </div>
                        @empty
                            {{ __('No messages') }}
                        @endforelse
                    </div>

                    <form action="{{ route('chat.send') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="1">
                        <textarea name="message"></textarea>
                        <button type="submit">{{ __('Send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
