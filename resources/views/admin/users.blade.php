@extends('layouts.admin')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

{{-- Modal --}}
<div class="modal fade" id="userImagesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Снимки на потребителя</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="userImages"></div>
        </div>
      </div>
    </div>
  </div>

{{-- Modal --}}

<div class="container mt-4">
    <h2>Последни потребители:</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Име</th>
                <th>Email</th>
                <th>Дата на регистрация</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($latestUsers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                            @csrf
                            @if($user->is_admin === 0)
                                <button type="submit" class="btn btn-outline-danger btn-sm">Изтрий</button>
                            @else
                                <button type="submit" class="btn btn-outline-secondary btn-sm" disabled>Изтрий</button>
                            @endif
                            <button type="button"
                                    class="btn btn-outline-info btn-sm open-user-images-modal"
                                    data-toggle="modal"
                                    data-target="#userImagesModal"
                                    data-user-id="{{ $user->id }}">
                                    Снимки
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $latestUsers->links() }}
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('#userImagesModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var userId = button.data('user-id');
            var modal = $(this);

            $.ajax({
                url: '/admin/users/' + userId + '/images',
                type: 'GET',
                success: function(response) {
                    var images = response;
                    var imageHtml = '';
                    if (images.length > 0) {
                        images.forEach(function(image) {
                            imageHtml += '<img src="{{ asset('images/') }}/' + image.name + '" alt="' + image.name + '" class="img-fluid" width="80px;" heigth="100px;">';
                        });
                    } else {
                        imageHtml = '<p>Няма налични снимки</p>';
                    }
                    $('#userImages').html(imageHtml);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection



