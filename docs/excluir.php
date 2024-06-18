
<?php
include __DIR__ . '/db.php';

if (isset($_GET['id'])) {
    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    $id_da_arvore_a_ser_excluida = $_GET['id'];

    $sql = "DELETE FROM arvores WHERE id = $id_da_arvore_a_ser_excluida";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Erro ao excluir árvore: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "ID da árvore não especificado para exclusão.";
}
?>
