
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="example">
                <ul class="nav nav-underline-border" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" data-coreui-toggle="tab" href="#preview-1000" role="tab" aria-selected="true">
                            <svg class="icon me-2">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                            </svg>Jogos</a></li>
                </ul>
                <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="row align-items-center mt-3">
                            <div class="col-12 col-xl-2 mb-3 mb-xl-0">Lista de jogos</div>
                            <div class="col-auto">
                                <a onclick="redirecionarNumerosmaisSaidos()" class="btn btn-primary active" aria-pressed="true">Números mais saídos</a>
                                <a onclick="redirecionarValorTotalPorJogo()" class="btn btn-secondary active" aria-pressed="true">Soma por jogos</a>
                                <a onclick="redirecionarListaMediaNumerosMaisSaidos()" class="btn btn-success active" type="button" aria-pressed="true">Média de saída</a>
                                <a onclick="redirecionarPosicaoSaidas()" class="btn btn-danger active" type="button" aria-pressed="true">Quantidade saída por posição</a>
                                <a onclick="redirecionarQuinzeNúmerosMaisSaidos()" class="btn btn-warning active" type="button" aria-pressed="true">Jogo com os números mais saídos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
