@extends('layouts.default')

<!--Agrego para el datatable-->
    {{ HTML::style('/css/bootstrap.min.css') }}
    {{ HTML::style('/css/dataTables.bootstrap.css') }}

@section('content')

<h1></h1>

<div class="panel panel-primary">

	<div class="panel-heading">

		<h2 class="panel-title">FOLIOS URBANOS AUTORIZADOS PARA</h2>

	</div>

	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				<label>COREVAT</label>
				<h5>{{$perito->corevat}}</h5>
			</div>
			<div class="col-md-3">
				<label>NOMBRE</label>
				<h5>{{$perito->nombre}}</h5>				
			</div>
		</div>
		<hr>
		{{Form::open()}}
		<table class="table datatable" id="urbano-table"> <!-- datatable = para hacer paginacion-->
			<thead>
				<tr>

					<!--<th>{{Form::checkbox('', '', '', ['id'=>'todos'])}}</th>-->
					<th>Marcar Folio Presentado</th>
					<th>Folio Autorizados</th>
					<th>Recibido Por:</th>
					<th>Fecha de Entrega Estatal</th>
					<th>Entregado en el municipio de:</th>
					<th>Fecha de Entrega Municipal</th>
					<th>Estado del Folio</th>
				</tr>
			</thead>
			<tbody>
				@foreach($fu as $u)

					
				<tr>
					<td align="center">
						@if($u->entrega_estatal == 0)
						{{Form::checkbox('urbanos[]', $u->numero_folio, '', ['class'=>'checkbox'])}}
						@endif
					</td>
					<?php
						$input = $u->numero_folio;
						$input = str_pad($input, 4, "0", STR_PAD_LEFT);
					?>
					<td align="center">
						{{$perito->corevat."-".$input.$u->tipo_folio."-15"}}
					</td>
					<td align="center">
					@if($u->entrega_estatal == 1)
						{{--$u->usuario->usuario--}}
						aqui debe de ir el usuario
					@endif
					</td>
					<td align="center">
						@if($u->entrega_estatal == 1)
							{{$u->fecha_entrega_e}}
						@endif
					</td>
					<td align="center">
					@if($u->entrega_municipal == 1)
						 {{$u->municipio->nombre_municipio}}
					@endif
					</td>
					<td align="center">
						@if($u->entrega_municipal == 1)
							{{$u->fecha_entrega_m}}
						@endif
					</td>
				<td align="center">
						@if($u->entrega_estatal == 0)
							Vigente
						@else
							Usado
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{Form::submit('Guardar', ['class'=>'btn btn-success'])}}
		{{Form::close()}}
	</div>

	@stop

	@section('javascript')

	{{ HTML::script('/js/jquery/jquery.dataTables.min.js') }}
	{{ HTML::script('/js/jquery/dataTables.bootstrap.js') }}

	<script type="text/javascript">
	$(document).ready(function(){

		$("#todos").change(function(){

			if($(this).is(':checked')){

				$(".checkbox").prop('checked', 'checked');

			} else {

				$(".checkbox").attr('checked', false);				

			}

		});

		$('#urbano-table').dataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros por pagina",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros","search": "Filter records:",
            "search": "Buscar:",
            "infoFiltered": "(Filtrado en _MAX_ total de registros)",
            "oPaginate": {
		      "sPrevious": "Anterior",
		      "sNext": "Siguiente"
		    }
        }
	    });
	});

	</script>

	@stop