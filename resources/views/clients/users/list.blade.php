@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Списък с потребители</div>

                    <div class="card-body">
                        @if($users->isEmpty())
                            <p>Няма потребители.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Потребител</th>
                                            <th>Брой снимки</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->images_count }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $users->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
