// Seleciona os botões
const botaoResponder = document.querySelector('.btn-responder');
const botaoFechar = document.querySelector('.btn-fechar');

// Verifica se o botão existe para evitar erros
if (botaoResponder) {
    botaoResponder.addEventListener('click', function() {
        alert('Respondido com Sucesso!');
    });
}

if (botaoFechar) {
    botaoFechar.addEventListener('click', function() {
        alert('Task Fechada com sucesso!');
    });
}