// Recupere o papel do usuário da sessão usando JavaScript
const papelDoUsuario = "<?php echo $_SESSION['usuario']; ?>";

// Elementos HTML dos botões
const botoesConfig = document.querySelector('div.mostrar div.config')

// Verifique o papel do usuário e exiba/oculte os botões conforme necessário
if (papelDoUsuario === 'Admin') {
    botoesConfig.style.display = "block"; 
} else {
    botoesConfig.style.display = "none"; 
}

