@extends('layouts.main')
@section('title', 'Contact App | Register')
@section('content')
    <div class="col-md-4 m-auto mt-5">
        <div class="shadow-sm">
            <h1 class="border-bottom p-4">Register</h1>
            <div class="px-4 pt-4">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" name="name" />
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" />
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" />
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Confirmation</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" />
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-4 d-grid">
                        <button type="submit" class="btn btn-block btn-primary">Register</button>
                        <div class="text-center py-4 text-muted">
                            Already have account?
                            <a href="{{ route('login') }}" class="text-muted font-weight-bold text-decoration-none">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
