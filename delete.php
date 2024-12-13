<?php
include 'conexao.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id']; 

  
    $sql = "DELETE FROM produtos WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); 
    } else {
        echo "Erro ao deletar: " . $conn->error; 
    }
} else {
    echo "ID do produto não fornecido."; 
}

$conn->close(); 
?>
