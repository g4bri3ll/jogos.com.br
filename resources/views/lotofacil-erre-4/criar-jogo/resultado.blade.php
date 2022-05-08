@extends('layout')
@section('template')

<div class="container-fluid">
	<div class="row-fluid">
		<h2>Criar jogo</h2>

		<p>Com base nos números excluídos na etapa anterior, o sistema gerou as apostas abaixo.</p>
		
		@if(!empty($false))
		<div class="alert alert-error">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
			<h4 class="alert-heading">Error!</h4>
				{{ $false }}
		</div>
		@endif
		@if(!empty($true))
		<div class="alert alert-success">
			<a class="close" data-dismiss="alert" href="#">&times;</a>
			<h4 class="alert-heading">Sucesso!</h4>
				{{$true}}
		</div>
		@endif

		<div class="block">
			<div class="block-content collapse in">
				<div class="span3" align="center">
				</div>
				<div class="span6" align="center">
					<div class="block-content collapse in">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Acerto</th>
                                    <th>Quantidade</th>
                                    <th>Prêmio (R$)</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@for($i = 0; $i < 6; $i++)
                                <tr>
                                    <td>{{$arrayValoresJogos['acertos'][$i]}}</td>
                                    <td>{{$arrayValoresJogos['quantidade'][$i]}}</td>
                                    <td>{{number_format($arrayValoresJogos['premio'][$i],2,",",".")}}</td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
				</div>
				<div class="span3" align="center">
				</div>
			</div>
		</div>

		<div class="">
			<div class="block-content collapse in">
				<div class="span6" align="center">
					<a href="{{ url('salvaJogoUsers', $codigo) }}" class="btn btn-large btn-block btn-primary">Salvar este jogo!
					</a>
				</div>
				<div class="span6" align="center">
					<a href="{{ url('pdfQuatro', $codigo) }}" class="btn btn-large btn-block btn-success">Exportar jogo para PDF!</a>
				</div>
			</div>
		</div>
		<br />
        <?php $i = 1; $cor = "#F0E68C"; ?>
    	@foreach($arrayJogos as $numeros)
    	@if($i == 1 || $i == 5 || $i == 9 || $i == 13)
		<div class="block">
			<div class="block-content collapse in">
				@endif
        		<div class="span3" align="center">
        			<b color="black" style="color: black;"> Aposta {{$i}} </b>
        			<br />
					<table class="table" border="2">
		            	<tbody>
		                	<tr>
		                		@if($numeros->num_um == '1' || $numeros->num_dois == '1' || $numeros->num_tres == '1' || $numeros->num_quatro == '1' || $numeros->num_cinco == '1' || $numeros->num_seis == '1' || $numeros->num_sete == '1' || $numeros->num_oito == '1' || $numeros->num_nove == '1' || $numeros->num_dez == '1' || $numeros->num_onze == '1' || $numeros->num_doze == '1' || $numeros->num_treze == '1' || $numeros->num_quartoze == '1' || $numeros->num_quinze == '1')
		                  			<td style="background-color: {{$cor}};">1</td>
		                  		@else
		                  			<td>1</td>
		                  		@endif
		                  		@if($numeros->num_um == '2' || $numeros->num_dois == '2' || $numeros->num_tres == '2' || $numeros->num_quatro == '2' || $numeros->num_cinco == '2' || $numeros->num_seis == '2' || $numeros->num_sete == '2' || $numeros->num_oito == '2' || $numeros->num_nove == '2' || $numeros->num_dez == '2' || $numeros->num_onze == '2' || $numeros->num_doze == '2' || $numeros->num_treze == '2' || $numeros->num_quartoze == '2' || $numeros->num_quinze == '2')
		                  			<td style="background-color: {{$cor}};">2</td>
		                  		@else
		                  			<td>2</td>
		                  		@endif
		                  		@if($numeros->num_um == '3' || $numeros->num_dois == '3' || $numeros->num_tres == '3' || $numeros->num_quatro == '3' || $numeros->num_cinco == '3' || $numeros->num_seis == '3' || $numeros->num_sete == '3' || $numeros->num_oito == '3' || $numeros->num_nove == '3' || $numeros->num_dez == '3' || $numeros->num_onze == '3' || $numeros->num_doze == '3' || $numeros->num_treze == '3' || $numeros->num_quartoze == '3' || $numeros->num_quinze == '3')
		                  			<td style="background-color: {{$cor}};">3</td>
		                  		@else
		                  			<td>3</td>
		                  		@endif
		                  		@if($numeros->num_um == '4' || $numeros->num_dois == '4' || $numeros->num_tres == '4' || $numeros->num_quatro == '4' || $numeros->num_cinco == '4' || $numeros->num_seis == '4' || $numeros->num_sete == '4' || $numeros->num_oito == '4' || $numeros->num_nove == '4' || $numeros->num_dez == '4' || $numeros->num_onze == '4' || $numeros->num_doze == '4' || $numeros->num_treze == '4' || $numeros->num_quartoze == '4' || $numeros->num_quinze == '4')
		                  			<td style="background-color: {{$cor}};">4</td>
		                  		@else
		                  			<td>4</td>
		                  		@endif
		                  		@if($numeros->num_um == '5' || $numeros->num_dois == '5' || $numeros->num_tres == '5' || $numeros->num_quatro == '5' || $numeros->num_cinco == '5' || $numeros->num_seis == '5' || $numeros->num_sete == '5' || $numeros->num_oito == '5' || $numeros->num_nove == '5' || $numeros->num_dez == '5' || $numeros->num_onze == '5' || $numeros->num_doze == '5' || $numeros->num_treze == '5' || $numeros->num_quartoze == '5' || $numeros->num_quinze == '5')
		                  			<td style="background-color: {{$cor}};">5</td>
		                  		@else
		                  			<td>5</td>
		                  		@endif
		                	</tr>
		                	<tr>
		                  		@if($numeros->num_um == '6' || $numeros->num_dois == '6' || $numeros->num_tres == '6' || $numeros->num_quatro == '6' || $numeros->num_cinco == '6' || $numeros->num_seis == '6' || $numeros->num_sete == '6' || $numeros->num_oito == '6' || $numeros->num_nove == '6' || $numeros->num_dez == '6' || $numeros->num_onze == '6' || $numeros->num_doze == '6' || $numeros->num_treze == '6' || $numeros->num_quartoze == '6' || $numeros->num_quinze == '6')
		                  			<td style="background-color: {{$cor}};">6</td>
		                  		@else
		                  			<td>6</td>
		                  		@endif
		                  		@if($numeros->num_um == '7' || $numeros->num_dois == '7' || $numeros->num_tres == '7' || $numeros->num_quatro == '7' || $numeros->num_cinco == '7' || $numeros->num_seis == '7' || $numeros->num_sete == '7' || $numeros->num_oito == '7' || $numeros->num_nove == '7' || $numeros->num_dez == '7' || $numeros->num_onze == '7' || $numeros->num_doze == '7' || $numeros->num_treze == '7' || $numeros->num_quartoze == '7' || $numeros->num_quinze == '7')
		                  			<td style="background-color: {{$cor}};">7</td>
		                  		@else
		                  			<td>7</td>
		                  		@endif
		                  		@if($numeros->num_um == '8' || $numeros->num_dois == '8' || $numeros->num_tres == '8' || $numeros->num_quatro == '8' || $numeros->num_cinco == '8' || $numeros->num_seis == '8' || $numeros->num_sete == '8' || $numeros->num_oito == '8' || $numeros->num_nove == '8' || $numeros->num_dez == '8' || $numeros->num_onze == '8' || $numeros->num_doze == '8' || $numeros->num_treze == '8' || $numeros->num_quartoze == '8' || $numeros->num_quinze == '8')
		                  			<td style="background-color: {{$cor}};">8</td>
		                  		@else
		                  			<td>8</td>
		                  		@endif
		                  		@if($numeros->num_um == '9' || $numeros->num_dois == '9' || $numeros->num_tres == '9' || $numeros->num_quatro == '9' || $numeros->num_cinco == '9' || $numeros->num_seis == '9' || $numeros->num_sete == '9' || $numeros->num_oito == '9' || $numeros->num_nove == '9' || $numeros->num_dez == '9' || $numeros->num_onze == '9' || $numeros->num_doze == '9' || $numeros->num_treze == '9' || $numeros->num_quartoze == '9' || $numeros->num_quinze == '9')
		                  			<td style="background-color: {{$cor}};">9</td>
		                  		@else
		                  			<td>9</td>
		                  		@endif
		                  		@if($numeros->num_um == '10' || $numeros->num_dois == '10' || $numeros->num_tres == '10' || $numeros->num_quatro == '10' || $numeros->num_cinco == '10' || $numeros->num_seis == '10' || $numeros->num_sete == '10' || $numeros->num_oito == '10' || $numeros->num_nove == '10' || $numeros->num_dez == '10' || $numeros->num_onze == '10' || $numeros->num_doze == '10' || $numeros->num_treze == '10' || $numeros->num_quartoze == '10' || $numeros->num_quinze == '10')
		                  			<td style="background-color: {{$cor}};">10</td>
		                  		@else
		                  			<td>10</td>
		                  		@endif
		                	</tr>
		                	<tr>
		                  		@if($numeros->num_um == '11' || $numeros->num_dois == '11' || $numeros->num_tres == '11' || $numeros->num_quatro == '11' || $numeros->num_cinco == '11' || $numeros->num_seis == '11' || $numeros->num_sete == '11' || $numeros->num_oito == '11' || $numeros->num_nove == '11' || $numeros->num_dez == '11' || $numeros->num_onze == '11' || $numeros->num_doze == '11' || $numeros->num_treze == '11' || $numeros->num_quartoze == '11' || $numeros->num_quinze == '11')
		                  			<td style="background-color: {{$cor}};">11</td>
		                  		@else
		                  			<td>11</td>
		                  		@endif
		                  		@if($numeros->num_um == '12' || $numeros->num_dois == '2' || $numeros->num_tres == '12' || $numeros->num_quatro == '12' || $numeros->num_cinco == '12' || $numeros->num_seis == '12' || $numeros->num_sete == '12' || $numeros->num_oito == '12' || $numeros->num_nove == '12' || $numeros->num_dez == '12' || $numeros->num_onze == '12' || $numeros->num_doze == '12' || $numeros->num_treze == '12' || $numeros->num_quartoze == '12' || $numeros->num_quinze == '12')
		                  			<td style="background-color: {{$cor}};">12</td>
		                  		@else
		                  			<td>12</td>
		                  		@endif
		                  		@if($numeros->num_um == '13' || $numeros->num_dois == '3' || $numeros->num_tres == '13' || $numeros->num_quatro == '13' || $numeros->num_cinco == '13' || $numeros->num_seis == '13' || $numeros->num_sete == '13' || $numeros->num_oito == '13' || $numeros->num_nove == '13' || $numeros->num_dez == '13' || $numeros->num_onze == '13' || $numeros->num_doze == '13' || $numeros->num_treze == '13' || $numeros->num_quartoze == '13' || $numeros->num_quinze == '13')
		                  			<td style="background-color: {{$cor}};">13</td>
		                  		@else
		                  			<td>13</td>
		                  		@endif
		                  		@if($numeros->num_um == '14' || $numeros->num_dois == '14' || $numeros->num_tres == '14' || $numeros->num_quatro == '14' || $numeros->num_cinco == '14' || $numeros->num_seis == '14' || $numeros->num_sete == '14' || $numeros->num_oito == '14' || $numeros->num_nove == '14' || $numeros->num_dez == '14' || $numeros->num_onze == '14' || $numeros->num_doze == '14' || $numeros->num_treze == '14' || $numeros->num_quartoze == '14' || $numeros->num_quinze == '14')
		                  			<td style="background-color: {{$cor}};">14</td>
		                  		@else
		                  			<td>14</td>
		                  		@endif
		                  		@if($numeros->num_um == '15' || $numeros->num_dois == '15' || $numeros->num_tres == '15' || $numeros->num_quatro == '15' || $numeros->num_cinco == '15' || $numeros->num_seis == '15' || $numeros->num_sete == '15' || $numeros->num_oito == '15' || $numeros->num_nove == '15' || $numeros->num_dez == '15' || $numeros->num_onze == '15' || $numeros->num_doze == '15' || $numeros->num_treze == '15' || $numeros->num_quartoze == '15' || $numeros->num_quinze == '15')
		                  			<td style="background-color: {{$cor}};">15</td>
		                  		@else
		                  			<td>15</td>
		                  		@endif
		                	</tr>
		                	<tr>
		                  		@if($numeros->num_um == '16' || $numeros->num_dois == '16' || $numeros->num_tres == '16' || $numeros->num_quatro == '16' || $numeros->num_cinco == '16' || $numeros->num_seis == '16' || $numeros->num_sete == '16' || $numeros->num_oito == '16' || $numeros->num_nove == '16' || $numeros->num_dez == '16' || $numeros->num_onze == '16' || $numeros->num_doze == '16' || $numeros->num_treze == '16' || $numeros->num_quartoze == '16' || $numeros->num_quinze == '16')
		                  			<td style="background-color: {{$cor}};">16</td>
		                  		@else
		                  			<td>16</td>
		                  		@endif
		                  		@if($numeros->num_um == '17' || $numeros->num_dois == '17' || $numeros->num_tres == '17' || $numeros->num_quatro == '17' || $numeros->num_cinco == '17' || $numeros->num_seis == '17' || $numeros->num_sete == '17' || $numeros->num_oito == '17' || $numeros->num_nove == '17' || $numeros->num_dez == '17' || $numeros->num_onze == '17' || $numeros->num_doze == '17' || $numeros->num_treze == '17' || $numeros->num_quartoze == '17' || $numeros->num_quinze == '17')
		                  			<td style="background-color: {{$cor}};">17</td>
		                  		@else
		                  			<td>17</td>
		                  		@endif
		                  		@if($numeros->num_um == '18' || $numeros->num_dois == '18' || $numeros->num_tres == '18' || $numeros->num_quatro == '18' || $numeros->num_cinco == '18' || $numeros->num_seis == '18' || $numeros->num_sete == '18' || $numeros->num_oito == '18' || $numeros->num_nove == '18' || $numeros->num_dez == '18' || $numeros->num_onze == '18' || $numeros->num_doze == '18' || $numeros->num_treze == '18' || $numeros->num_quartoze == '18' || $numeros->num_quinze == '18')
		                  			<td style="background-color: {{$cor}};">18</td>
		                  		@else
		                  			<td>18</td>
		                  		@endif
		                  		@if($numeros->num_um == '19' || $numeros->num_dois == '19' || $numeros->num_tres == '19' || $numeros->num_quatro == '19' || $numeros->num_cinco == '19' || $numeros->num_seis == '19' || $numeros->num_sete == '19' || $numeros->num_oito == '19' || $numeros->num_nove == '19' || $numeros->num_dez == '19' || $numeros->num_onze == '19' || $numeros->num_doze == '19' || $numeros->num_treze == '19' || $numeros->num_quartoze == '19' || $numeros->num_quinze == '19')
		                  			<td style="background-color: {{$cor}};">19</td>
		                  		@else
		                  			<td>19</td>
		                  		@endif
		                  		@if($numeros->num_um == '20' || $numeros->num_dois == '20' || $numeros->num_tres == '20' || $numeros->num_quatro == '20' || $numeros->num_cinco == '20' || $numeros->num_seis == '20' || $numeros->num_sete == '20' || $numeros->num_oito == '20' || $numeros->num_nove == '20' || $numeros->num_dez == '20' || $numeros->num_onze == '20' || $numeros->num_doze == '20' || $numeros->num_treze == '20' || $numeros->num_quartoze == '20' || $numeros->num_quinze == '20')
		                  			<td style="background-color: {{$cor}};">20</td>
		                  		@else
		                  			<td>20</td>
		                  		@endif
		                	</tr>
		                	<tr>
		                  		@if($numeros->num_um == '21' || $numeros->num_dois == '21' || $numeros->num_tres == '21' || $numeros->num_quatro == '21' || $numeros->num_cinco == '21' || $numeros->num_seis == '21' || $numeros->num_sete == '21' || $numeros->num_oito == '21' || $numeros->num_nove == '21' || $numeros->num_dez == '21' || $numeros->num_onze == '21' || $numeros->num_doze == '21' || $numeros->num_treze == '21' || $numeros->num_quartoze == '21' || $numeros->num_quinze == '21')
		                  			<td style="background-color: {{$cor}};">21</td>
		                  		@else
		                  			<td>21</td>
		                  		@endif
		                  		@if($numeros->num_um == '22' || $numeros->num_dois == '22' || $numeros->num_tres == '22' || $numeros->num_quatro == '22' || $numeros->num_cinco == '22' || $numeros->num_seis == '22' || $numeros->num_sete == '22' || $numeros->num_oito == '22' || $numeros->num_nove == '22' || $numeros->num_dez == '22' || $numeros->num_onze == '22' || $numeros->num_doze == '22' || $numeros->num_treze == '22' || $numeros->num_quartoze == '22' || $numeros->num_quinze == '22')
		                  			<td style="background-color: {{$cor}};">22</td>
		                  		@else
		                  			<td>22</td>
		                  		@endif
		                  		@if($numeros->num_um == '23' || $numeros->num_dois == '23' || $numeros->num_tres == '23' || $numeros->num_quatro == '23' || $numeros->num_cinco == '23' || $numeros->num_seis == '23' || $numeros->num_sete == '23' || $numeros->num_oito == '23' || $numeros->num_nove == '23' || $numeros->num_dez == '23' || $numeros->num_onze == '23' || $numeros->num_doze == '23' || $numeros->num_treze == '23' || $numeros->num_quartoze == '23' || $numeros->num_quinze == '23')
		                  			<td style="background-color: {{$cor}};">23</td>
		                  		@else
		                  			<td>23</td>
		                  		@endif
		                  		@if($numeros->num_um == '24' || $numeros->num_dois == '24' || $numeros->num_tres == '24' || $numeros->num_quatro == '24' || $numeros->num_cinco == '24' || $numeros->num_seis == '24' || $numeros->num_sete == '24' || $numeros->num_oito == '24' || $numeros->num_nove == '24' || $numeros->num_dez == '24' || $numeros->num_onze == '24' || $numeros->num_doze == '24' || $numeros->num_treze == '24' || $numeros->num_quartoze == '24' || $numeros->num_quinze == '24')
		                  			<td style="background-color: {{$cor}};">24</td>
		                  		@else
		                  			<td>24</td>
		                  		@endif
		                  		@if($numeros->num_um == '25' || $numeros->num_dois == '25' || $numeros->num_tres == '25' || $numeros->num_quatro == '25' || $numeros->num_cinco == '25' || $numeros->num_seis == '25' || $numeros->num_sete == '25' || $numeros->num_oito == '25' || $numeros->num_nove == '25' || $numeros->num_dez == '25' || $numeros->num_onze == '25' || $numeros->num_doze == '25' || $numeros->num_treze == '25' || $numeros->num_quartoze == '25' || $numeros->num_quinze == '25')
		                  			<td style="background-color: {{$cor}};">25</td>
		                  		@else
		                  			<td>25</td>
		                  		@endif
		                	</tr>
		            	</tbody>
		            </table>
		            <?php $i = $i + 1; ?>
		    	</div>
		    	@if($i == 5 || $i == 9 || $i == 13)
            </div>
        </div>
        @endif
        <!-- /block -->
	    @endforeach

	</div>
</div>

@endsection
