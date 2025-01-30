<?php
    include('config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomeProduto = $_POST['nomeProduto'];
        $descricaoProduto = $_POST['descricaoProduto'];
        $valorProduto = $_POST['valorProduto'];
        $disponibilidade = $_POST['disponibilidade'];

        $sql = "INSERT INTO produtos (nome, descricao, valor, disponibilidade) VALUES ('$nomeProduto', '$descricaoProduto', '$valorProduto', '$disponibilidade')";
        if ($conn->query($sql)) {
            $msg = "Produto cadastrado com sucesso!";
        } else {
            $msg = "Erro ao cadastrar produto.";
        }
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Produto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        
        <div class="container text-center">
            <h2 class="mb-4">Cadastro de Produto</h2>
            <form method="POST">
                <div class="mb-3 text-start">
                    <label for="nomeProduto" class="form-label">Nome do Produto:</label>
                    <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" placeholder="Digite o nome do produto" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="descricaoProduto" class="form-label">Descrição do Produto:</label>
                    <textarea class="form-control" id="descricaoProduto" name="descricaoProduto" rows="3" placeholder="Digite a descrição" required></textarea>
                </div>
                <div class="mb-3 text-start">
                    <label for="valorProduto" class="form-label">Valor do Produto:</label>
                    <input type="number" class="form-control" id="valorProduto" name="valorProduto" placeholder="Digite o valor" required step="0.01">
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">Disponível para Venda?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="disponibilidade" id="sim" value="sim" checked>
                        <label class="form-check-label" for="sim">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="disponibilidade" id="nao" value="nao">
                        <label class="form-check-label" for="nao">Não</label>
                    </div>
                </div>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='selecionarProdutos.php'">Listar Produtos</button>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    </body>
</html>
