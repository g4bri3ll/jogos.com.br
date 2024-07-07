<?php

namespace Uteis;

class InserirSort
{

    public function insert_sort($result, $item)
    {
        // Variável de controle da posição na lista:
        $index = 0;

        // Percorre a lista:
        foreach ($result as $j => $value)
        {
            // Verifica a condição: (novo item) > (item da lista)?
            if (array_values($item)[0] > array_values($value)[0])
            {
                // Sim, então pare de percorrer a lista
                break;
            }

            // Não, então continue para a próxima posição:
            $index++;
        }

        // O novo item será inserido na posição $index
        // Para isso, precisamos abrir o espaço na lista com a função array_splice:
        array_splice($result, $index, 0, array($item));

        // Retorne a lista ordenada:
        return $result;
    }

}
