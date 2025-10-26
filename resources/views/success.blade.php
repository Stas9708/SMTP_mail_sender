@extends('layouts.app')

@section('title', 'Success page')

@section('content')

    <div class="container my-4">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center py-3">
                <h4 class="mb-0">Success info</h4>
            </div>
            <div class="card-body">
                <p><strong>Sender address:</strong> {{ session('from_address') }}</p>
                <p><strong>Recipient address:</strong> {{ session('to_address') }}</p>
                @if(!empty(session('copy_address')))
                    <p><strong>Address copy of the letter:</strong> {{ session('copy_address') }}</p>
                @endif
                <p><strong>Letter type:</strong> {{ ucfirst(session('letter_type')) }}</p>

                <hr>

                <p><strong>Body of the letter:</strong></p>
                @if(session('letter_type') === 'text')
                    <div class="p-3 border rounded bg-light" style="max-height: 400px; overflow-y: auto;">
                        {{ session('letter_body') }}
                    </div>
                @elseif(session('letter_type') === 'html')
                    <iframe class="w-100 border rounded d-block"
                            style="border:1px solid #ccc; height:100vh;"
                            srcdoc="{!! e(session('letter_body')) !!}">
                    </iframe>
                @endif
            </div>
        </div>
    </div>

@endsection
