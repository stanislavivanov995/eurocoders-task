<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Вход</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    <div class="form-group">
                        <label for="email">Имейл Адрес</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Имейл Адрес">
                    </div>
                    <div class="form-group">
                        <label for="password">Парола</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Парола">
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Вход</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Затвори</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>









