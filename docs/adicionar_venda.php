<?php
include __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $arvore_id = $_POST['arvore_id'];
    $valor_total = $_POST['valor_total'];

    $sql = "INSERT INTO vendas (cliente_id, arvore_id, quantidade_vendida, valor_total)
            VALUES ('$cliente_id', '$arvore_id', 1, '$valor_total')";

    if ($conn->query($sql) === TRUE) {
        echo "Venda registrada com sucesso.";
    } else {
        echo "Erro ao registrar a venda: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Venda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="form-container">
                    <h2 class="mb-4">Adicionar Nova Venda</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="cliente_id">ID do Cliente:</label>
                            <input type="text" class="form-control" name="cliente_id" id="cliente_id" required>
                        </div>
                        <div class="form-group">
                            <label for="arvore_id">ID da Árvore:</label>
                            <input type="text" class="form-control" name="arvore_id" id="arvore_id" required>
                        </div>
                        <div class="form-group">
                            <label for="valor_total">Valor Total:</label>
                            <input type="text" class="form-control" name="valor_total" id="valor_total" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar Venda</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
