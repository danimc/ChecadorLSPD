
<div class="site-content">
	<div class="content-area py-1">
		<div class="container-fluid">

			<h4><?=$titulo?>  </h4>
			
			<?if($this->session->userdata("guardado"))
				{        
					echo '<div class="alert alert-success alert-dismissable">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' . $this->session->userdata("guardado") . '</div>';
					$this->session->unset_userdata("guardado");

				}else if($this->session->userdata("actualizado"))
				{        
					echo '<div class="alert alert-info alert-dismissable">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' . $this->session->userdata("actualizado") . '</div>';
					$this->session->unset_userdata("actualizado");

				}
				
				$toltip = "";
				$ref = '';
				
				if($this->session->userdata("armamento")!= "")
				{
					
					
					$seguridad = explode("+",$this->session->userdata("armamento"));
					
				}else{
					$toltip = 'data-toggle="tooltip" data-placement="left" title="Acceso restringido"';	
				}


				$fechaHoy = date('Y-m-d');
				$etiqueta = '';
				$datosEtiqueta = $this->load->m_checador->revisar_asistencia_hoy($actual->user, $fechaHoy);
				
									if(isset($datosEtiqueta->fecha) && $datosEtiqueta->fecha != '')
									{
										$etiqueta = '<div class="p-status bg-success">Presente</div>';
										if($datosEtiqueta->hora_salida != '')
										{
											$etiqueta = '<div class="p-status bg-danger">Jornada terminada</div>';
										}
									}
									else 
									{
										$etiqueta = '<div class="p-status bg-warning">Sin ingresar</div>';
									}


											
				?>
			<span class="tag tag-success"></span>
			<span class="tag tag-info"></span>
			<span class="tag tag-warning"></span>
			<span class="tag tag-danger"></span>
			<br><br>

			<? 
			$col = 'col-sm-12';
			if($titulo != 'Historico')
			{
				$col = 'col-sm-9';
				?> 
				<div class="col-sm-3 col-xs-12">
					<div class="card">
					<div class="card-header">
									<b>Información del Empleado</b>
					</div>
					<div class="profile-avatar">
						<img class="img-fluid" src="<?=$img[0]?>" alt="">
						<img class="img-fluid" src="<?=$img[1]?>" alt="">
						<?=$etiqueta?>
					</div>
						
									<div class="card-block">
								<b>Codigo de Empleado: </b><?=$actual->user?>
								<hr>
								<b>Nombre: </b>
								<?=$actual->nombreCompleto?>
								<HR>
								<b>Departamento: </b>
								<?=$actual->dep?>
								<hr>
								<b>Nombramiento: </b>
								<?=$actual->nombramiento?>
									</div>
								</div>
							</div>
							<?
						}
							?>
						<div class="box box-block bg-white <?=$col?>">
							<div class="row">
								<div class="col-md-12 mb-1 mb-md-0">
									<h5 class="mb-1">Horarios</h5>
									<canvas id="grafica" class="chart-container"></canvas>
								</div>							
							</div>
						</div>
							<div class=""></div>
			<div class="box box-block bg-white <?=$col?>">
				<!-- <h5 class="mb-1"><?=$titulo?>  </h5> -->
			
				<div class="table-responsive  " data-pattern="priority-columns">
				<table class=" table table-striped table-bordered dataTable" id="table-2">
		
						<thead>
							<tr>
								<th>Fecha</th>
														
								<th>Hora de entrada</th>
								<th>Hora de Salida</th>
								<th>Acciones</th>
								
							</tr>
							</thead>
							<tbody>
							<?

								foreach($historico as $inventario){
									$class= "";
									$iconito="";
									
									$fecha = $this->m_armamento->hora_fecha_text($inventario->fecha);
								
							?>	
							<tr class=" ">
								<td><?=$fecha?></td>
								<td><a href="<?=$inventario->foto_entrada?>" target="_blank" onclick="window.open(this.href, this.target, 'width=300,height=400'); return false;"><?=$inventario->hora_entrada?></a></td>
							
								
								<td><a href="<?=$inventario->foto_salida?>"target="_blank" onclick="window.open(this.href, this.target, 'width=300,height=400'); return false;"><?=$inventario->hora_salida?></a></td>
								
								<td><button class="btn btn-danger"></button></td>
							</tr>
							<?}?>
							</tbody>
							<tfoot>
							<tr>
								
							</tr>
							</tfoot>
				</table>
			</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url()?>src/js/Chart.js"></script>


<script>
var ctx = document.getElementById("grafica");

var data = {
	
    labels: [<?
	foreach ($datosGrafica as $grafica) 
{
	echo '"'.$grafica->fecha.'",';
}?>],
    datasets: [
        {
            label: "Hora de checado (24 Hrs.)",
            fill: false,
            lineTension: 0.0,
            backgroundColor: "#f44236",
            borderColor: "#f44236",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "#f44236",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "#f44236",
            pointHoverBorderColor: "#fff",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [
	<?
			foreach ($datosGrafica as $grafica) 
			{
			$hora = $grafica->hora;
			$asd = explode(':', $hora,6);
			$hora = (int)$asd[0] . '.' .$asd[1];
			echo $hora. ',';
}
?>],
            spanGaps: false,
        }
    ]
};

var myChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>



