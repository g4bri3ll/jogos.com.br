<?php

namespace App\Classes;

class GerarHtmlJogo
{

	public function geraJogoHtml($jogos)
	{
		$html = "
            Jogos de escolha
            <table border='1'>
                <thead>
                    <tr>
                        <th>Col 1</th>
                        <th>Col 2</th>
                        <th>Col 3</th>
                        <th>Col 4</th>
                        <th>Col 5</th>
                        <th>Col 6</th>
                        <th>Col 7</th>
                        <th>Col 8</th>
                        <th>Col 9</th>
                        <th>Col 10</th>
                        <th>Col 11</th>
                        <th>Col 12</th>
                        <th>Col 13</th>
                        <th>Col 14</th>
                        <th>Col 15</th>
                    </tr>
                </thead>
                <tbody>
                ";
                foreach($jogos as $j)
                {
                	$html .="<tr>";
                	$html .="<td>$j->num_um</td>";
                	$html .="<td>$j->num_dois</td>";
                	$html .="<td>$j->num_tres</td>";
                	$html .="<td>$j->num_quatro</td>";
                	$html .="<td>$j->num_cinco</td>";
                	$html .="<td>$j->num_seis</td>";
                	$html .="<td>$j->num_sete</td>";
                	$html .="<td>$j->num_oito</td>";
                	$html .="<td>$j->num_nove</td>";
                	$html .="<td>$j->num_dez</td>";
                	$html .="<td>$j->num_onze</td>";
                	$html .="<td>$j->num_doze</td>";
                	$html .="<td>$j->num_treze</td>";
                	$html .="<td>$j->num_quartoze</td>";
                	$html .="<td>$j->num_quinze</td>";
                    $html .="</tr>";
                }
                $html .="</tbody></table>";

		return $html;
	}

}

?>