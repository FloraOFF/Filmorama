const filmes = () => {
    fetch('../../controladores/rota.php?acao=mostrarFilmes')
    .then(response => response.json())
    .then(filmes => {
        for (const filme in filmes) {
            console.log (filme);
        }
    })
}

filmes();