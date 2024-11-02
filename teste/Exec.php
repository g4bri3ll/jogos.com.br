<?php

namespace teste;

use app\controller\ControllerNumerosJogoLotoFacil;
use src\Service\LotoFacil\RetornaMediaPorCadaNumero;
use Uteis\Uteis;

$controllerLotoFacil = new ControllerNumerosJogoLotoFacil();
$uteis = new Uteis();
$resultadosLotoFacil = $controllerLotoFacil->listaNumerosSaidosConcursos();
$arrayNumeroMaisSaidosLotoFacil = $controllerLotoFacil->retornaNumerosPorQuantidadeMaisSaida($resultadosLotoFacil, 10);

$frequenciaNumeros = $controllerLotoFacil->retornaAFrequenciaDosNumeros($resultadosLotoFacil);

//soma dos jogos. A chave e o valor total dos numeros, e o value e a quantidade de vezes saido
$somaTotalNumeroJogo = $controllerLotoFacil->retornaSomaPorJogo($resultadosLotoFacil, 0);
$somaTotalNumeroJogo = $uteis->ordernaValorMaiorParaMenor($somaTotalNumeroJogo);

$mediaSaidaPorNumero = (new RetornaMediaPorCadaNumero())->mediaSaidaPorNumero($frequenciaNumeros);

$arrayPosicaoJogo = $controllerLotoFacil->retornaValorTotalPorPosicaoJogo($resultadosLotoFacil);
$quinzeNumerosMaisSaidosPorPosicao = $controllerLotoFacil->calculaPorcetagemSaidaPorPosicao($arrayPosicaoJogo);

?>
<!DOCTYPE html>
<html lang="br">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <link rel="apple-touch-icon" sizes="57x57" href="./public/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./public/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./public/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./public/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./public/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./public/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./public/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./public/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./public/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./public/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./public/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./public/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="./public/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="./public/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="./public/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="./public/css/examples.css" rel="stylesheet">
    <!-- We use those styles to style Carbon ads and CoreUI PRO banner, you should remove them in your application.-->
    <link href="./public/css/ads.css" rel="stylesheet">
    <script src="./public/js/config.js"></script>
    <script src="./public/js/color-modes.js"></script>
    <link href="./public/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<body>

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
                                    <a class="btn btn-primary active" type="button" aria-pressed="true">Números mais saídos</a>
                                    <a class="btn btn-secondary active" type="button" aria-pressed="true">Soma por jogos</a>
                                    <a class="btn btn-success active" type="button" aria-pressed="true">Média de saída</a>
                                    <a class="btn btn-danger active" type="button" aria-pressed="true">Quantidade saída por posição</a>
                                    <a class="btn btn-warning active" type="button" aria-pressed="true">Jogo com os números mais saídos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- início table -->
            <div class="card mb-4">
                <div class="card-header"><strong>Jogos</strong><span class="small ms-1">Numeros mais saídos</span></div>
                <div class="card-body">
                    <p class="text-body-secondary small">Números que mais saíram ate hoje em todos os jogos.</p>
                    <div class="example">
                        <ul class="nav nav-underline-border" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-coreui-toggle="tab" href="#preview-1000" role="tab">
                                    <svg class="icon me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                    </svg>Mais saídos</a></li>
                        </ul>
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                                <table class="table table-dark table-striped-columns">
                                    <thead>
                                        <tr>
                                            <?php foreach ($arrayNumeroMaisSaidosLotoFacil as $key => $value): ?>
                                                <th scope="col"><?php echo $key; ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php foreach ($arrayNumeroMaisSaidosLotoFacil as $item): ?>
                                                <th><?php echo $item; ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fim table -->

            <!-- início table -->
            <div class="card mb-4">
                <div class="card-header"><strong>Números</strong><span class="small ms-1">Valor total do jogo - Quantidade de vezes saídos</span></div>
                <div class="card-body">
                    <div class="example">
                        <p class="text-body-secondary small">Essa tabela soma o jogo e verificar quantas vezes essa soma saiu em outros jogos.</p>
                        <ul class="nav nav-underline-border" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-coreui-toggle="tab" href="#preview-1020" role="tab">
                                    <svg class="icon me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                    </svg>Números</a></li>
                        </ul>
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1020">
                                <table class="table">
                                    <thead class="table-light">
                                        <?php
                                        $a = 0;
                                        $b = 0;
                                        foreach ($somaTotalNumeroJogo as $key => $value):
                                            $a = $a + 1;
                                        ?>

                                            <?php if ($a > $b) {
                                                $b = $b + 10;
                                                echo "<tr>";
                                            } ?>
                                            <th style="background-color: <?php echo $uteis->gerandoCor(); ?>; text-align: center;"><?php echo $key . " - " . $value; ?></th>
                                            <?php if ($a === $b) {
                                                echo "</tr>";
                                            } ?>

                                        <?php endforeach; ?>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fim table -->

            <!-- início table -->
            <div class="card mb-4">
                <div class="card-header"><strong>Jogo</strong><span class="small ms-1">Lista a média dos números saídos</span></div>
                <div class="card-body">
                    <p class="text-body-secondary small">Lista as médias de saída e intervalo de cada números saídos de todos os jogos até hoje</p>
                    <div class="example">
                        <ul class="nav nav-underline-border" role="tablist">
                            <?php foreach ($mediaSaidaPorNumero as $key => $value): ?>
                                <li class="nav-item"><a class="nav-link <?php echo $key == "Saida" ? "active" : ""; ?>" data-coreui-toggle="tab" href="#<?php echo $key; ?>" role="tab">
                                        <svg class="icon me-2">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                        </svg>Média dos números de <?php echo $key; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="tab-content rounded-bottom">
                            <?php $a = 0;
                            $b = 0; ?>
                            <?php foreach ($mediaSaidaPorNumero as $key => $array): ?>
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="<?php echo $key; ?>">
                                    <table class="table">
                                        <thead>
                                            <?php foreach ($array as $key => $value): ?>
                                                <?php $a = $a + 1; ?>
                                                <?php if ($a > $b) {
                                                    echo '<tr>';
                                                    $b = $b + 5;
                                                } ?>
                                                <th scope="col" style="text-align: center" class="table-primary"><?php echo $key; ?></th>
                                                <th scope="col" style="text-align: center" class="table-secondary"><?php echo $value; ?></th>
                                                <?php if ($a == $b) {
                                                    echo "</tr>";
                                                } ?>
                                            <?php endforeach; ?>
                                        </thead>
                                    </table>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fim table -->

            <!-- início table -->
            <div class="card mb-4">
                <div class="card-header"><strong>Jogo</strong><span class="small ms-1">Posições e a quantidade saída por elas</span></div>
                <div class="card-body">
                    <p class="text-body-secondary small">Ex: primeiro número, o número um saí 2.000, o número dois saí 1.000. Na segunda posição, o numero dois saí 2.000, o número três saí 1.000...</p>
                    <?php foreach ($arrayPosicaoJogo as $key => $array): ?>
                        <div class="example">
                            <ul class="nav nav-underline-border" role="tablist">
                                <li class="nav-item"><a class="nav-link" data-coreui-toggle="tab" href="#saida" role="tab">
                                        <svg class="icon me-2">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                        </svg><?php echo str_replace("_", " ", $key); ?></a></li>
                            </ul>
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="saida">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <?php foreach ($array as $key => $values): ?>
                                                    <th scope="col" style="text-align: center" class="table-primary"><?php echo $key; ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach ($array as $key => $values): ?>
                                                    <td style="text-align: center" class="table-success"><?php echo $values; ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- fim table -->

            <div class="card mb-4">
                <div class="card-header"><strong>Jogo</strong><span class="small ms-1">Quinze números</span></div>
                <div class="card-body">
                    <p class="text-body-secondary small"><a href="#">#</a>Quinze números mais saídos</p>
                    <div class="example">
                        <ul class="nav nav-underline-border" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active" data-coreui-toggle="tab" href="#preview-1011" role="tab" aria-selected="true">
                                    <svg class="icon me-2">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                    </svg>Números</a></li>
                        </ul>
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1011">
                                <table class="table table-bordered border-primary">
                                    <thead>
                                        <tr>
                                            <?php foreach ($quinzeNumerosMaisSaidosPorPosicao as $key => $value): ?>
                                                <th scope="col"><?php echo $key; ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php foreach ($quinzeNumerosMaisSaidosPorPosicao as $key => $value): ?>
                                                <td scope="col"><?php echo $value; ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>