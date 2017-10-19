


<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title">
				Documentacion</div>
		</div>
		<ol class="breadcrumb page-breadcrumb pull-right">
			<li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Inicio</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="hidden"><a href="#">Inicio</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li class="active">Usuarios</li>
		</ol>
		<div class="clearfix">
		</div>
	</div>
	
	<div class="page-content">
		<div id="tab-general">
			<div class="col-lg-12">
			
			<?
				if($this->session->userdata("Guardado"))
				{        
					echo '<div class="alert alert-success alert-dismissable">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' . $this->session->userdata("Guardado") . '</div>';
					$this->session->unset_userdata("Guardado");

				}
				if($this->session->userdata("actualizado"))
				{        
					echo '<div class="alert alert-info alert-dismissable">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>' . $this->session->userdata("actualizado") . '</div>';
					$this->session->unset_userdata("actualizado");

				}
			?>	
			
				<ul class="nav nav-tabs">
					<li class="active"><a href="<?php echo base_url();?>index.php?/Inicio/nuevo_documento" >Nuevo documento</a></li>
					<li><a href="#tab-messages" data-toggle="tab"></a></li>
				</ul>
				            <div class="panel panel-grey" style="background:#FFF;">
                            <div class="panel-heading">Listado de documentos descargables</div>
                            <div class="panel-body">
                                <table id="usuarios" class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Departamento</th>
										<th>Actualizacion</th>
										<th>Formato</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?
										foreach($documentos as $documento){	

										$fecha = explode(" ",$documento->fecha);		
									
										$fecha_mes = $this->m_servicios->fecha_text($fecha[0]);
										
										$departamentos = $this->m_servicios->obt_departamento_id($documento->departamento);
								
										foreach($departamentos as $departamento);
									?>	
                                    <tr>
                                        <td><?=$documento->nombre?></td>
                                        <td><?=$departamento->nombre?></td>
										<td><?=$fecha_mes?></td>
									<?	
										if ($documento->ext == 'pdf'){
												echo "<td><a target='blank' href=". base_url() ."/src/documentos/doc_".md5($documento->id)."." .$documento->ext."><img src='". base_url() ."/src/images/icons/pdf.png'/></a></td>";                                                                                  
										}
										if ($documento->ext == 'doc' || $documento->ext == 'docx'){
												echo "<td><a target='blank' href=". base_url() ."/src/documentos/doc_".md5($documento->id)."." .$documento->ext."><img src='". base_url() ."/src/images/icons/doc.png'/></a></td>";                                                                                  
										}
										if ($documento->ext == 'xls' || $documento->ext == 'xlsx'){
												echo "<td><a target='blank' href=". base_url() ."/src/documentos/doc_".md5($documento->id)."." .$documento->ext."><img src='". base_url() ."/src/images/icons/xls.png'/></a></td>";                                                                                  
										}
									?>	
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

</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

			
<script>
	var NC = jQuery.noConflict();
	NC(document).ready(function() {
    NC('#usuarios').DataTable();
} );
</script>