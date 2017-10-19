
<?
$display = '';
$disabled = '';
	
	$id = "";
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
		$id = $radio->id;
		$patrimonial = $radio->patrimonial;
		$tipo = $radio->tipo;
	//	$modelo = $radio->modelo;
	
		$oficio = $radio->oficio;
		$observaciones = $radio->observaciones;
		$resguardante = $radio->usuario;
		
		$disabled = "disabled";

	}

?>


<div class="site-content">
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Nuevo Armamento</h4>
			<ol class="breadcrumb no-bg mb-1">
				<li class="breadcrumb-item"><a href="#">Armamento</a></li>
				<li class="breadcrumb-item"><a href="#">Nuevo</a></li>
			</ol>
			
			<div class="box box-block bg-white">
				
					<div class="row">
					<?
							if($accion == "guardar"){
						?>
						<form action="<?php echo base_url();?>index.php?/armamento/<?=$accion?>" method="POST" >
					<?
									}
								?>
							<div class="col-lg-6 col-md-6 col-xs-6">
								<div class="form-group">
									<label for="patrimonial">Patrimonial</label>
									<input name="patrimonial" type="text" placeholder="Numero patrimonial" value="<?=$patrimonial?>" class="form-control" />

								</div>

								<div <?=$display?> class="form-group" >
									<label for="cat"> Categoria </label>
									<select <?=$disabled?> name="cat" id="cat" class="form-control" data-plugin="select1">
										<option value="0" >SELECCIONE LA CATEGORIA DEL ARMAMENTO</option>
										<?
											foreach($categoria as $cat){
										?>
											<option class="form-control" value="<?=$cat->id?>" > <?=$cat->nombre ?> </option>
										<?
											}	
										?>

									</select>
									</div>
										
									<div class="form-group" >
									<!-- SE MANDA LLAMAR LOS TIPOS  -->
									<div id="opciones"></div>										
									
									</div>
						
									<div class="form-group" >
							<!--SE MANDAN LLAMAR LAS DESCRIPCIONES DEL ARMAMENTO-->
									<div id="descripcion"></div>
									</div>
				



						
								<div class="form-group">
									<label for="Matricula">Matricula</label>
									<input <?=$disabled?> name="matricula" type="text" placeholder="Matricula del armamento" value="<?=$modelo?>" class="form-control" />
								</div>

								<div class="form-group">
									<label for="Estado armamento">Estado del armamento</label>
									<select name="estado" class="form-control" data-plugin="select2">
									<option value="0">SELECCIONE EL ESTADO DEL ARMAMENTO</option>
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
									<label for="exampleInputEmail1">Observaciones</label>
									<textarea <?=$disabled?> name="observaciones" " value="<?=$id_interno?>" class="form-control"></textarea> 
								</div>
								
								<?
									if($accion == "guardar"){
								?>
									<button type="submit" class="btn btn-success w-min-sm mb-0-25 waves-effect waves-light">Guardar</button>
								<?
									}
								?>
							</div>
							
						</form>
						
											
					</div>
				
			</div>
			
			
			
			

		</div>
	</div>
</div>


<script>
	$('#cat').change(function () {
	
    var datos = 
				{ 
					 'id' : jQuery("#cat").val()
				}
	
	jQuery.ajax({
		url: "<?=base_url()?>index.php?/armamento/act_tipo",
		type:"post",
		dataType: "html",
		async: true,
		data: datos,
		success: function(resultado)
		{
			
			$("#opciones").html(resultado);
		}
		
		
	});		
	obtener_sub();
});

	function obtener_sub(){

		setTimeout("(obtener_sub())",1250);
	$('#tipo').change(function () {
	
    var datos = 
				{ 
					 'id' : jQuery("#tipo").val()
				}
	
	jQuery.ajax({
		url: "<?=base_url()?>index.php?/armamento/act_subtipo",
		type:"post",
		dataType: "html",
		async: true,
		data: datos,
		success: function(resultado)
		{
			$("#descripcion").html(resultado);
		}
		
		
	})	
	
});
}
</script>