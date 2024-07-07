<?php

namespace app;

use config\ConfiguracaoInterface;

abstract class Configuracao implements ConfiguracaoInterface
{
    const QTD_NUMERO_PERMITIDO = 15;
    const QTD_NUMERO_LOTOFACIL = 25;
}
