document.addEventListener("DOMContentLoaded", function () {
    fetch('/Filmorama/controladores/rota.php?acao=User')
    .then(response => response.json())
    .then(usuario => {
        const papelDoUsuario = usuario.papel;
        console.log(papelDoUsuario);
        
        papelConfig(papelDoUsuario);
    });
});

const papelConfig = (papel) => {
    const ElementosDivMostrar = document.querySelectorAll('div.mostrar div.config')

    ElementosDivMostrar.forEach(divMostrar => {
        if (papel === 'Admin') {
            divMostrar.style.display = "block"; 
        } else {
            divMostrar.style.display = "none"; 
        }
    });
}
