


<div id="page-wrapper">
	<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
		<div class="page-header pull-left">
			<div class="page-title">
				Directorio</div>
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
				            <div class="panel panel-blue" style="background:#FFF;">
                            <div class="panel-heading">Datos del personal</div>
                            <div class="panel-body">
                                <table id="usuarios" class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Departamento</th>
										<th>Extencion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?
										foreach($usuarios as $usuario){
									?>	
                                    <tr>
                                        <td><?=$usuario->nombre." ".$usuario->apellido?></td>
                                        <td><?=$usuario->dep?></td>
										<td><?=$usuario->correo?></td>
                                    </tr>
									<?}?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
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
    NC('#usuarios').DataTable({"scrollX": true});
} );
</script>