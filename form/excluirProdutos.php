<?php
    include 'config.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM produtos WHERE id=$id";
        if ($conn->query($sql)) {
            echo "<script>alert('Produto excluído!'); window.location='selecionarProdutos.php';</script>";
        } else {
            echo "Erro: " . $conn->error;
        }
        $conn->close();
    }
?>
