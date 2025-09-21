<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST['nome']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $preco = $conn->real_escape_string($_POST['preco']);
    $imagem = $conn->real_escape_string($_POST['imagem']);

    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES ('$nome', '$descricao', '$preco', '$imagem')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Novo Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h1 class="card-title h3 mb-0">Cadastrar Novo Produto</h1>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Produto:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição:</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço:</label>
                        <input type="number" class="form-control" id="preco" name="preco" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagem" class="form-label">URL da Imagem:</label>
                        <input type="text" class="form-control" id="imagem" name="imagem">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Salvar Produto</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="index.php" class="btn btn-link">Voltar para o Cardápio</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
$conn->close();
?>