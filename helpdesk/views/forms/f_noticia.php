


<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title">
				Noticias</div>
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
				<h4 class="box-heading">Va a publicar una nueva noticia !</h4>
				<p>La noticia será publicada en la pagina y podrá ser visto por todo el personal, la nota sera registrada 
					con su numero de empleado y enlazado a su departamento, con un gran acceso viene una gran responsabilidad!</p>
			</div>
			<div class="col-lg-8">
				<div class="panel panel-green">
					<div class="panel-heading">Publicar noticia</div>
					<div class="panel-body pan">
						<form action="<?php echo base_url();?>index.php?/Inicio/guardar_noticia" method="POST" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-body pal">
							<div class="form-group">
								<div class="input-icon right">
									<i class="fa fa-tag"></i>
									<input required name="titulo" type="text" placeholder="Titulo" class="form-control" /></div>
							</div>
						
							<div class="form-group">
								<div class="input-icon right">
									<i class="fa fa-globe"></i>
									<input  name="fuente" type="text" placeholder="Fuente" class="form-control" /></div>
							</div>
						
							<div class="form-group">
								<div class="input-icon right">
									<i class="fa fa-photo"></i>
									<input required name="imagen" type="file"  class="form-control" /></div>
							</div>
							
							<div class="form-group">
										<textarea required rows="10" name="contenido" placeholder="Contenido de la noticia " class="form-control"></textarea>
									</div>
							
								<input name="usuario" type="hidden" placeholder="Modelo" value="<?php echo $this->session->userdata("id"); ?>" class="form-control" />
						</div>
								<input name="departamento" type="hidden" placeholder="Modelo" value="<?php echo $this->session->userdata("departamento"); ?>" class="form-control" />
					</div>

				</div>
							<div class="form-actions text-right pal">
								<button type="submit" class="btn btn-danger">
									Publicar</button>
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