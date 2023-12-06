document.addEventListener('DOMContentLoaded', function () {
    const parametrosURL = new URLSearchParams(window.location.search);
    const idFilme = parametrosURL.get('idFilme');

    if (idFilme) {
        console.log(`Editando... Filme com id ${idFilme}`);

        fetch('/Filmorama/controladores/rota.php?acao=mostrarFilmes')
            .then(response => response.json())
            .then(filmes => {
                // Agora você pode usar os dados do filme para preencher o formulário de edição
                filmes.forEach(filme => {
                    console.log (filme.id);
                    if (filme.id === parseInt(idFilme)) {
                        preencherFormularioEdicao(filme);
                    }
                });
            })
            .catch(error => {
                console.error('Erro ao obter dados do filme:', error);
            });
    } else {
        console.error('Id do filme não encontrado na URL');
    }
});

function preencherFormularioEdicao(filme) {
    console.log (filme);
    // Aqui você implementaria a lógica para preencher o formulário de edição
    // por exemplo:
    // const form = document.querySelector('form');
    
    document.getElementById('titulo').value = filme.titulo;
    document.getElementById('dataEstreia').value = filme.dataEstreia;
    document.getElementById('genero').value = filme.genero;
    document.getElementById('classificacao').value = filme.classificacao;
    document.getElementById('duracao').value = filme.duracao;
    document.getElementById('elenco').value = filme.elenco;
    document.getElementById('sinopse').value = filme.sinopse;
    document.getElementById('avaliacao').value = filme.avaliacao;
    document.getElementById('produtora').value = filme.produtora;
    document.getElementById('paisOrigem').value = filme.paisOrigem;
    document.getElementById('idioma').value = filme.idioma;
    //Preencher outros campos conforme necessário
}
