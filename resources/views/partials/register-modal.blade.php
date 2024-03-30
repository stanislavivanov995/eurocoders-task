<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Регистрация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">Име</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Въведете Име">
                    </div>
                    <div class="form-group">
                        <label for="email">Имейл Адрес</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Въведете Имейл">
                    </div>
                    <div class="form-group">
                        <label for="password">Парола</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Парола">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Потвърдете Паролата</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Потвърдете Паролата">
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Регистрация</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Затвори</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#registerForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#registerModal').modal('hide');
                    window.location.href = "/";
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#registerForm .invalid-feedback').remove();
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $("#" + key).addClass('is-invalid');
                        $("#" + key).parent().append('<span class="invalid-feedback">' + value + '</span>');
                    });
                }
            });
        });

        $('#registerForm input').focus(function() {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').remove();
        });
    });
</script>





