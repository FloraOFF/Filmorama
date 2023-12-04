document.addEventListener("DOMContentLoaded", function () {
    fetch('/Filmorama/controladores/rota.php?acao=User')
    .then(response => response.json())
    .then(usuario => {
        if(usuario === null) {
            //console.log('lalalalalala')
            window.location.href = '../visoes/formAutenticar.html';
            console.log('entrou aqui')
        } else {
            let welcome = document.querySelector('h1#welcome');
            welcome.innerHTML = `Bem vindo! ${usuario.nome}`;

            if(usuario.papel === 'Comum') {
                console.log ('Entrou aqui')
                const actionsUser = document.querySelector('div#actionsUser');
                let addAdmin = document.createElement('button');
                addAdmin.textContent = 'Virar Adm';
                actionsUser.appendChild(addAdmin);
            }
        }

        console.log(usuario);
        
        //papelConfig(papelDoUsuario);
    });
});

// const papelConfig = (papel) => {
//     const ElementosDivMostrar = document.querySelectorAll('div.mostrar div.config')

//     ElementosDivMostrar.forEach(divMostrar => {
//         if (papel === 'Admin') {
//             divMostrar.style.display = "block"; 
//         } else {
//             divMostrar.style.display = "none"; 
//         }
//     });
// }
