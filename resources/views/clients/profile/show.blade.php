@extends('layouts.home')

@section('content')
<div class="container">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редакция на профил</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update.profile') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Име</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Имейл адрес</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Нова парола</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Потвърди новата парола</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>

                        <button type="submit" class="btn btn-primary">Запази промените</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
