@extends('layouts.home')

@section('content')

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{ asset('images/' . $image->name) }}" class="card-img-top">
                <div class="card-body">
                    <p class="card-text">{{ $image->description }}</p>
                    <p class="card-title mb-0">Автор на снимката: <b>{{ $image->user->name }}</b></p>
                    @auth
                        @if(auth()->user()->id == $image->user_id || auth()->user()->is_admin === 1)
                            <form id="deleteForm" action="{{ route('delete.image', $image->id) }}" method="POST" class="mb-0">
                                @csrf
                                <button type="button" class="btn btn-outline-danger btn-sm mt-3" onclick="confirmDelete()">Изтрий</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <h4>Коментари</h4>

            @if($image->comments->isNotEmpty())
                @foreach($image->comments as $comment)
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="comment-meta">
                                <p class="card-title mb-0">Автор: <b>{{ $comment->user->name }}</b></p>
                                <p class="card-text comment-date"><small class="text-muted">Качено на: {{ $comment->created_at->format('d.m.Y H:i') }}</small></p>
                                @auth
                                    @if(auth()->user()->is_admin)
                                        <form action="{{ route('delete.comment', $comment->id) }}" method="POST" class="mb-0" id="deleteCommentForm">
                                            @csrf
                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmDeleteComment()">Изтрий коментара</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                            <hr>
                            <p class="card-text">{{ $comment->text }}</p>
                        </div>
                    </div>
                @endforeach
            @endif


            <div class="card mt-4">
                <div class="card-body">
                    @if($image->comments->count() >= 10)
                        <p>Не можете да добавите повече от 10 коментара.</p>
                    @else
                        <form method="POST" action="{{ route('create.comment') }}">
                            @csrf
                            <div class="form-group">
                                <label for="text">Добави коментар:</label>
                                <textarea class="form-control" id="text" name="text" {{ auth()->check() ? '' : 'disabled' }}>{{ auth()->check() ? '' : 'Трябва да бъдете логнати за да добавите коментар.' }}</textarea>
                            </div>
                            <input type="text" name="image_id" value="{{ $image->id }}" hidden>
                            <button type="submit" class="btn btn-primary" {{ auth()->check() ? '' : 'disabled' }}>Публикувай</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Сигурни ли сте, че искате да изтриете вашата снимка?',
                text: 'Изтривайки снимката, коментарите към нея също ще бъдат изтрити.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Да, изтрий!',
                cancelButtonText: 'Откажи'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                }
            });
        }

        function confirmDeleteComment() {
            Swal.fire({
                title: 'Сигурни ли сте, че искате да изтриете този коментар?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Да, изтрий!',
                cancelButtonText: 'Откажи'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteCommentForm').submit();
                }
            });
        }
    </script>
@endsection
