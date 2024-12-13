<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $marca = $_POST['marca'];
    $preco = $_POST['preco'];
    $validade = $_POST['validade'];
    $url_foto = $_POST['url_foto'];

    $stmt = $conn->prepare("INSERT INTO produtos (Nome, Descricao, Marca, Preco, Validade, url_foto) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $descricao, $marca, $preco, $validade, $url_foto);

    if ($stmt->execute()) {
        $id = $stmt->insert_id;
        $stmt->close();

        $result = $conn->query("SELECT * FROM produtos WHERE ID = $id");
        $new_product = $result->fetch_assoc();

        echo json_encode(['success' => true, 'product' => $new_product]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
}
?>
