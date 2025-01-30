<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produtos Cadastrados</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/styleList.css">
    </head>

    <body>

        <?php
            include 'config.php';

            $sql = "SELECT * FROM produtos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='container'>";
                echo "<h2>Lista de Produtos</h2>";
                echo "<table class='table table-bordered table-dark'>";
                echo "<tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Preço</th><th>Produto</th><th>Ações</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["descricao"] . "</td>";
                    echo "<td>R$ " . number_format($row["valor"], 2, ',', '.') . "</td>";
                    echo "<td>" . ($row["disponibilidade"] == 'sim' ? "Disponível" : "Indisponível") . "</td>";
                    echo "<td>
                            <a href='excluirProdutos.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm w-30' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>
                        </td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "<div class='container'><p>Nenhum produto encontrado.</p></div>";
            }
            $conn->close();
        ?>

        
        <div class="text-center mt-4">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='cadastrarProdutos.php'">Voltar para Cadastro</button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
