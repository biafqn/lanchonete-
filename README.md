# 📘 Sistema de Lanchonete - CRUD em PHP

Este projeto é um sistema simples de gerenciamento de produtos para uma lanchonete, desenvolvido em **PHP** com conexão a um banco de dados **MySQL**. A aplicação implementa as quatro operações básicas de um **CRUD** (Create, Read, Update, Delete).

---

## 🎯 Funcionalidades

* **Cadastrar (Create):** Permite adicionar novos produtos com nome, descrição, preço e imagem (URL).
* **Listar (Read):** Exibe todos os produtos cadastrados em um formato de cardápio visualmente agradável, usando cards.
* **Editar (Update):** Possibilita a edição das informações de um produto já existente através de um formulário pré-preenchido.
* **Excluir (Delete):** Permite remover um produto do banco de dados de forma definitiva com uma confirmação.

---

## 💻 Tecnologias Utilizadas

* **Linguagem de Programação:** PHP
* **Banco de Dados:** MySQL
* **Servidor Local:** XAMPP
* **Front-end:** Bootstrap 5 (para estilização e layout responsivo)

---

## 🚀 Como Rodar o Projeto

Siga estes passos para configurar e executar o projeto em sua máquina local.

### 1. Pré-requisitos
* Garanta que o **XAMPP** esteja instalado em seu computador e que os módulos **Apache** e **MySQL** estejam iniciados.

### 2. Configuração do Banco de Dados
1.  Abra o **phpMyAdmin** em seu navegador: `http://localhost/phpmyadmin`
2.  Clique na aba **SQL** e execute o seguinte comando para criar o banco de dados e a tabela `produtos`:

```sql
CREATE DATABASE lanchonete;

USE lanchonete;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    imagem VARCHAR(255)
);

```
### 3. Estrutura do Projeto
- Navegue até o diretório `htdocs` da sua instalação do XAMPP.
- Crie uma nova pasta chamada `lanchonete`.
- Salve os arquivos do projeto (`conexao.php`, `index.php`, `cadastrar.php`, `editar.php`, `deletar.php`) dentro desta pasta.

---

### 4. Execução
Abra seu navegador e acesse a URL: `http://localhost/lanchonete`

O sistema estará pronto para ser utilizado!

---

### 📂 Estrutura de Arquivos
- **`conexao.php`**: Script de conexão com o banco de dados.
- **`index.php`**: Página principal que lista todos os produtos.
- **`cadastrar.php`**: Formulário para adicionar novos produtos.
- **`editar.php`**: Formulário para editar um produto existente.
- **`deletar.php`**: Script para excluir um produto.
