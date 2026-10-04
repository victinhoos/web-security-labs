CREATE TABLE IF NOT EXISTS funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    salario DECIMAL(10, 2) NOT NULL
);

INSERT INTO funcionarios (usuario, cargo, salario) VALUES 
('Pedro Herinnque', 'Analista', 3200.00),
('Admin', 'Administrador', 9000.00),
('Roberto Santos', 'Estagiário', 1200.00),
('Ana Silva', 'Gerente de TI', 15500.00); 