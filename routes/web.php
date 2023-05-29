<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', 'ControllerUsers');

Route::get('logar', 'ControllerLogin@index')->name('logar');
Route::post('logando', 'ControllerLogin@login');
Route::get('logout', 'ControllerLogin@logout');

Route::get('encRecuperaSenha', 'ControllerUsers@encEmail');
Route::post('recuperaSenha', 'ControllerUsers@recuperaSenhaPorEmail');

Route::post('cadastra', 'ControllerUsers@cadastrar');

Route::get('retornaCadastro', 'ControllerUsers@fazCadastro');


//
Route::group(['middleware' => 'auth'], function () {
	Route::auth();
	Route::get('pagina_inicial', 'ControllerIndex@index')->name('pagina_inicial');

	Route::resource('tres', 'ControllerJogoTresPorTres');

	//Route::resource('excel', 'ControllerExcel');
	//Route::GET('excelIndex/{codigo?}', 'ControllerExcelQuatroPorQ@index');

	Route::get('pdfCentral/{codigo}', 'ControllerResourceJogosSalvos@geraPDF');

	Route::get('pdfQuatro/{codigo}', 'ControllerPDFQuatroPorQ@geraPDF');

	Route::get('pdfTres/{codigo}', 'ControllerPDFTresPorT@geraPDF');

	Route::get('pdfCinco/{codigo}', 'ControllerPDFCincoPorC@geraPDF');

	Route::get('pdfSete/{codigo}', 'ControllerPDFSetePorS@geraPDF');

	Route::get('quatro/{error?}', 'ControllerJogoQuatroPorQ@index')->name('quatro');

	Route::get('cinco/{error?}', 'ControllerJogoCincoPorCinco@index')->name('cinco');

	Route::get('sete/{error?}', 'ControllerJogoSetePorSete@index')->name('sete');

	Route::get('encAlteraSenha', 'ControllerUsers@encAlteraSenha');
	Route::post('alteraSenha', 'ControllerUsers@alteraSenha');

	Route::get('rastreador/{qtd?}', 'ControllerJogoRastreador@index');

	Route::get('ajudar', 'ControllerAjudar@index');

	Route::get('atualizaBD/{numeroConcurso}', 'ControllerAPILoteria@atualizaBD')->name('atualizaBD');
	Route::get('verificaAPI', 'ControllerAPILoteria@verificaAtualizacao')->name('verificaAPI');

	//Salvar os jogos na base de dados
	Route::any('salvaPar/{par?}/{impar?}/{codigo?}', 'ControllerResourceTresPorTres@salvaJogosPar')->name('salvaPar');

	Route::get('listaJogosPorTres/{codigo}/{true?}', 'ControllerResourceTresPorTres@index')->name('listaJogosPorTres');

	Route::post('salvaJogoQuatro', 'ControllerResourceQuatroPorQ@salvaJogos');
	Route::get('listaJogoQuatro/{codigo?}', 'ControllerResourceQuatroPorQ@listaJogosQuatro')->name('listaJogoQuatro');
	Route::get('listJogosQuatro/{codigo}/{true?}', 'ControllerResourceQuatroPorQ@listaJogosQ')->name('listJogosQuatro');

	Route::post('salvaJogoCinco', 'ControllerResourceCincoPorC@salvaNumerosCinco');
	Route::get('svJogoCinco/{codigo}', 'ControllerResourceCincoPorC@salvaJogoCinco')->name('svJogoCinco');
	Route::get('listaJogosC/{codigo}/{true?}', 'ControllerResourceCincoPorC@listaJogos')->name('listaJogosC');

	Route::get('salvaJogoUsers/{codigo}', 'ControllerResourceJogosSalvos@salvaJogoUsers');

	Route::any('listaPorConcurso', 'ControllerResourceJogosSalvos@listaPorConcurso')->name('listaPorConcurso');

	Route::post('salvaJogoSete', 'ControllerResourceSetePorS@salvaJogos');
	Route::get('gravaJogoSete/{codigo}', 'ControllerResourceSetePorS@gravaJgSete')->name('gravaJogoSete');
	Route::get('listaJogosSete/{codigo}/{true?}', 'ControllerResourceSetePorS@listaJogos')->name('listaJogosSete');

	Route::get('listaJogosSalvos', 'ControllerResourceJogosSalvos@index');

	Route::resource('jogos', 'ControllerJogosSalvos');

	Route::get('excluirJogoSalvo/{codigo?}', 'ControllerResourceJogosSalvos@excluirJogo');
	Route::get('listaJogoSalvo/{codigo?}', 'ControllerResourceJogosSalvos@listaJogoSalvo');

	Route::resource('lotofacil', 'ControllerLotofacil');

});

