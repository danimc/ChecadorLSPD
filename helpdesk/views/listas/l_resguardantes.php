
<div class="site-content">
	<div class="content-area py-1">
		<div class="container-fluid">
			<h4><?=$titulo?>  </h4>
			
			
			<div class="box box-block bg-white">
				<h5 class="mb-1"><?=$titulo?>  </h5>
				<div class="table-responsive" data-pattern="priority-columns">
				<table class="table table-striped table-bordered dataTable" id="table-2">
						<thead>
							<tr>
								<th>RESGUARDANTE</th>
								<th>DEPARTAMENTO</th>
								<th>TOTAL DE ARMAMENTOS</th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							<?
								foreach($resg as $resguardante){								
							?>	
							<tr>
								<td><?=$resguardante->nombreCompleto?></td>
								<td><?=$resguardante->n_departamento?></td>
								<td><?=$resguardante->radios?></td>
								<td><a target="_blank" href="<?=base_url()?>index.php?/armamento/generar_pdf/<?=$resguardante->resguardante?>/<?=$resguardante->departamento?>"<span class="tag tag-primary">IMPRIMIR RESGUARDO</span></a>
									<a target="_blank" href="<?=base_url()?>index.php?/armamento/generar_ticket/<?=$resguardante->resguardante?>/<?=$resguardante->departamento?>"<span class="tag tag-warning">Ticket</span></a></td>

							</tr>
							<?}?>
							</tbody>
							<tfoot>
							<tr>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								
							</tr>
							</tfoot>
				</table>
			</div>
			</div>
		</div>
	</div>
</div>
