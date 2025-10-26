@extends('layouts.app')

@section('title', 'Send Email')

@section('content')
    <div class="container">
        @if(session('error_message'))
            <div class="alert alert-danger border border-danger rounded-3" role="alert">
                {{ session('error_message') }}
            </div>
        @endif
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center py-3">
                <h4 class="mb-0">Send Email</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="from" class="form-label">From</label>
                        <input type="email" class="form-control  @error('from') is-invalid @enderror" id="from"
                               name="from"
                               placeholder="you@example.com" value="{{ old('from') }}" required>
                        @error('from')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="to" class="form-label">To</label>
                        <input type="email" class="form-control @error('to') is-invalid @enderror" id="to" name="to"
                               placeholder="recipient@example.com" value="{{ old('to') }}" required>
                        @error('to')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cc" class="form-label">CC</label>
                        <input type="email" class="form-control @error('cc') is-invalid @enderror"
                               id="cc" name="cc" placeholder="optional@example.com" value="{{ old('cc') }}">
                        @error('cc')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject"
                               name="subject" placeholder="Вкажіть тему" value="{{ old('subject') }}" required>
                        @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="text" {{ old('type') === 'text' ? 'selected' : '' }}>Text</option>
                            <option value="html" {{ old('type') === 'html' ? 'selected' : '' }}>HTML</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body"
                                  rows="6"
                                  placeholder="Enter the text of the letter..." required>@if(old('body'))
                                {{ old('body') }}
                            @endif</textarea>
                        @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-send"></i> Send
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
