<?php

use Illuminate\Support\Facades\Route;

Route::RESOURCE('/', 'ControllerUsers');

Route::GET('logar', 'ControllerLogin@index')->name('logar');
Route::POST('logando', 'ControllerLogin@login');
Route::GET('logout', 'ControllerLogin@logout');
 
Route::GET('encRecuperaSenha', 'ControllerUsers@encEmail');
Route::POST('recuperaSenha', 'ControllerUsers@recuperaSenhaPorEmail');

Route::POST('cadastra', 'ControllerUsers@cadastrar');

Route::GET('retornaCadastro', 'ControllerUsers@fazCadastro');


//
Route::group(['middleware' => 'auth'], function () {
	Route::auth();
	Route::GET('pagina_inicial', 'ControllerIndex@index')->name('pagina_inicial');
	
	Route::RESOURCE('tres', 'ControllerJogoTresPorTres');

	//Route::resource('excel', 'ControllerExcel');
	//Route::GET('excelIndex/{codigo?}', 'ControllerExcelQuatroPorQ@index');

	Route::GET('pdfCentral/{codigo}', 'ControllerResourceJogosSalvos@geraPDF');

	Route::GET('pdfQuatro/{codigo}', 'ControllerPDFQuatroPorQ@geraPDF');

	Route::GET('pdfTres/{codigo}', 'ControllerPDFTresPorT@geraPDF');

	Route::GET('pdfCinco/{codigo}', 'ControllerPDFCincoPorC@geraPDF');

	Route::GET('pdfSete/{codigo}', 'ControllerPDFSetePorS@geraPDF');

	Route::GET('quatro/{error?}', 'ControllerJogoQuatroPorQ@index')->name('quatro');

	Route::GET('cinco/{error?}', 'ControllerJogoCincoPorCinco@index')->name('cinco');

	Route::GET('sete/{error?}', 'ControllerJogoSetePorSete@index')->name('sete');

	Route::GET('encAlteraSenha', 'ControllerUsers@encAlteraSenha');
	Route::POST('alteraSenha', 'ControllerUsers@alteraSenha');

	Route::GET('rastreador/{qtd?}', 'ControllerJogoRastreador@index');

	Route::GET('ajudar', 'ControllerAjudar@index');

	Route::GET('atualizaBD/{numeroConcurso}', 'ControllerAPILoteria@atualizaBD')->name('atualizaBD');
	Route::GET('verificaAPI', 'ControllerAPILoteria@verificaAtualizacao')->name('verificaAPI');

	//Salvar os jogos na base de dados
	Route::ANY('salvaPar/{par?}/{impar?}/{codigo?}', 'ControllerResourceTresPorTres@salvaJogosPar')->name('salvaPar');

	Route::get('listaJogosPorTres/{codigo}/{true?}', 'ControllerResourceTresPorTres@index')->name('listaJogosPorTres');

	Route::POST('salvaJogoQuatro', 'ControllerResourceQuatroPorQ@salvaJogos');
	Route::GET('listaJogoQuatro/{codigo?}', 'ControllerResourceQuatroPorQ@listaJogosQuatro')->name('listaJogoQuatro');
	Route::GET('listJogosQuatro/{codigo}/{true?}', 'ControllerResourceQuatroPorQ@listaJogosQ')->name('listJogosQuatro');

	Route::POST('salvaJogoCinco', 'ControllerResourceCincoPorC@salvaNumerosCinco');
	Route::GET('svJogoCinco/{codigo}', 'ControllerResourceCincoPorC@salvaJogoCinco')->name('svJogoCinco');
	Route::GET('listaJogosC/{codigo}/{true?}', 'ControllerResourceCincoPorC@listaJogos')->name('listaJogosC');

	Route::GET('salvaJogoUsers/{codigo}', 'ControllerResourceJogosSalvos@salvaJogoUsers');

	Route::ANY('listaPorConcurso', 'ControllerResourceJogosSalvos@listaPorConcurso')->name('listaPorConcurso');

	Route::POST('salvaJogoSete', 'ControllerResourceSetePorS@salvaJogos');
	Route::GET('gravaJogoSete/{codigo}', 'ControllerResourceSetePorS@gravaJgSete')->name('gravaJogoSete');
	Route::GET('listaJogosSete/{codigo}/{true?}', 'ControllerResourceSetePorS@listaJogos')->name('listaJogosSete');

	Route::GET('listaJogosSalvos', 'ControllerResourceJogosSalvos@index');

	Route::RESOURCE('jogos', 'ControllerJogosSalvos');

	Route::GET('excluirJogoSalvo/{codigo?}', 'ControllerResourceJogosSalvos@excluirJogo');
	Route::GET('listaJogoSalvo/{codigo?}', 'ControllerResourceJogosSalvos@listaJogoSalvo');

	Route::RESOURCE('lotofacil', 'ControllerLotofacil');

});

