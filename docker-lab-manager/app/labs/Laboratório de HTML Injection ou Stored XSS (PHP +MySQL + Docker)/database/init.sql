CREATE DATABASE IF NOT EXISTS task_system 
DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE task_system;

SET NAMES utf8;
-- Criação da Tabela
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    status VARCHAR(50) DEFAULT 'Em Aberto',
    solicitante VARCHAR(100) NOT NULL,
    setor VARCHAR(100),
    prioridade VARCHAR(20) DEFAULT 'Baixa',
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- INSERTS 
INSERT INTO tasks (titulo, descricao, status, solicitante, setor, prioridade, data_criacao) VALUES ('PC não liga após queda de energia', 'Hoje pela manhã houve uma oscilação de energia...', 'Em Aberto', 'Ana Souza', 'Financeiro', 'Alta', '2026-01-14 08:30:00');
INSERT INTO tasks (titulo, descricao, status, solicitante, setor, prioridade, data_criacao) VALUES ('PC não liga após queda de energia', 'Hoje pela manhã houve uma oscilação de energia...', 'Em Aberto', 'Ana Souza', 'Financeiro', 'Alta', '2026-01-14 08:30:00');
INSERT INTO tasks (titulo, descricao, status, solicitante, setor, prioridade, data_criacao) VALUES ('Impressora do RH travando papel', 'A impressora HP Laserjet...', 'Em Aberto', 'Carlos Mendes', 'Recursos Humanos', 'Média', '2026-01-14 09:15:00');
INSERT INTO tasks (titulo, descricao, status, solicitante, setor, prioridade, data_criacao) VALUES ('Erro de permissão no sistema de vendas', 'Ao tentar acessar o módulo...', 'Em Andamento', 'Julia Pereira', 'Vendas', 'Alta', '2026-01-14 10:45:00');
INSERT INTO tasks (titulo, descricao, status, solicitante, setor, prioridade, data_criacao) VALUES ('Wi-Fi instável na sala de reuniões 2', 'Durante as videochamadas...', 'Fechado', 'Roberto Lima', 'Marketing', 'Baixa', '2026-01-13 14:20:00');
INSERT INTO tasks (titulo, descricao, status, solicitante, setor, prioridade, data_criacao) VALUES ('Instalação do VS Code', 'Solicito a instalação do VS Code...', 'Em Aberto', 'Pedro Damasco', 'TI / Desenvolvimento', 'Média', '2026-01-15 08:00:00');