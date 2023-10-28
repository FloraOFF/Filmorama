const filmes = () => {
    fetch('../../controladores/FilmeControlador.php')
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