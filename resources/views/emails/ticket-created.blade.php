@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Тикетът беше успешно създаден</div>
                    <div class="card-body">
                        <p>Име: {{ $ticket->name }}</p>
                        <p>Имейл: {{ $ticket->email }}</p>
                        <p>Съобщение: {{ $ticket->text }}</p>
                        <p>Номер на тикета: {{ $ticket->id }}</p>
                        <p>Благодарим ви за вашия въпрос!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
