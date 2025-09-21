<?php
include 'conn.php';

$produto = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_select = "SELECT * FROM produtos WHERE id = $id";
    $resultado = $conn->query($sql_select);

    if ($resultado->num_rows > 0) {
        $produto = $resultado->fetch_assoc();
    } else {
        echo "Produto não encontrado.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $conn->real_escape_string($_POST['nome']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $preco = $conn->real_escape_string($_POST['preco']);
    $imagem = $conn->real_escape_string($_POST['imagem']);

    $sql_update = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco', imagem='$imagem' WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <?php if ($produto): ?>
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h1 class="card-title h3 mb-0">Editar Produto</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Produto:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="4"><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="preco" class="form-label">Preço:</label>
                            <input type="number" class="form-control" id="preco" name="preco" step="0.01" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="imagem" class="form-label">URL da Imagem:</label>
                            <input type="text" class="form-control" id="imagem" name="imagem" value="<?php echo htmlspecialchars($produto['imagem']); ?>">
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Salvar Alterações</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php" class="btn btn-link">Voltar para o Cardápio</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
$conn->close();
?>