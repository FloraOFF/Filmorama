document.addEventListener("DOMContentLoaded", function () {
    fetch('/Filmorama/controladores/rota.php?acao=User')
    .then(response => response.json())
    .then(usuario => {
        const autent = document.querySelector('button#navButton.autentButton');
        const url = window.location.href;
        
        if(usuario != null) {
            //console.log('lalalalalala')
            console.log ('Tem usuário aqui sim');

            if (autent) {
                autent.textContent = 'Sessão Usuário';

                autent.addEventListener('click', (event) => {
                    event.preventDefault();
                    if (url.includes('/Filmorama/index.html')) {
                        console.log ('index.html')
                        autent.href = './visoes/home.html';
                        window.location.href = './visoes/home.html';   
                    } else {
                        console.log ('Outra página')
                        autent.href = './home.html';
                        window.location.href = './home.html';
                    }
                })

                const url = window.location.href;

                if (url.includes('/Filmorama/visoes/formCadastrarFilme.html') || url.includes('/Filmorama/visoes/formEditarFilme.html')) {
                    if (usuario.papel != 'Admin') {
                        window.location.href = './home.html';
                    } 
                }
            } 
        } else {    
            console.log ('Não tem usuário');
            if (url.includes('/Filmorama/visoes/formAutenticar.html')) {
                autent.style.display = 'none';
            }
        }
    })
})