const filmes = () => {
    fetch('../../controladores/rota.php?acao=mostrarFilmes')
    .then(response => response.json())
    .then(filmes => {
        filmes.forEach(filme => {
            console.log (filme);
        });
    })
    .catch(error => {
        console.error('Ocorreu um erro:', error);
    });
}