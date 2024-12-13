<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $marca = $_POST['marca'];
    $preco = $_POST['preco'];
    $validade = $_POST['validade'];
    $url_foto = $_POST['url_foto'];

    $stmt = $conn->prepare("UPDATE produtos SET Nome = ?, Descricao = ?, Marca = ?, Preco = ?, Validade = ?, url_foto = ? WHERE ID = ?");
    $stmt->bind_param("sssdssi", $nome, $descricao, $marca, $preco, $validade, $url_foto, $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar produto.']);
    }
}
?>
