document.addEventListener("DOMContentLoaded", function () {
    fetch('/Filmorama/controladores/rota.php?acao=User')
    .then(response => response.json())
    .then(usuario => {
        if(usuario === null) {
            //console.log('lalalalalala')
            console.log ('Não tem usuário');
        } else {    
            console.log (`Tem usuário aqui sim, é ${usuario.nome}`);
        }
    })
})