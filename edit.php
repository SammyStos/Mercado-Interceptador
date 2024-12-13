<?php
include 'conexao.php'; 


if (isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $sql = "SELECT * FROM produtos WHERE ID=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc(); 
    } else {
        echo "Produto não encontrado."; 
        exit;
    }
} else {
    echo "ID do produto não fornecido.";
    exit;
}

$conn->close(); 
?>