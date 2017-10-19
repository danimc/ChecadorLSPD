


<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title">
				Documentos</div>
		</div>
		<ol class="breadcrumb page-breadcrumb pull-right">
			<li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Inicio</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li><a href="dashboard.html">Servicios</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
			<li><a href="dashboard.html">Nuevo</a>
		</ol>
		<div class="clearfix">
		</div>
	</div>
	
	<div class="page-content">
		<div id="tab-general">
			<div class="col-lg-12">
			<div class="note note-warning">
				<h4 class="box-heading">Va a subir un nuevo documento!</h4>
				<p>El documentó será publicado en la pagina y podrá ser visto por todo el personal, el documento sera registrado 
					con su numero de empleado y enlazado a su departamento, con un gran acceso viene una gran responsabilidad!</p>
			</div>
			<div class="col-lg-8">
				<div class="panel panel-pink">
					<div class="panel-heading">Subir nuevo documento</div>
					<div class="panel-body pan">
						<form action="<?php echo base_url();?>index.php?/Inicio/guardar_documento" method="POST" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-body pal">
						<div class="form-group">
									<div class="input-icon right">
										<i class="fa fa-tag"></i>
										<input  name="nombre" type="text" placeholder="nombre" class="form-control" /></div>
								</div>
							
							
								<div class="form-group">
									<div class="input-icon right">
										<i class="fa fa-file"></i>
										<input name="documento" type="file"  class="form-control" /></div>
								</div>
							
								<input name="usuario" type="hidden" placeholder="Modelo" value="<?php echo $this->session->userdata("id"); ?>" class="form-control" /></div>
								<input name="departamento" type="hidden" placeholder="Modelo" value="<?php echo $this->session->userdata("departamento"); ?>" class="form-control" /></div>

							</div>
							<div class="form-actions text-right pal">
								<button type="submit" class="btn btn-danger">
									Subir archivo</button>
							</div>
							</form>
						</div>
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