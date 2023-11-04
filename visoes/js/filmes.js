function mostrarFilmes (filme) {
    const divShow = document.createElement('div');
    divShow.classList.add("mostrar");

    divShow.innerHTML = `    
    <h2>${filme.titulo}</h2>
    <p>Data de Estreia: ${filme.dataEstreia}</p>
    <p>Gênero: ${filme.genero}</p>
    <p>Classificação: ${filme.classificacao}</p>
    <p>Duração: ${filme.duracao}</p>
    <p>Elenco: ${filme.elenco}</p>
    <p id="sinopse">Sinopse: ${filme.sinopse}</p>
    <p>Avaliação: ${filme.avaliacao}</p>
    <p>Produtora: ${filme.produtora}</p>
    <p>Pais de Origem: ${filme.paisOrigem}</p>
    <p>Idioma: ${filme.idioma}</p>`

    document.body.appendChild(divShow);
}

(function(){
    fetch('/Filmorama/controladores/rota.php?acao=mostrarFilmes')
    .then(response => response.json())
    .then(filmes => {
        for (const filme of filmes) {
            mostrarFilmes(filme);
        }
    })
})();