# Como rodar o sistema? | Fernando Lucas Vieira Junior

## Sistema de Cadastro de Produtos

Este sistema permite cadastrar produtos com nome, descrição, valor e disponibilidade para venda, utilizando HTML, CSS, PHP e MySQL. O sistema foi desenvolvido para ser executado localmente com o XAMPP e gerido pelo phpMyAdmin.

## Requisitos

- **PHP 7.4 ou superior**
- **MySQL**
- **XAMPP** (ou qualquer servidor local compatível)
- **phpMyAdmin** (para gerenciamento do banco de dados)

## Configuração do Ambiente

### 1. Baixe e instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html).
- Após a instalação, inicie o Apache e o MySQL pelo painel de controle do XAMPP.

### 2. Criação do Banco de Dados
No `phpMyAdmin`, crie um banco de dados chamado `listaProdutos-db`.

### 3. Criação da Tabela
Execute o seguinte comando SQL no `phpMyAdmin` para criar a tabela de produtos:

```sql
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    disponibilidade ENUM('sim', 'nao') NOT NULL
);
```

### 4. Colocar os arquivos no Xampp
Acesse o diretório de instalação do XAMPP. O caminho padrão geralmente é C:\xampp. Dentro da pasta XAMPP, localize a pasta htdocs. Este é o diretório onde você vai colar os arquivos do sistema compactado e em seguida irá descompactá-lo.

### 5. Abrir o sistema no navegador, através do Localhost
http://localhost/listaProdutos/form/cadastrarProdutos.php

# Desenvolvimento

Tenho como objetivo permitir a fácil inserção, listagem e exclusão de produtos. A estrutura é simples, usando o XAMPP como servidor local e o phpMyAdmin para gerenciamento do banco de dados. Na sessão atual, desenvolvimento, irei detalhar um pouco mais sobre os códigos utilizados.

## Descrição dos arquivos

### /form/cadastrarProdutos.php: 
Contém o formulário de cadastro de produtos, onde o usuário pode inserir informações sobre o produto (nome, descrição, valor e disponibilidade).

### /form/selecionarProdutos.php: 
Página que exibe todos os produtos cadastrados no banco de dados, com a possibilidade de excluir qualquer produto.

### /form/excluirProdutos.php: 
Página responsável por excluir um produto do banco de dados. O produto é excluído com base no seu ID.

### /config/config.php: 
Arquivo que contém a configuração de conexão com o banco de dados.

### /css/estilo.css: 
Arquivo de estilo que garante a aparência do sistema, incluindo a formatação das páginas HTML e a responsividade.

## Funcionamento do Sistema

### Cadastro de Produtos
O usuário preenche o formulário com as informações do produto. O sistema valida os dados inseridos e, se estiverem corretos, insere as informações no banco de dados. Caso o cadastro seja bem-sucedido, uma mensagem de confirmação é exibida.

### Listagem de Produtos
A página selecionarProdutos.php consulta o banco de dados e exibe todos os produtos cadastrados.
Cada produto é exibido com as informações de nome, descrição, valor e disponibilidade. Ao lado de cada produto, há um botão para excluí-lo.

### Exclusão de Produtos
A exclusão de produtos é feita na página excluirProdutos.php, onde o ID do produto é passado por meio da URL. Após confirmar a exclusão, o produto é removido do banco de dados e o usuário é redirecionado para a página de listagem.

### Conexão com o Banco de Dados
Foi utilizada a função mysqli para conectar ao banco de dados. A conexão é feita com parâmetros (servidor, usuário, senha e nome do banco de dados). Caso haja um erro na conexão, o sistema exibe uma mensagem e interrompe a execução. Segue o exemplo de conexão:

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "listaProdutos-db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
```





