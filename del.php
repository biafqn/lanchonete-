<?php
// Inclui o arquivo de conexão
include 'conn.php';

// Verifica se o ID foi passado na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepara e executa a query SQL para deletar o produto
    $sql = "DELETE FROM produtos WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página principal após a exclusão
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao deletar: " . $conn->error;
    }
} else {
    echo "ID do produto não especificado.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>