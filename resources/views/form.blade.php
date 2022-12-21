<form method="POST" action="/">
    <div class="input-group rounded">
        @csrf
        <input type="text" name="link" class="form-control" placeholder="Помістіть посилання">
        <input id="number" name="stats" placeholder="Лімит кліків" type="number">
        <input type="time" name="date_del" value="00:00"
               min="00:00" max="24:00" required>
        <input type="submit" class="btn btn-success" value="Створити посилання">
    </div>
</form>
