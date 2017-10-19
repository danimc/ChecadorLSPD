
<?
$display = '';

	$patrimonial = "";
	$numero = "";
	$tipo = "";
	$modelo = "";
	$serie = "";
	$id_interno = "";
	$canales = "";
	$oficio = "";
	$observaciones = "";
	$resguardante = "";
	
	if($accion == "actualizar")
	{
		$patrimonial = $radio->patrimonial;
		$numero = $radio->numero;
		$tipo = $radio->tipo;
		$modelo = $radio->modelo;
		$serie = $radio->serie;
		$id_interno = $radio->id_interno;
		$canales = $radio->canales;
		$oficio = $radio->oficio;
		$observaciones = $radio->observaciones;
		$resguardante = $radio->usuario;
	}

?>


<div class="site-content">
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Movimiento masivo</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="#">Armamento</a></li>
				<li class="breadcrumb-item"><a href="#">Movimiento masivo</a></li>
			</ol>
			
			<div class="box box-block bg-white">

				<form action="<?php echo base_url();?>index.php?/armamento/cambio_masivo" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-xs-12">
							<div class="form-group">
								<div class="note note-warning">
									<h4 class="box-heading">Vas a realizar una actualización masiva de Armamentos</h4>
									<p>Se realizara una actualización masiva de Armamentos, selecciona en el combo que armamentos deseas cambiar de resguardo y ubicación.</p>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1"></label>
								<select name="departamento" class="form-control" data-plugin="select2">
									<option value="0">Ubicación actual de los armamentos...</option>
									<?
										foreach($departamentos as $departamento){
									?>
										<option value="<?=$departamento->id?>" > <?=$departamento->nombre ?> </option>
									<?
										}	
									?>

								</select>
							</div>
						
							<div class="form-group">
								<label for="exampleInputEmail1">Numero del oficio</label>
								<input name="oficio" id="oficio" type="text" placeholder="Numero del oficio" value="" class="form-control" />
							</div>
						
							<div class="form-group">
								<label for="exampleInputEmail1">Cargar oficio</label>
								<input name="documento" id="inputIncludeFile" type="file" placeholder="Inlcude some file">
							</div>
					
							<div class="form-group">
								<label for="exampleInputEmail1">Observaciones del movimiento</label>
								<textarea rows="5" name="observaciones" placeholder="Observaciones adicionales" class="form-control"></textarea>
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1"></label>
								<input name="resguardante" id="resguardante" type="text" placeholder="Nuevo resguardante" value="" class="form-control" />
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1"></label>
								<select required name="departamento2" id="departamento2" class="form-control" data-plugin="select2">
									<option value="0">Ubicación actual de los armamentos...</option>
									<?
										foreach($departamentos as $departamento){
									?>
										<option value="<?=$departamento->id?>" > <?=$departamento->nombre ?> </option>
									<?
										}	
									?>

								</select>
							</div>
							
							<div id="datos_resguardante"></div>
								<button type="submit" class="btn btn-danger">Realizar Actualización</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>

		
$('#resguardante').change(function (){
	
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

			$('#departamento2').val(resultado).trigger('change');
	
		}
	});
}
</script>