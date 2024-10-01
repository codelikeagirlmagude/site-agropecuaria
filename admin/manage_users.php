<?php
session_start();
if ($_SESSION['user']['role'] != 'admin') {
    header("Location: dashboard.php");
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    mysqli_query($conn, $query);
}

$users = mysqli_query($conn, "SELECT * FROM users");
?>

<h2>Gerenciar Usuários</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Novo Usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <select name="role">
        <option value="editor">Editor</option>
        <option value="admin">Administrador</option>
    </select>
    <button type="submit" name="addUser">Adicionar Usuário</button>
</form>

<h3>Usuários Existentes</h3>
<ul>
    <?php while ($user = mysqli_fetch_assoc($users)): ?>
        <li><?php echo $user['username'] . ' (' . $user['role'] . ')'; ?>
            <?php if ($user['role'] != 'admin'): ?>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="deleteUser" value="<?php echo $user['id']; ?>">
                    <button type="submit">Remover</button>
                </form>
            <?php endif; ?>
        </li>
    <?php endwhile; ?>
</ul>
