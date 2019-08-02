@extends('layouts.app')

@section('content')
    <style type="text/css">
        .messages-container {
            background: #ffffff;
            height: 250px;
            color: #000000;
            list-style: none;
            padding: 5px;
        }

        .messages-container li {
            background: #bdc8ff;
            margin: 5px;
            border-radius: 5px;
            width: 50%;
            padding: 5px 15px;
        }

        .messages-container li p {
            margin: 0 0 3px 0;
            font-size: 1.2em;
        }

        .messages-container li span {
            text-align: right;
            display: block;
            font-style: italic;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">{{ __('Your bane: ') }}<span class="badge badge-pill badge-success">Success</span></div>
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Messages') }}</h5>

                        <ul id="messagesContainer" class="messages-container">
                            <li>
                                <p>Hello? world Hello? world Hello? world Hello? world Hello? world Hello? world Hello? world</p>
                                <span>Artem Romaniuk</span>
                            </li>
                        </ul>

                        <form name="send_message">
                            <div class="form-group">
                                <label id="userNameLabel"></label>
                                <textarea class="form-control" placeholder="{{ __('Write your message here...') }}"></textarea>
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
