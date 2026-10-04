<center>

<img width="260" height="208" alt="Image" src="https://github.com/user-attachments/assets/138f24ab-de9d-4920-bb79-e4ef89a0a25c" />

</center>

# 🛡️ Web Security Labs & Pentest Playground

![Badge Em Desenvolvimento](https://img.shields.io/badge/STATUS-EM_DESENVOLVIMENTO-brightgreen?style=for-the-badge)

![Badge Python](https://img.shields.io/badge/Python-3776AB?style=for-the-badge&logo=python&logoColor=white)

![Badge Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)

![Badge PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

![Badge MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)


## 🎯 Objetivo

Bem-vindo ao meu repositório de estudos focados em **Segurança Ofensiva (Pentest Web)** e **Desenvolvimento Seguro**.

Este projeto reúne **ambientes controlados**, desenvolvidos por mim, para simular vulnerabilidades reais (CVEs, OWASP Top 10) e praticar a **exploração e correção** dessas falhas. O objetivo é demonstrar tecnicamente **como as falhas ocorrem no código** e **como mitigá-las**.

> **⚠️ Aviso Legal:**
>
> Todo o conteúdo deste repositório é **estritamente educacional**.
>
> As ferramentas e laboratórios aqui contidos devem ser utilizados **apenas em ambientes autorizados**.
>
> O autor **não se responsabiliza** pelo uso indevido das informações.

---
## 📑 Sumário


- [🧠 Decisões Técnicas](#-decisões-técnicas)
  - [🐳 Por que Docker?](#-por-que-docker)
  - [🐍 Automação com Python](#-automação-com-python)
- [🚀 Estrutura do Projeto](#-estrutura-do-projeto)

---

## 🧠 Decisões Técnicas

### 🐳 Por que Docker?

Este laboratório foi construído utilizando **conteinerização** (Docker & Docker Compose) para garantir isolamento total e facilidade de reprodução. Não é necessário instalar PHP, Apache ou bancos de dados localmente, evitando conflitos no seu sistema operacional.

### 🐍 Automação com Python

Para eliminar a necessidade de navegar manualmente por pastas e digitar comandos exaustivos do Docker, desenvolvi um **Menu Interativo em Python** (`main.py`). O script mapeia automaticamente os laboratórios disponíveis, identifica o ambiente (Dockerfile ou docker-compose) e gerencia todo o ciclo de vida da máquina (Build, Up e Down) com apenas alguns cliques.

---

## 🚀 Estrutura do Projeto

O repositório está organizado de forma modular. O script principal varre a pasta `labs/` para listar os ambientes disponíveis:

```text
web-security-labs/

├── labs/
│   ├── HTML INJECTION/     # Cross-Site Scripting (Stored XSS)
│   └── SQL INJECTION/      # Labs focados em injeção de SQL
│
├── main.py                 # CLI interativa para rodar os laboratórios
└── README.md