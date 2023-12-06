document.addEventListener('DOMContentLoaded', function () {
    const parametrosURL = new URLSearchParams(window.location.search);
    const idFilme = parametrosURL.get('idFilme');

    if (idFilme) {
        // O idFilme contém o valor do id passado pela URL
        // Agora você pode usar esse valor para carregar os dados do filme e preencher o formulário de edição
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
        // Caso não haja idFilme na URL, você pode lidar com isso aqui
        console.error('Id do filme não encontrado na URL');
    }
});

function preencherFormularioEdicao(filme) {
    console.log (filme);
    // Aqui você implementaria a lógica para preencher o formulário de edição
    // por exemplo:
    // document.getElementById('titulo').value = filme.titulo;
    // document.getElementById('dataEstreia').value = filme.dataEstreia;
    // Preencher outros campos conforme necessário
}
