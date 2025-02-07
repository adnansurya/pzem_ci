<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
</head>
<body>
    <h2>Tambah User</h2>
    <form action="/admin/users/store" method="post">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
