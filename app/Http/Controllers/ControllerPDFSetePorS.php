<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Classes\GerarHtmlJogo;
use App\Classes\Jogo_sete;

class ControllerPDFSetePorS extends Controller
{
    public function geraPDF($codigo)
    {
        
        $jogo = new Jogo_sete();
        $jogos = $jogo->retornaJogoPorCodigo($codigo);

        $gera = new GerarHtmlJogo();
        $html = $gera->geraJogoHtml($jogos);
    	
    	// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->load_html($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream("jogos.pdf");

    }
}
