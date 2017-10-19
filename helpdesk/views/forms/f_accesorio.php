
<div class="site-content">
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Asignación de accesorios</h4>
			<form action="<?php echo base_url();?>index.php?/accesorios/guardar" method="POST">
				<div class="box box-block bg-white">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-xs-6">
							<div class="form-group">
								<label for="exampleInputEmail1">Departamento o zona </label>
								<select  required name="departamento" id="departamento" class="form-control" data-plugin="select2">
									<option value="">ZONA O DEPARTAMENTO...</option>
									<?
										foreach($departamentos as $departamento){
									?>
										<option value="<?=$departamento->id?>" > <?=$departamento->nombre ?> </option>
									<?
										}	
									?>
								</select>
							</div>
							
							<div id="divAccesorios">
							<?
								foreach($accesorios as $accesorio){
							?>
								<div class="form-group">
									<label for="exampleInputEmail1"><?=$accesorio->tipo." - ".$accesorio->accesorio?></label>
									<input name="a<?=$accesorio->id?>" type="text" placeholder="<?=$accesorio->accesorio?>" value="" class="form-control" />
								</div>
							
							<?
								}	
							?>
							</div>
							
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-xs-12">	
					<button type="submit" class="btn btn-success w-min-sm mb-0-25 waves-effect waves-light">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>







<script>

$(document).ready(function()
{
	$('#departamento').change(function () {
	
		var datos = 
					{ 
						 'departamento' : jQuery("#departamento").val()
					}
		
		jQuery.ajax({
			url: "<?=base_url()?>index.php?/accesorios/obt_accesorios_zona",
			type:"post",
			dataType: "html",
			async: true,
			data: datos,
			success: function(resultado)
			{

				$("#divAccesorios").html(resultado);
		
			}
			
			
		});		
		
	});
});

</script>