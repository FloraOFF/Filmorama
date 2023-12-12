document.addEventListener("DOMContentLoaded", function () {
    function verificarSessao() {
        fetch('/Filmorama/controladores/rota.php?acao=User')
            .then(response => response.json())
            .then(usuario => {
                if (usuario === null) {
                    window.location.href = '../visoes/formAutenticar.html';
                }
            })
            .catch(error => {
                console.error('Erro na verificação da sessão:', error);
            });
    }

    // Execute a verificação da sessão a cada 5 minutos (ou ajuste conforme necessário)
    setInterval(verificarSessao, 15 * 1000); // 5 minutos em milissegundos
});
