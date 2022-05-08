@extends('layout')
@section('template')

<div class="container-fluid">
	<div class="row-fluid">
	<!-- block -->
		<h2>Rastreador Tendências Lotofácil</h2>
		<p>Escolha a quantidade de concursos para rastrear as tendências: </p>
		<div class="row-fluid">
            <div class="block-content collapse in">
                <div class="span2">
					<a href="{{ url('rastreador',10)}}" class="btn btn-large btn-block @if(!empty($corDez)) 
						{{$corDez}}
					@endif">10</a> 
                </div>
                <div class="span2">
					<a href="{{ url('rastreador',20)}}" class="btn btn-large btn-block @if(!empty($corVinte)) 
						{{$corVinte}}
					@endif">20</a>
                </div>
                <div class="span2">
					<a href="{{ url('rastreador',30)}}" class="btn btn-large btn-block @if(!empty($corTrinta)) 
						{{$corTrinta}}
					@endif">30</a>
                </div>
                <div class="span2">
					<a href="{{ url('rastreador',40)}}" class="btn btn-large btn-block 
					@if(!empty($corQuarenta)) 
						{{$corQuarenta}}
					@endif">40</a>
                </div>
                <div class="span2">
					<a href="{{ url('rastreador',50)}}" class="btn btn-large btn-block 
					@if(!empty($corCinquenta)) 
						{{$corCinquenta}}
					@endif">50</a>
                </div>
                <div class="span2">
					<a href="{{ url('rastreador',100)}}" class="btn btn-large btn-block 
					@if(!empty($corCem)) 
						{{$corCem}}
					@endif">100</a>
                </div>
            </div>
		</div>
		<div style="margin-top: 5px;">
			<?php $a = 0; $b = 4; ?>
			@for($i = 0; $i < 25; $i++)
				<div style="width: 100%;">
					<div style="width: {{$b}}%; float: left; text-align: center;">

						<div style="background-color: {{ $arrayNum['cores'][$i] }}; height: 25px;">
							{{$a = $a + 1}}
						</div>
						

						<font size="3"> <b>
							{{ $arrayNum['qtd'][$i] }}
						</b> </font>

					</div>	
				</div>
			@endfor
		</div>
		<br /><br />

		<table class="table table-bordered" style="margin-top: 25px;">
			<thead>
				<tr>
					<th>Concurso</th>
					<th style="background-color: #7B68EE;">01</th>
					<th style="background-color: #7B68EE;">02</th>
					<th style="background-color: #7B68EE;">03</th>
					<th style="background-color: #7B68EE;">04</th>
					<th style="background-color: #7B68EE;">05</th>
					<th style="background-color: #7B68EE;">06</th>
					<th style="background-color: #7B68EE;">07</th>
					<th style="background-color: #7B68EE;">08</th>
					<th style="background-color: #7B68EE;">09</th>
					<th style="background-color: #7B68EE;">10</th>
					<th style="background-color: #7B68EE;">11</th>
					<th style="background-color: #7B68EE;">12</th>
					<th style="background-color: #7B68EE;">13</th>
					<th style="background-color: #7B68EE;">14</th>
					<th style="background-color: #7B68EE;">15</th>
					<th style="background-color: #7B68EE;">16</th>
					<th style="background-color: #7B68EE;">17</th>
					<th style="background-color: #7B68EE;">18</th>
					<th style="background-color: #7B68EE;">19</th>
					<th style="background-color: #7B68EE;">20</th>
					<th style="background-color: #7B68EE;">21</th>
					<th style="background-color: #7B68EE;">22</th>
					<th style="background-color: #7B68EE;">23</th>
					<th style="background-color: #7B68EE;">24</th>
					<th style="background-color: #7B68EE;">25</th>
					<th>Repetentes</th>
					<th>Pares</th>
					<th>Ímpares</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; $b = 0; ?>
				@foreach($arrays as $valor)
					
					<?php $valorPar = 0; $valorImpar = 0; ?>
					@if($valor->um_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->dois_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->tres_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->quatro_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->cinco_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->seis_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->sete_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->oito_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->nove_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->dez_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->onze_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->doze_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->treze_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->quartoze_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
					@if($valor->quinze_num  % 2)
						<?php $valorImpar = $valorImpar + 1; ?>
					@else
						<?php $valorPar = $valorPar + 1; ?>
					@endif
				<tr>
					<td style="background-color: #7B68EE;">{{$valor->numero_concurso}}</td>
					@if($valor->um_num == 1)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 2 || $valor->dois_num == 2)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 3 || $valor->dois_num == 3 || $valor->tres_num == 3)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 4 || $valor->dois_num == 4 || $valor->tres_num == 4 || $valor->quatro_num == 4)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 5 || $valor->dois_num == 5 || $valor->tres_num == 5 || $valor->quatro_num == 5 || $valor->cinco_num == 5)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 6 || $valor->dois_num == 6 || $valor->tres_num == 6 || $valor->quatro_num == 6 || $valor->cinco_num == 6 || $valor->seis_num == 6)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 7 || $valor->dois_num == 7 || $valor->tres_num == 7 || $valor->quatro_num == 7 || $valor->cinco_num == 7 || $valor->seis_num == 7 || $valor->sete_num == 7)
						<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 8 || $valor->dois_num == 8 || $valor->tres_num == 8 || $valor->quatro_num == 8 || $valor->cinco_num == 8 || $valor->seis_num == 8 || $valor->sete_num == 8 || $valor->oito_num == 8)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 9 || $valor->dois_num == 9 || $valor->tres_num == 9 || $valor->quatro_num == 9 || $valor->cinco_num == 9 || $valor->seis_num == 9 || $valor->sete_num == 9 || $valor->oito_num == 9 || $valor->nove_num == 9)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 10 || $valor->dois_num == 10 || $valor->tres_num == 10 || $valor->quatro_num == 10 || $valor->cinco_num == 10 || $valor->seis_num == 10 || $valor->sete_num == 10 || $valor->oito_num == 10 || $valor->nove_num == 10 || $valor->dez_num == 10)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 11 || $valor->dois_num == 11 || $valor->tres_num == 11 || $valor->quatro_num == 11 || $valor->cinco_num == 11 || $valor->seis_num == 11 || $valor->sete_num == 11 || $valor->oito_num == 11 || $valor->nove_num == 11 || $valor->dez_num == 11 || $valor->onze_num == 11)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 12 || $valor->dois_num == 12 || $valor->tres_num == 12 || $valor->quatro_num == 12 || $valor->cinco_num == 12 || $valor->seis_num == 12 || $valor->sete_num == 12 || $valor->oito_num == 12 || $valor->nove_num == 12 || $valor->dez_num == 12 || $valor->onze_num == 12 || $valor->doze_num == 12)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 13 || $valor->dois_num == 13 || $valor->tres_num == 13 || $valor->quatro_num == 13 || $valor->cinco_num == 13 || $valor->seis_num == 13 || $valor->sete_num == 13 || $valor->oito_num == 13 || $valor->nove_num == 13 || $valor->dez_num == 13 || $valor->onze_num == 13 || $valor->doze_num == 13 || $valor->treze_num == 13)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 14 || $valor->dois_num == 14 || $valor->tres_num == 14 || $valor->quatro_num == 14 || $valor->cinco_num == 14 || $valor->seis_num == 14 || $valor->sete_num == 14 || $valor->oito_num == 14 || $valor->nove_num == 14 || $valor->dez_num == 14 || $valor->onze_num == 14 || $valor->doze_num == 14 || $valor->treze_num == 14 || $valor->quartoze_num == 14)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 15 || $valor->dois_num == 15 || $valor->tres_num == 15 || $valor->quatro_num == 15 || $valor->cinco_num == 15 || $valor->seis_num == 15 || $valor->sete_num == 15 || $valor->oito_num == 15 || $valor->nove_num == 15 || $valor->dez_num == 15 || $valor->onze_num == 15 || $valor->doze_num == 15 || $valor->treze_num == 15 || $valor->quartoze_num == 15 || $valor->quinze_num == 15)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 16 || $valor->dois_num == 16 || $valor->tres_num == 16 || $valor->quatro_num == 16 || $valor->cinco_num == 16 || $valor->seis_num == 16 || $valor->sete_num == 16 || $valor->oito_num == 16 || $valor->nove_num == 16 || $valor->dez_num == 16 || $valor->onze_num == 16 || $valor->doze_num == 16 || $valor->treze_num == 16 || $valor->quartoze_num == 16 || $valor->quinze_num == 16)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 17 || $valor->dois_num == 17 || $valor->tres_num == 17 || $valor->quatro_num == 17 || $valor->cinco_num == 17 || $valor->seis_num == 17 || $valor->sete_num == 17 || $valor->oito_num == 17 || $valor->nove_num == 17 || $valor->dez_num == 17 || $valor->onze_num == 17 || $valor->doze_num == 17 || $valor->treze_num == 17 || $valor->quartoze_num == 17 || $valor->quinze_num == 17)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 18 || $valor->dois_num == 18 || $valor->tres_num == 18 || $valor->quatro_num == 18 || $valor->cinco_num == 18 || $valor->seis_num == 18 || $valor->sete_num == 18 || $valor->oito_num == 18 || $valor->nove_num == 18 || $valor->dez_num == 18 || $valor->onze_num == 18 || $valor->doze_num == 18 || $valor->treze_num == 18 || $valor->quartoze_num == 18 || $valor->quinze_num == 18)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 19 || $valor->dois_num == 19 || $valor->tres_num == 19 || $valor->quatro_num == 19 || $valor->cinco_num == 19 || $valor->seis_num == 19 || $valor->sete_num == 19 || $valor->oito_num == 19 || $valor->nove_num == 19 || $valor->dez_num == 19 || $valor->onze_num == 19 || $valor->doze_num == 19 || $valor->treze_num == 19 || $valor->quartoze_num == 19 || $valor->quinze_num == 19)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 20 || $valor->dois_num == 20 || $valor->tres_num == 20 || $valor->quatro_num == 20 || $valor->cinco_num == 20 || $valor->seis_num == 20 || $valor->sete_num == 20 || $valor->oito_num == 20 || $valor->nove_num == 20 || $valor->dez_num == 20 || $valor->onze_num == 20 || $valor->doze_num == 20 || $valor->treze_num == 20 || $valor->quartoze_num == 20 || $valor->quinze_num == 20)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 21 || $valor->dois_num == 21 || $valor->tres_num == 21 || $valor->quatro_num == 21 || $valor->cinco_num == 21 || $valor->seis_num == 21 || $valor->sete_num == 21 || $valor->oito_num == 21 || $valor->nove_num == 21 || $valor->dez_num == 21 || $valor->onze_num == 21 || $valor->doze_num == 21 || $valor->treze_num == 21 || $valor->quartoze_num == 21 || $valor->quinze_num == 21)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 22 || $valor->dois_num == 22 || $valor->tres_num == 22 || $valor->quatro_num == 22 || $valor->cinco_num == 22 || $valor->seis_num == 22 || $valor->sete_num == 22 || $valor->oito_num == 22 || $valor->nove_num == 22 || $valor->dez_num == 22 || $valor->onze_num == 22 || $valor->doze_num == 22 || $valor->treze_num == 22 || $valor->quartoze_num == 22 || $valor->quinze_num == 22)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 23 || $valor->dois_num == 23 || $valor->tres_num == 23 || $valor->quatro_num == 23 || $valor->cinco_num == 23 || $valor->seis_num == 23 || $valor->sete_num == 23 || $valor->oito_num == 23 || $valor->nove_num == 23 || $valor->dez_num == 23 || $valor->onze_num == 23 || $valor->doze_num == 23 || $valor->treze_num == 23 || $valor->quartoze_num == 23 || $valor->quinze_num == 23)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 24 || $valor->dois_num == 24 || $valor->tres_num == 24 || $valor->quatro_num == 24 || $valor->cinco_num == 24 || $valor->seis_num == 24 || $valor->sete_num == 24 || $valor->oito_num == 24 || $valor->nove_num == 24 || $valor->dez_num == 24 || $valor->onze_num == 24 || $valor->doze_num == 24 || $valor->treze_num == 24 || $valor->quartoze_num == 24 || $valor->quinze_num == 24)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					@if($valor->um_num == 25 || $valor->dois_num == 25 || $valor->tres_num == 25 || $valor->quatro_num == 25 || $valor->cinco_num == 25 || $valor->seis_num == 25 || $valor->sete_num == 25 || $valor->oito_num == 25 || $valor->nove_num == 25 || $valor->dez_num == 25 || $valor->onze_num == 25 || $valor->doze_num == 25 || $valor->treze_num == 25 || $valor->quartoze_num == 25 || $valor->quinze_num == 25)
					<td style="background-color: #3CB371;">
						X
					@else
					<td>
					@endif
					</td>
					<td>
						@if(count($arrays) > $i)
							@if($i == '0')
								 - 
							@else
								{{$arrayNumRepetidos[$b]['numerosRepetidos']}}	
								<?php $b = $b + 1; ?>
							@endif
						@endif
						<?php $i = $i + 1; ?>
					</td>
					<td>{{$valorPar}}</td>
					<td>{{$valorImpar}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection
