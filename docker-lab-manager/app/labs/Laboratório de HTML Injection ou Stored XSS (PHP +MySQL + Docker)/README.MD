# Laboratório de HTML Injection (Stored XSS)
**(PHP + MySQL + Docker)**

Laboratório educacional para estudo de **HTML Injection** e **Stored Cross-Site Scripting (XSS)** utilizando PHP 8.2, MySQL 8 e Docker.
O objetivo é demonstrar, de forma controlada, como aplicações vulneráveis podem ser exploradas quando dados fornecidos pelo usuário são armazenados e exibidos sem a devida sanitização ou "Output Encoding".

⚠️ **Atenção:** Este projeto é exclusivamente para fins educacionais. A falta de tratamento de saída demonstrada aqui é uma falha crítica de segurança. Não utilize este padrão em ambientes reais.

## 📦 Tecnologias Utilizadas
* PHP 8.2 (Apache)
* MySQL 8.0
* Docker / Docker Compose
* PDO (Com Prepared Statements – Seguro contra SQLi)
* HTML/CSS (Frontend vulnerável a injeção de código)

## 📁 Estrutura do Projeto
```text
LAB HTML INJECTION/
├── database/
│   └── init.sql
├── src/
│   ├── app/
│   │   ├── models/Task.php
│   │   └── database.php
│   ├── assets/
│   ├── index.php
│   ├── task.php
│   └── cadastro-task.html
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
---

## 🧪 Funcionamento da Vulnerabilidade

A aplicação utiliza Prepared Statements no PHP (Task.php), o que impede SQL Injection. No entanto, ela confia cegamente no conteúdo inserido e o imprime diretamente no HTML (index.php e task.php).

O fluxo da falha:

 * O usuário envia um script ou HTML malicioso no campo "Título" ou "Descrição".

 * O PHP salva esse conteúdo cru no banco de dados.

 * Ao visualizar a tarefa, o PHP imprime o dado sem usar htmlspecialchars():
    PHP

    ``` <h1><?= $tarefa['titulo'] ?></h1> ```

 * O navegador interpreta o código injetado e o executa.

## 💥 Exemplos de Testes de HTML Injection

Acesse a página "+ Abrir Chamado" e insira os seguintes payloads nos campos de texto:

### 🔸 Defacement (Alteração Visual) Quebra o layout da página inserindo tags de formatação.

```
<h1 style="color:red; font-size:50px">HACKED</h1><marquee>Sistema Vulnerável</marquee>
```

### Stored XSS (Execução de JavaScript) Exibe um alerta sempre que alguém acessar a lista de chamados.
```
<script>alert('XSS: Você foi atacado!')</script>
```
### 🔸 Redirecionamento Forçado Redireciona qualquer usuário que tentar ver o chamado para outro site.
```
<script>window.location='[https://www.google.com](https://www.google.com)';</script>
```

### 🔸 Injeção de Imagem (Roubo de IP) Tenta carregar um recurso externo para rastrear quem visualiza o chamado.
```
<img src="[http://site-atacante.com/imagem.jpg](http://site-atacante.com/imagem.jpg)" onerror="alert('Imagem carregada')">
```

## 📚 Objetivos Educacionais

    Compreender a diferença entre SQL Injection e HTML Injection/XSS.

    Entender o conceito de Stored XSS (Persistente).

    Visualizar como o navegador interpreta dados não tratados como código.

    Reforçar a importância de funções de sanitização como htmlspecialchars().