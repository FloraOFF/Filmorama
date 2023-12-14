document.addEventListener("DOMContentLoaded", function () {
    fetch('/Filmorama/controladores/rota.php?acao=User')
    .then(response => response.json())
    .then(usuario => {
        if(usuario === null) {
            //console.log('lalalalalala')
            window.location.href = '../visoes/formAutenticar.html';
            console.log('entrou aqui');
        } else {
            const papelDoUsuario = usuario.papel;
            console.log(papelDoUsuario);
            
            papelConfig(papelDoUsuario);
        }
    });
});

const papelConfig = (papel) => {
    const ElementosDivMostrar = document.querySelectorAll('div.mostrar div.config')
    
    if (papel === 'Admin') {
        ElementosDivMostrar.forEach(divMostrar => {
            //if (papel === 'Admin') {
            divMostrar.style.display = "block"; 
        });
    } else {
            ElementosDivMostrar.forEach(divMostrar => {
            divMostrar.style.display = "none"; 
        });
    }    
}
