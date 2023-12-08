(function(){
    fetch('/Filmorama/controladores/rota.php?acao=mostrarFilmes')
    .then(response => response.json())
    .then(filmes => {
        for (const filme of filmes) {
            mostrarFilmes(filme); 
        }
    })

    document.addEventListener('click', function (event) {
        if (event.target.id === 'editar') {
            event.preventDefault();
            const idFilme = event.target.getAttribute('data-id');
            edit(idFilme);
        } else if (event.target.id ==='deletar') {
            event.preventDefault();
            const idFilme = event.target.getAttribute('data-id');
            delet(idFilme);
        }
    });
    
})();

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
    <p>Idioma: ${filme.idioma}</p>
    <div class="config">
        <a href="#" id="editar" data-id="${filme.id}">Editar</a>
        <a href="#" id="deletar" data-id="${filme.id}">Deletar</a>
    </div>`

    document.body.appendChild(divShow);
}

const edit = (id) => {
    const urlEdicao = `formEditarFilme.html?idFilme=${id}`;
    //console.log(`Editando...Filme com id ${id}`);
    window.location.href = urlEdicao;
}

const delet = (id) => {
    console.log(`Deletando...Filme com id ${id}`);
    if(confirm('Deseja realmente deletar esse filme?')){
        const urlDelecao = `/Filmorama/controladores/rota.php?acao=deletarFilme&idFilme=${id}`
        fetch(urlDelecao, {method: 'GET'})
        .then(response => {
            if(response.ok) {
                window.location.reload();
            }
        })
        .catch(error => {
            console.error('Erro ao deletar filme:', error);
        });
    }
}