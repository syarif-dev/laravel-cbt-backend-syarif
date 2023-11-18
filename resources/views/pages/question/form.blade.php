@extends('layouts.app')

@section('title', 'Form Question')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('question.index') }}">questions</a></div>
                    <div class="breadcrumb-item">{{ $title }}</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ $title }}</h2>

                <div class="card">
                    <form action="{{ $urlAction }}" method="POST">
                        @if (@$question)
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <input type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question', @$question->question) }}">
                                @error('question')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Kategori</label>
                                <div class="selectgroup w-100">
                                    @if (@$question->category)
                                        <label class="selectgroup-item">
                                            <input type="radio" name="category" value="numeric" class="selectgroup-input" {{ @$question->category == 'numeric' ? 'checked' : '' }}>
                                            <span class="selectgroup-button">Numeric</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="category" value="verbal" class="selectgroup-input" {{ @$question->category == 'verbal' ? 'checked' : '' }}>
                                            <span class="selectgroup-button">Verbal</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="category" value="logika" class="selectgroup-input" {{ @$question->category == 'logika' ? 'checked' : '' }}>
                                            <span class="selectgroup-button">Logika</span>
                                        </label>
                                    @else
                                        <label class="selectgroup-item">
                                            <input type="radio" name="category" value="numeric" class="selectgroup-input" checked>
                                            <span class="selectgroup-button">Numeric</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="category" value="verbal" class="selectgroup-input">
                                            <span class="selectgroup-button">Verbal</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="category" value="logika" class="selectgroup-input">
                                            <span class="selectgroup-button">Logika</span>
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jawaban A</label>
                                <input type="text" class="form-control @error('first_choice') is-invalid @enderror" name="first_choice" value="{{ old('first_choice', @$question->first_choice) }}">
                                @error('first_choice')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jawaban B</label>
                                <input type="text" class="form-control @error('second_choice') is-invalid @enderror" name="second_choice" value="{{ old('second_choice', @$question->second_choice) }}">
                                @error('second_choice')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jawaban C</label>
                                <input type="text" class="form-control @error('third_choice') is-invalid @enderror" name="third_choice" value="{{ old('third_choice', @$question->third_choice) }}">
                                @error('third_choice')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jawaban D</label>
                                <input type="text" class="form-control @error('fourth_choice') is-invalid @enderror" name="fourth_choice" value="{{ old('fourth_choice', @$question->fourth_choice) }}">
                                @error('fourth_choice')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Kunci Jawaban</label>
                                <div class="selectgroup w-100">
                                    @if (@$question->answer)
                                        <label class="selectgroup-item">
                                            <input type="radio" name="answer" value="a" class="selectgroup-input" {{ @$question->answer == 'a' ? 'checked' : '' }}>
                                            <span class="selectgroup-button">A</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="answer" value="b" class="selectgroup-input" {{ @$question->answer == 'b' ? 'checked' : '' }}>
                                            <span class="selectgroup-button">B</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="answer" value="c" class="selectgroup-input" {{ @$question->answer == 'c' ? 'checked' : '' }}>
                                            <span class="selectgroup-button">C</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="answer" value="d" class="selectgroup-input" {{ @$question->answer == 'd' ? 'checked' : '' }}>
                                            <span class="selectgroup-button">D</span>
                                        </label>
                                    @else
                                        <label class="selectgroup-item">
                                            <input type="radio" name="answer" value="a" class="selectgroup-input" checked>
                                            <span class="selectgroup-button">A</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="answer" value="b" class="selectgroup-input">
                                            <span class="selectgroup-button">B</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="answer" value="c" class="selectgroup-input">
                                            <span class="selectgroup-button">C</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="answer" value="d" class="selectgroup-input">
                                            <span class="selectgroup-button">D</span>
                                        </label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
