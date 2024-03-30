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
                <div class="card-header">Свържете се с нас</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store.ticket') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Име</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Имейл адрес</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Съобщение</label>
                            <textarea class="form-control" id="text" name="text" rows="5"></textarea>
                            @error('text')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Изпрати съобщение</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
