<?php
include 'conn.php';

$sql = "SELECT * FROM produtos";
$resultado = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cardápio da Lanchonete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Cardápio da Lanchonete</h1>
            <a href="cadastro.php" class="btn btn-success">Cadastrar Novo Produto</a>
        </div>

        <?php if ($resultado->num_rows > 0): ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php while ($produto = $resultado->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" class="card-img-top" alt="Imagem de <?php echo htmlspecialchars($produto['nome']); ?>">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo htmlspecialchars($produto['nome']); ?></h5>
                                <p class="card-text text-muted flex-grow-1"><?php echo nl2br(htmlspecialchars($produto['descricao'])); ?></p>
                                <div class="mt-auto pt-2 border-top">
                                    <h4 class="text-success">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></h4>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="editar.php?id=<?php echo $produto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="del.php?id=<?php echo $produto['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                Nenhum produto cadastrado ainda.
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
$conn->close();
?>