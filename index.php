<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Produtos</title>
</head>
<body>

<header>
    <h1 class="menu-title" backgroundcolor= "#1e6f8d">Produtos</h1>
</header>


    <div class="add-product-container">
        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png" 
             alt="Adicionar Produto" 
             class="add-product-icon" 
             onclick="openForm()">
    </div>

    <div class="cards" id="productCards">
    <?php
    include 'conexao.php';
    $query = "SELECT * FROM produtos";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $url_foto = $row["url_foto"];
            $nome = $row["Nome"];
            $marca = $row["Marca"];
            $descricao = $row["Descricao"];
            $preco = number_format($row["Preco"], 2, ',', '.');
            $validade = date('d/m/Y', strtotime($row["Validade"]));
            $id = $row["ID"];
            ?>
            <div class="card" data-id="<?php echo $id; ?>">
                <div class="card__img" style="background-image: url('<?php echo $url_foto; ?>');"></div>
                <div class="card__info-hover">
                    <svg class="card__like" viewBox="0 0 24 24" onclick="openEditModal(<?php echo $id; ?>)">
                        <path fill="#000000" d="M3,17.25V21h3.75L17.81,9.94l-3.75-3.75L3,17.25M22.41,6.34c0.39-0.39 0.39-1.02 0-1.41l-2.34-2.34c-0.39-0.39-1.02-0.39-1.41,0l-1.83,1.83 3.75,3.75 1.83-1.83z" />
                    </svg>

                    <svg class="card__clock" viewBox="0 0 24 24" onclick="openModal(<?php echo $id; ?>)">
                        <path fill="#000000" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6Z" />
                    </svg>
                </div>
                <div class="card__info">
                    <h2 class="card__title"><?php echo $nome; ?></h2>
                    <p class="card__category"><?php echo $marca; ?></p>
                    <p><?php echo $descricao; ?></p>
                    <p>R$<?php echo $preco; ?></p>
                    <p>Validade: <?php echo $validade; ?></p>
                </div>
            </div>
            <?php
        }
    }
    ?>
    </div>

    <div id="addProductModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeForm()">×</span>
            <form id="addProductForm" onsubmit="event.preventDefault(); addProduct();">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" required></textarea>
                
                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca">
                
                <label for="preco">Preço:</label>
                <input type="number" id="preco" name="preco" step="0.01" required>
                
                <label for="validade">Validade:</label>
                <input type="date" id="validade" name="validade">
                
                <label for="url_foto">URL da Foto:</label>
                <input type="url" id="url_foto" name="url_foto">
                
                <button type="button" class="salvar" onclick="addProduct()">Salvar</button>
            </form>
        </div>
    </div>

 
    <div id="editProductModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-button" onclick="closeEditModal()">×</span>
            <h2>Editar Produto</h2>
            <form id="editProductForm" onsubmit="event.preventDefault(); chooseUpdateMethod();">
                <input type="hidden" id="editProductId" name="id">
                <label for="editNome">Nome:</label>
                <input type="text" id="editNome" name="nome" required>
                <label for="editDescricao">Descrição:</label>
                <textarea id="editDescricao" name="descricao" required></textarea>
                <label for="editMarca">Marca:</label>
                <input type="text" id="editMarca" name="marca">
                <label for="editPreco">Preço:</label>
                <input type="number" id="editPreco" name="preco" step="0.01" required>
                <label for="editValidade">Validade:</label>
                <input type="date" id="editValidade" name="validade">
                <label for="editUrlFoto">URL da Foto:</label>
                <input type="url" id="editUrlFoto" name="url_foto">
               
            </form>
            <div>
                <button class= "salvar"onclick="update()">Salvar</button>
            </div>
        </div>
    </div>

   
    <div id="confirmModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal()">&times;</span>
            <h2>Você tem certeza que deseja excluir?</h2>
            <button class="confirm-button" id="confirmDeleteBtn" onclick="confirmDelete()">Sim, excluir</button>
            <button class="cancel-button" onclick="closeModal()">Cancelar</button>
        </div>
    </div>


    
    <script src="js/script.js"></script>
</body>
</html>
