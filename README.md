# RetroJerseys ⚽

Sistema de e-commerce fictício para venda de camisas retrô de futebol, desenvolvido como projeto acadêmico e evoluído com foco em boas práticas de backend.

## 📌 Sobre o projeto

O RetroJerseys simula uma loja online especializada em camisas retrô de times de futebol, com cadastro de produtos, clientes, pedidos e pagamentos. O projeto nasceu como trabalho de faculdade e vem sendo reorganizado e ampliado como projeto de portfólio.

## 🚀 Tecnologias utilizadas

- **PHP** (PDO para acesso ao banco)
- **MySQL** (rodando via Docker)
- **HTML, CSS e JavaScript**
- **Docker** (ambiente de banco de dados)
- **Git/GitHub** (versionamento)

## Arquitetura

O projeto segue o padrão **MVC (Model-View-Controller)**:

```
retro-football-store
│
├── config/
│   └── database.php        #Conexão com o banco (PDO)
│
├── public/
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   ├── produtos.php
│   ├── router.php
│   └── style.css
│
├── route/
│   └── web.php              #Rotas da aplicação
│
├── src/
│   ├── Controller/
│   ├── Model/
│   │   ├── Cliente.php
│   │   ├── ItemPedido.php
│   │   ├── Pagamento.php
│   │   ├── Pedido.php
│   │   └── Produto.php
│   └── View/
│       ├── Cliente/
│       ├── Item_Pedido/
│       ├── Pagamento/
│       ├── Pedido/
│       └── Produto/
│
└── README.md
```

## Modelagem do banco de dados

O banco de dados (`retro_jerseys`) possui as seguintes tabelas:

- **Cliente** — dados de cadastro e login dos usuários
- **Produto** — informações das camisas (descrição, preço, tamanho, time, estoque)
- **Pedido** — pedidos realizados, vinculados a um cliente
- **ItemPedido** — itens de cada pedido, com quantidade e preço unitário
- **Pagamento** — dados de pagamento vinculados a um pedido

## Variáveis de ambiente

As credenciais do banco de dados **não ficam expostas no código**. Elas são carregadas a partir de um arquivo `.env` (ignorado pelo Git). O arquivo `.env.example` mostra o formato esperado:

```
DB_HOST=127.0.0.1
DB_NAME=retro_jerseys
DB_USER=root
DB_PASS=root
```

## Funcionalidades implementadas

- Conexão com banco de dados via PDO
- CRUD completo de produtos (criar, listar, buscar, atualizar e deletar)
- Estrutura de login e cadastro de clientes
- Estrutura inicial de roteamento

## 🔜 Melhorias futuras

- Listagem dinâmica de produtos na página `produtos.php`
- Implementação do `ProdutoController` (fluxo completo MVC)
- Formulário de cadastro de produtos
- Implementação de carrinho de compras
- Validações mais robustas
- Script `database/schema.sql` para facilitar a criação do banco

## ⚙️ Como executar o projeto localmente

### Pré-requisitos
- PHP instalado
- Docker instalado

### 1. Clone o repositório
```bash
git clone https://github.com/mariaerech/retro-football-store.git
cd retro-football-store
```

### 2. Suba o banco de dados com Docker
```bash
docker run -d --name mysql-retro -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=retro_jerseys -p 3306:3306 mysql:8
```

### 3. Configure as variáveis de ambiente
Copie o arquivo de exemplo e ajuste se necessário:
```bash
cp .env.example .env
```
O `.env` já vem com valores padrão compatíveis com o comando Docker acima (`root`/`root`), então na maioria dos casos não precisa alterar nada.

### 4. Crie as tabelas
Acesse o MySQL do container e execute os scripts `CREATE TABLE` (disponíveis na pasta `database/`, quando publicados).

### 5. Inicie o servidor PHP
```bash
php -S localhost:8000 -t public
```

Acesse em: `http://localhost:8000`

## Autora

Projeto desenvolvido por Maria Eduarda Rech, estudante de Ciência da Computação.
