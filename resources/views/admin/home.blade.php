@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Последни потребители:</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Име</th>
                <th>Email</th>
                <th>Дата на регистрация</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($latestUsers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Последните качени снимки:</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Снимка</th>
                <th>Потребител</th>
                <th>Дата на качване</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($latestImages as $image)
                <tr>
                    <td>
                        <img src="{{ asset('images/' . $image->name) }}" width="50">
                    </td>
                    <td>{{ $image->user->name }}</td>
                    <td>{{ $image->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
