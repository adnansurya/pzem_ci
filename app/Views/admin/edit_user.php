<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="/admin/users/update/<?= $user['id'] ?>" method="post">
        <label>Username:</label>
        <input type="text" name="username" value="<?= $user['username'] ?>" required>
        <br>
        <label>Password (kosongkan jika tidak ingin diubah):</label>
        <input type="password" name="password">
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
