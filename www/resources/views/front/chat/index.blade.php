@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">{{ __('Your bane: ') }}<span class="badge badge-pill badge-success">{{ Auth::user()->name }}</span></div>
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Messages') }}</h5>

                        <ul id="messagesContainer" class="messages-container">

                        </ul>

                        <form name="send_message">
                            <div class="form-group">
                                <label id="userNameLabel"></label>
                                <textarea class="form-control" name="message" placeholder="{{ __('Write your message here...') }}"></textarea>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <button id="submitMessage" type="submit" class="btn btn-primary">{{ __('Send') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
