@extends('layouts.home')

@section('content')
    <div class="row justify-content-center">
        @if($images->isNotEmpty())
            @foreach($images as $image)
                <div class="col-md-6 text-center mb-4">
                    <div class="card">
                        <a href="{{ route('show.image', ['id' => $image->id]) }}">
                            <img src="{{ asset('images/' . $image->name) }}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{ $image->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-100"></div>
            @endforeach
            <div class="d-flex justify-content-center">
                {!! $images->links() !!}
            </div>
        @else
            <div class="col-md-6 text-center">
                <div class="alert alert-info" role="alert">
                    Все още няма качени снимки.
                </div>
            </div>
        @endif
    </div>
@endsection
