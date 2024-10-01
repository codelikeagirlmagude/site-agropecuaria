<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$user = $_SESSION['user'];
if ($user['role'] == 'admin') {
    echo "<a href='manage_users.php'>Gerenciar Usuários</a>";
}
?>
<h2>Bem-vindo, <?php echo $user['username']; ?></h2>
<p><a href="logout.php">Sair</a></p>

<section id="newPost">
    <h2>Adicionar Novo Produto</h2>
    <form id="adminForm" enctype="multipart/form-data">
        <label for="postTitle">Título do Produto:</label>
        <input type="text" id="postTitle" name="postTitle" required>

        <label for="titleSize">Tamanho do Título:</label>
        <select id="titleSize" name="titleSize">
            <option value="h1">Grande (H1)</option>
            <option value="h2">Médio (H2)</option>
            <option value="h3">Pequeno (H3)</option>
        </select>

        <label for="textBorder">Borda do Texto:</label>
        <select id="textBorder" name="textBorder">
            <option value="none">Nenhuma</option>
            <option value="solid">Sólida</option>
            <option value="dashed">Tracejada</option>
            <option value="dotted">Pontilhada</option>
        </select>

        <label for="postContent">Descrição do Produto:</label>
        <div id="editorToolbar">
            <button type="button" onclick="formatText('bold')"><b>Negrito</b></button>
            <button type="button" onclick="formatText('italic')"><i>Itálico</i></button>
            <button type="button" onclick="formatText('underline')"><u>Sublinhado</u></button>
            <button type="button" onclick="formatText('strikethrough')"><s>Riscar</s></button>
            <button type="button" onclick="formatText('justifyLeft')">Alinhar à Esquerda</button>
            <button type="button" onclick="formatText('justifyCenter')">Centralizar</button>
            <button type="button" onclick="formatText('justifyRight')">Alinhar à Direita</button>
        </div>
        <div contenteditable="true" id="postContent" class="editor-area" style="border: 1px solid #ccc; padding: 10px;" required></div>

        <label for="imageInput">Imagem de Destaque:</label>
        <input type="file" id="imageInput" name="postImage" accept="image/*" required>
        <img id="imagePreview" src="" alt="Pré-visualização da Imagem" style="display: block; margin: 10px 0; max-width: 100%;">

        <input type="submit" value="Publicar Produto">
    </form>
</section>

<script>
// Função para formatação do texto
function formatText(command) {
    document.execCommand(command, false, null);
}

// Pré-visualização de imagem
document.getElementById('imageInput').addEventListener('change', function (event) {
    const reader = new FileReader();
    reader.onload = function () {
        document.getElementById('imagePreview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
});
</script>
