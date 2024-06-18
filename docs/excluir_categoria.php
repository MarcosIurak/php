<?php
include __DIR__ . '/db.php';

// Verifica se foi enviado um ID válido via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se não há arvores associadas a esta categoria
    $check_sql = "SELECT COUNT(*) AS total FROM arvores WHERE categoria_id = $id";
    $result = $conn->query($check_sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total = $row['total'];

        if ($total > 0) {
            echo "Não é possível excluir a categoria pois existem $total árvores associadas a ela.";
        } else {
            // Se não houver árvores associadas, procede com a exclusão da categoria
            $delete_sql = "DELETE FROM categorias WHERE id = $id";

            if ($conn->query($delete_sql) === TRUE) {
                echo "Boa meu patrão";
            } else {
                echo "Erro ao excluir a categoria: " . $conn->error;
            }
        }
    } else {
        echo "Erro ao verificar a existência de árvores associadas.";
    }
} else {
    echo "ID da categoria não especificado ou inválido.";
}
?>
