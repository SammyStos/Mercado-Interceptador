
function checkOperatingSystem() {
    const isWindows = navigator.userAgent.includes("Windows");
    if (isWindows) {
        console.log("Você está no Windows.");
    } else {
        console.log("Você não está no Windows.");
    }
}

checkOperatingSystem();

function openForm() {
    document.getElementById('addProductModal').style.display = 'flex';
}


function closeForm() {
    document.getElementById('addProductModal').style.display = 'none';
}


function addProduct() {
    const formData = new FormData(document.getElementById('addProductForm'));

    fetch('add.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const product = data.product;
            const cardHTML = `
                <div class="card">
                    <div class="card__img" style="background-image: url(${product.url_foto});"></div>
                    <div class="card__info">
                        <h2 class="card__title">${product.Nome}</h2>
                        <p class="card__category">${product.Marca}</p>
                        <p> ${product.Descricao}</p>
                        <p> R$${product.Preco}</p>
                        <p> ${product.Validade}</p>
                    </div>
                </div>`;
            document.getElementById('productCards').insertAdjacentHTML('beforeend', cardHTML);
            closeForm();
        } else {
            alert("Erro ao adicionar produto.");
        }
    })
    .catch(error => console.error('Erro:', error));
}


let productIdToDelete = null;

function openModal(productId) {
    productIdToDelete = productId; 
    document.getElementById("confirmModal").style.display = "flex"; 
}

function closeModal() {
    document.getElementById("confirmModal").style.display = "none"; 
}

document.getElementById("confirmDeleteBtn").onclick = function() {
    if (productIdToDelete) {
        window.location.href = "delete.php?id=" + productIdToDelete;
    }
}

function openEditModal(productId) {
    fetch(`get.php?id=${productId}`)
    .then(response => response.json())
    .then(product => {
        document.getElementById('editProductId').value = product.ID;
        document.getElementById('editNome').value = product.Nome;
        document.getElementById('editDescricao').value = product.Descricao;
        document.getElementById('editMarca').value = product.Marca;
        document.getElementById('editPreco').value = product.Preco;
        document.getElementById('editValidade').value = product.Validade;
        document.getElementById('editUrlFoto').value = product.url_foto;
        
        document.getElementById('editProductModal').style.display = 'flex';
    })
    .catch(error => console.error('Erro:', error));
}

function closeEditModal() {
    document.getElementById('editProductModal').style.display = 'none';
}

function update() {
    const id = document.getElementById('editProductId').value;
    const formData = new FormData();
    formData.append('id', id);

    const nome = document.getElementById('editNome').value;
    if (nome) {
        formData.append('nome', nome);
    }
    const descricao = document.getElementById('editDescricao').value;
    if (descricao) {
        formData.append('descricao', descricao);
    }
    const marca = document.getElementById('editMarca').value;
    if (marca) {
        formData.append('marca', marca);
    }
    const preco = document.getElementById('editPreco').value;
    if (preco) {
        formData.append('preco', preco);
    }
    const validade = document.getElementById('editValidade').value;
    if (validade) {
        formData.append('validade', validade);
    }
    const url_foto = document.getElementById('editUrlFoto').value;
    if (url_foto) {
        formData.append('url_foto', url_foto);
    }

    fetch('update.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload(); 
        } else {
            alert('Erro ao atualizar produto: ' + data.message);
        }
    })
    .catch(error => console.error('Erro:', error));
}
