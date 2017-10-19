
<?

	
// 	if($accion == "actualizar")
// 	{
// 		$id = $radio->id;
// 		$patrimonial = $radio->patrimonial;
// 		$numero = $radio->numero;
// 		$tipo = $radio->tipo;
// 		$modelo = $radio->modelo;
// 		$serie = $radio->serie;
// 		$id_interno = $radio->id_interno;
// 		$canales = explode("+",$radio->canales);
// 		$oficio = $radio->oficio;
// 		$observaciones = $radio->observaciones;
// 		$resguardante = $radio->usuario;
		
// 		$disabled = "disabled";

// 	}

?>


<div class="site-content">
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Actualizar Armamento</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="#">Armamento</a></li>
				<li class="breadcrumb-item"><a href="#">Actualizar</a></li>
			</ol>
			
			<div class="box box-block bg-white">
				
					<div class="row">
					<div class="col-sm-4 col-xs-12">
					<div class="card">
					<div class="card-header">
									<b>Información del Armamento</b>
					</div>
					<div class="profile-avatar">
						<img class="img-fluid" src="<?=base_url()?>src/fotos/<?=$actual->id?>/1.JPG" alt="">
					</div>
						
									<div class="card-block">
								<b>Patrimonial: </b><?=$actual->patrimonial?>
								<hr>
								<b>Matricula: </b>
								<?=$actual->matricula?>
								<HR>
								<b>Categoria de Armamento: </b>
								<?=$actual->cat?>
								<hr>
								<b>Tipo de Armamento: </b>
								<?=$actual->clasificacion?>
								<hr>
								<b>Descripción: </b>
								<?=$actual->descripcion?>
								<hr>
								<b>Departamento Actual:</b>
								 <?=$actual->dep?>
									</div>
								</div>
							</div>
								<div class="col-sm-1 col-xs-12">
								</div>
							<div class="col-sm-6 col-xs-12">
							<h5>Actualizar datos:</h5>
							<form action="<?php echo base_url();?>index.php?/armamento/actualizar" method="POST" enctype="multipart/form-data" >
								<input type="hidden" name="id" value="<?=$id?>">
								<div class="form form-group">
								<label for="Resguaradante Nuevo">No. de Empleado del Nuevo Resguardante (Debe estar Registrado)</label>
								<input class="form-control" type="text" id="resguardante" name="resguardante" placeholder="22910" value="<?=$actual->resg?>">
								</div>
								<div id="datos_resguardante"></div>

								<div class="form form-group">
								<label for="departamento">Asignar Nuevo Departamento</label>
								<select name="departamento" id="departamento" class="form-control" data-plugin="select2">
									<option value="<?=$actual->departamento?>"><?=$actual->dep?></option>
									<?
									foreach ($departamentos as $departamento) {
									?>
										<option class="form-control" value="<?=$departamento->id?>"><?=$departamento->nombre?></option>
										?>
									<?	
									}
									?>
								</select>
								</div>
								<div class="form form-group">
									<label for="oficio">Numero de Oficio</label>
									<input class="form-control" type="text" name="oficio" placeholder="No. de Oficio">

								</div>

								<div class="form form form-group">
								<label for="Situacion">Situación del Armamento</label>
								<select name="situacion" class="form-control" >
									<option value="<?=$actual->idSituacion?>"><?=$actual->situacion?></option>
									<?
									foreach ($situacion as $situ) {
									?>
										<option class="form-control" value="<?=$situ->id?>"><?=$situ->descripcion?></option>
										?>
									<?	
									}
									?>
								</select>
								</div>
								<div class="form form-group">
								<label for="estatus">Estado del Armamento</label>
								<select name="estado" class="form-control" data-plugin="select2">
									<option value="<?=$actual->idEstado?>"><?=$actual->estado?></option>
									<?
									foreach ($estado as $estados) {
									?>
										<option class="form-control" value="<?=$estados->id?>"><?=$estados->estado?></option>
										?>
									<?	
									}
									?>
								</select>
								</div>
								<div class="form-group">
								<label><b>Fotografia del arma </b></label><br>
								<input id="imagen" name="imagen" id="inputIncludeFile" type="file" placeholder="Inlcude some file">
								</div>
						<div class="form-group">
							<label for="observaciones"><b>Observaciones </b></label>
							<textarea name="observaciones" class="form-control"></textarea>
						</div>

						<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>

							</form>
					
							</div>
			
			
			
			

		</div>
	</div>
</div>


<script>

		
$('#resguardante').change(function () {
	
    var datos = 
				{ 
					 'id' : jQuery("#resguardante").val()
				}
	
	jQuery.ajax({
		url: "<?=base_url()?>index.php?/Usuarios/obt_usuario",
		type:"post",
		dataType: "html",
		async: true,
		data: datos,
		success: function(resultado)
		{

			$("#datos_resguardante").html(resultado);
	
		}
		
		
	});		
	seleccionar();
});


function seleccionar(){
	
	var datos = 
				{ 
					 'id' : $("#resguardante").val()
				}
	
	jQuery.ajax({
		url: "<?=base_url()?>index.php?/Usuarios/obt_departamento_usuario",
		type:"post",
		dataType: "html",
		async: true,
		data: datos,
		success: function(resultado)
		{
		

			$('#departamento').val(resultado).trigger('change');
	
		}
	});
}

function validarImagen() {
    var fileSize = $('#imagen')[0].files[0].size;
    var siezekiloByte = parseInt(fileSize / 1024);
    if (siezekiloByte >  $('#imagen').attr('size')) {
        alert("Imagen muy grande");
        return false;
    }
	else{
		alert("Imagen chida");
	}
}
</script>