
<?

		$restricion = "";
		
		$id = ""; 
		$numero = "";
		$nombre = "";
		$apellido = "";
		$contraseña = "";
		$departamento = "";
		$puesto = "";
		$nombramiento = "";
		$direccion = "";
		$telefono = "";
		$municipio = "";
		$correo = "";
		$cp = "";
		$direccion_dep = "";
		$fecha = "";
		$aplicaciones = "";


	if($accion == 'actualizar'){

		$id = $usuario->id;
		$numero = $usuario->user;
		$nombre = $usuario->nombre;
		$apellido = $usuario->paterno." ".$usuario->materno;
		$contraseña = $usuario->password;
		$departamento = $usuario->departamento;
		$direccion = $usuario->direccion;
		$telefono = $usuario->telefono;
		$municipio = $usuario->MunicipioActual;
		$cp = $usuario->cp;
		$direccion_dep = $usuario->direccion;
		$puesto = $usuario->puesto;
		$nombramiento = $usuario->nombramiento;
		$correo = $usuario->correo;
		$fecha = $fecha = $this->m_usuarios->fecha_a_form($usuario->fechaNacimiento);

	}

?>

<div class="site-content">
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4>Formulario de usuarios</h4>
			
			<div class="box box-block bg-white">
				
				<div class="media stream-item">
					<div class="media-left">
						<div class="avatar box-64">
							<img class="b-a-radius-circle" src="http://172.16.102.10/recursoshumanos/src/img/fotografias/<?=$usuario->nombreCompleto?>.jpg" alt="">
						</div>
					</div>
					<div class="media-body">
						<h6 class="media-heading">
							<a class="text-black" href="#"><?=$usuario->nombreCompleto?></a>
							
						</h6>
						<span class="font-90 stream-meta"><?=$usuario->user?></span>
						<div class="stream-body">
							<p>TELEFONO: <?=$telefono?></p>
							<p>E-MAIL: <?=$correo?></p>
						</div>
					</div>
				</div>
				
				<form action="<?php echo base_url();?>index.php?/Usuarios/<?=$accion?>" method="POST">
					<div class="row">
						
						<div class="col-lg-6 col-md-6 col-xs-6">
							<div class="form-group">
								<label for="exampleInputEmail1"></label>
								<input type="hidden" required="" name="numero" value="<?=$numero?>" placeholder="Empleado" class="form-control"/>
							</div>
						</div>
						
									
					</div>
				
				</div>
			
			
		</div>
		</form>
	</div>
</div>







<script>

	$(document).ready(function()
	{
		$("#departamento").val("<?=$usuario->departamento?>");
		$("#puesto").val("<?=$usuario->puesto?>");
		
		<?php
		
			foreach($accesos as $acceso)
			{
				echo '$("#'.$acceso->checkbox.'").prop("checked", "checked");';
			}
			
			foreach($accesos_modulos as $accesos_modulo)
			{
				echo '$("#'.$accesos_modulo->checkbox.'").prop("checked", "checked");';
			}
			
		
		?>
	});

</script>