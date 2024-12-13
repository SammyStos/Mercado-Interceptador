CREATE DATABASE db_Produto;
 
use db_Produto;
 
 
CREATE TABLE Produtos (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Descricao TEXT,
    Marca VARCHAR(50),
    Preco DECIMAL(10, 2) NOT NULL,
    Validade DATE,
	url_foto VARCHAR(255) NOT NULL
);
 
INSERT INTO Produtos (Nome, Descricao, Marca, Preco, Validade, url_foto)
VALUES
('Cereal Matinal', 'Cereal matinal de milho e aveia', 'Kellogg\'s', 15.99, '2025-08-31','https://statics.angeloni.com.br/super/files/produtos/4714405/4714405_1_zoom.jpg'),
('Biscoito Recheado', 'Biscoito recheado com creme de chocolate', 'Bauducco', 4.79, '2024-12-31', 'https://statics.angeloni.com.br/eletro/files/4192294/4192294_1_zoom.jpg'),
('Arroz Tipo 1', 'Arroz branco tipo 1, 5kg', 'Tio João', 20.99, '2026-02-28', 'https://santaluzia.vteximg.com.br/arquivos/ids/968424-740-515/512931.jpg?v=637385261171800000'),
('Miojo', 'Miojo galinha caipira', 'Nissin', 2.99, '2024-09-15','https://zonasul.vtexassets.com/arquivos/ids/3075645/VF4qT-qqCUAAAAAAAAGsuA.jpg?v=637877793864300000'),
('Chocolate', 'Chocolate ao leite', 'Nestlé', 9.99, '2024-11-30', 'https://tfdfn2.vtexassets.com/arquivos/ids/226076/barra-de-chocolate-ao-leite-classic-nestle-80g.jpg?v=638186460693900000'),
('Suco de Maracujá', 'Suco de maracujá em lata', 'Del Valle', 7.50, '2024-12-15', 'https://images.tcdn.com.br/img/img_prod/881726/suco_del_valle_maracuja_lata_290ml_695_1_20201127094753.jpg'),
('Pão de Forma', 'Pão de forma integral', 'Pullman', 8.49, '2024-11-05','https://statics.angeloni.com.br/super/files/produtos/4278076/4278076_1_zoom.jpg'),
('Farinha de Trigo', 'Farinha de trigo especial', 'Dona Benta', 3.99, '2025-01-12', 'https://io.convertiez.com.br/m/superpaguemenos/shop/products/images/15199/large/farinha-de-trigo-dona-benta-tradiconal-1kg_75404.jpg'),
('Macarrão Espaguete', 'Macarrão espaguete grano duro', 'Barilla', 6.49, '2025-02-15', 'https://www.sondadelivery.com.br/img.aspx/sku/353167/530/8076800195057-02.png'),
('Molho de Tomate', 'Molho de tomate bolonhesa', 'Heinz', 4.89, '2024-12-31', 'https://io.convertiez.com.br/m/superpaguemenos/shop/products/images/52774/medium/molho-de-tomate-heinz-bolonhesa-300g_99196.png'),
('Açúcar Refinado', 'Açúcar refinado', 'União', 4.19, '2025-03-10', 'https://savegnagoio.vtexassets.com/arquivos/ids/371554/ACUCARREFINADOUNIAO1KG1.jpg?v=638082771115000000'),
('Caixa de bombom', 'Caixa com 15 bombons', 'Nestlé', 14.50, '2025-01-15', 'https://images.tcdn.com.br/img/img_prod/746520/bombom_especialidades_nestle_300g_5741504_1_20200125133842.jpg'),
('Achocolatado em Pó', 'Achocolatado em pó 2.0', 'Nescau', 8.99, '2025-04-05', 'https://www.medem.com.br/wp-content/uploads/2018/10/Nescau.jpg'),
('Amendoim Assado', 'Amendoim torrado japonês', 'Santa Helena', 5.79, '2025-02-01', 'https://statics.angeloni.com.br/super/files/produtos/327042/327042_1_zoom.jpg'),
('Refrigerante de Cola', 'Refrigerante sabor cola 2L retornável', 'Coca-Cola', 9.99, '2024-12-20', 'https://teravirt.s3-accelerate.amazonaws.com/uploads/sites/95/2021/06/7894900011517.png'),
('Batata Palha', 'Batata palha crocante', 'Yoki', 5.59, '2024-12-25', 'https://mercantilnovaera.vteximg.com.br/arquivos/ids/205644-1000-1000/Batata-Palha-YOKI-Tradicional-Pacote-105g.jpg?v=638152789222800000'),
('Ketchup', 'Ketchup tradicional', 'Heinz', 11.79, '2024-12-10','https://images.tcdn.com.br/img/img_prod/790708/ketchup_heinz_frasco_109_1_20201214020414.jpg'),
('Margarina', 'Margarina com sal', 'Qualy', 7.49, '2025-02-28', 'http://www.rcpapeis.com.br/uploads/produtos/fotos/e/3b21da768adec9cd6a64b894dbb8fdf7.jpg'),
('Kit Shampoo e condicionador', 'Reparação total', 'Elseve', 12.99, '2025-01-22', 'https://cdn-cosmos.bluesoft.com.br/products/7898587776646/2019-05-31-13-36-35-0300'),
('Creme Skala', 'Divino Potão', 'Skala', 13.99, '2025-02-15', 'https://farmaconde.vtexassets.com/arquivos/ids/177367-800-800?v=638199256744300000&width=800&height=800&aspect=true');

   
SELECT * FROM  Produtos;

SELECT url_foto FROM Produtos;
 DROP TABLE Produtos;