	<?php
include(__DIR__.'../../src/barcode/BarcodeGenerator.php');
include(__DIR__ .'../../src/barcode/BarcodeGeneratorPNG.php');
include(__DIR__.'../../src/barcode/BarcodeGeneratorSVG.php');
include(__DIR__.'../../src/barcode/BarcodeGeneratorHTML.php');
require __DIR__ . '../../autoload.php';

defined('BASEPATH') OR exit('No direct script access allowed');

class Checador extends CI_Controller {

	var $img_banner = array(900,450);
	var $img_tumb = array(300,300);
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_checador',"",true);
		$this->load->model('m_armamento',"",true);
		$this->load->model('m_inicio',"",true);
		$this->load->model('m_usuarios',"",true);
		$this->load->model('m_seguridad',"",true);
	
		
		$ci = get_instance();	
		$this->ftp_ruta = $ci->config->item("f_ruta");
		$this->dir = $ci->config->item("oficios");
	}
	
	public function index()
	{
		$empleado = $_REQUEST['empleado'];
		$hora = date("H:i");
		$fecha = date("d/m/Y");
		$usr = $this->m_checador->verificacion($empleado);	
			

	if(isset($usr->user))
		{
		echo "<div class='true'>
			  <p><strong># EMPLEADO:" .$empleado." </strong></p>
		  
		  </div>";
		}
	else{
		echo "<div class='false'>
		  <p><strong> Error en Registro: </strong></p>
		  <div class='resultado'>Usuario no valido!!! - ".$empleado."</div>
		  </div>";
}
		//$this->load->view('_head');
		// $this->load->view('_menu');
		// $this->load->view('listas/l_armas',$datos);
		// $this->load->view('_foot');
	}

	public function salvarFoto()
	{

	date_default_timezone_set('America/Mexico_City');
    $date = date('Y-m-d H-i-s');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    ob_start();
    $random = rand();

  	$str="data:image/png;base64,"; 
   	$data=str_replace($str,"",$_POST['imagem']); 
   	$empleado = $_POST['empleado'];
    $data = base64_decode($data);
    $nombre = $date.'.png';

    mkdir('fotos/'.$empleado);
    file_put_contents('fotos/'.$empleado.'/'.$nombre, $data);
 	ob_end_clean();
 	$dir = 'fotos/'.$empleado.'/'.$nombre;

 	$this->checar($dir, $empleado, $fecha, $hora);
   

	}
	
	public function checar($dir, $empleado, $fecha, $hora)
	{
		$entrada = '';
		$entrada = $this->m_checador->checa_registros($empleado, $fecha);
		
		//echo $entrada->hora_salida;
		 if (!isset($entrada->fecha) || $entrada->fecha != $fecha)
		 {
		 	$this->m_checador->checar_entrada($dir, $empleado, $fecha, $hora);
		 echo	'<div class="alert alert-success-fill alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
										</button>
										<strong>Empleado no.: ' . $empleado .'</strong> Entrada Satisfactoria!
									</div>';
		 }
		 elseif ($entrada->hora_salida == '')
		 {
		 	$idChecado = $entrada->id;
		 	$this->m_checador->checar_salida($idChecado, $dir, $hora);
		 	  echo	'<div class="alert alert-info-fill alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
										</button>
										<strong>Empleado no.: ' . $empleado .'</strong> Salida Satisfactoria!
									</div>';
		 }
		 else
		 {
		 	  echo	'<div class="alert alert-danger-fill alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
										</button>
										<strong>Empleado no.: ' . $empleado .'</strong> Ya has checado entrada y salida el dia de hoy!
									</div>';
			unlink($dir);
		 }
		
    }

    public function lista_usuarios()
    {
    	$datos['titulo'] = 'Reportes Checador';	
		$datos["users"] = $this->m_checador->obt_usuarios();	
		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('listas/l_armas',$datos);
		$this->load->view('_foot');
    }
	

	public function historial_checado()
	{
		$id = $this->uri->segment(3);
		$img = $this->m_usuarios->datos_usuario_validacion($id);
		$datos['titulo'] = 'Reporte de checado por Empleado';	
		$datos["historico"] = $this->m_checador->obt_checado($id);	
		$datos["actual"] = $this->m_usuarios->obt_usuarios($id);
		$datos["datosGrafica"] = $this->m_checador->datos_Grafica($id);	
		$fotoPerfil = str_replace(" ", "%20", $img->nombreCompleto);
		$ruta_foto = 'http://172.16.1.9/personal/src/img/fotografias/' .$fotoPerfil.'.JPG';
		$ruta_foto2 = 'http://172.16.1.9/personal/src/img/fotografias/' .$fotoPerfil.'.jpg';
			
			$valida[0] = $ruta_foto2;
			$valida[1] = $ruta_foto;
			$datos["img"] = $valida;

		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('listas/l_historial',$datos);
		$this->load->view('_foot');
	}
	
	public function resguardo()
	{

		$this->load->library('pdf');
		$this->load->view('forms/f_resguardo');
		$this->pdf->render();
		$this->pdf->stream("welcome.pdf");
		
	}
	 
	public function nuevo()
	{
		$datos['titulo'] = 'Armamento';
		$datos['accion'] = 'guardar';
		$datos['categoria'] = $this->m_armamento->obt_cat();
		$datos["estado"] = $this->m_armamento->obt_estado();	
		$datos["tipos"] = $this->m_armamento->obt_tipo();
		$datos["subtipo"] = $this->m_armamento->obt_subtipo();
		//$datos["estados"] = $this->m_armamento->obt_estados();	
		$datos["departamentos"] = $this->m_usuarios->obt_departamentos();
		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('forms/f_armamento',$datos);
		$this->load->view('_foot');
	}
	
	public function ver()
	{
		$id = $this->uri->segment(3);

		$datos['id'] = $id;
		$datos['titulo'] = 'Armamento';
		$datos['accion'] = 'actualizar';
		$datos['situacion'] = $this->m_armamento->obt_situacion();
		$datos["actual"] = $this->m_armamento->obt_armamento($id);	
		$datos["tipos"] = $this->m_armamento->obt_tipo();
		$datos["estado"] = $this->m_armamento->obt_estado();
		$datos["departamentos"] = $this->m_usuarios->obt_departamentos();
		
		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('forms/f_actualizarArmamento',$datos);
		$this->load->view('_foot');
	}
	
	public function movimiento()
	{
		$datos['titulo'] = 'masivo';
		$datos['accion'] = 'actualizar_masivo';
		$datos["departamentos"] = $this->m_usuarios->obt_departamentos();	
		$this->load->view('_head');
		$this->load->view('_menu');
		$this->load->view('forms/f_masivo',$datos);
		$this->load->view('_foot');
	}

	public function guardar()
	{
		$patrimonial = $_POST['patrimonial'];
		
		$this->m_armamento->guardar();
	
        redirect('/armamento/guardar_h/'.$patrimonial);
	}
	
	public function guardar_h()
	{
		$patrimonial = $this->uri->segment(3);
		$this->m_armamento->guardar_h($patrimonial);
	
		$this->session->set_userdata(array("guardado" => "El equipo se ha <strong>registrado</strong> correctamente </b> "));
        redirect('/armamento');
	}
	
	public function actualizar()
	{
		$user = $_POST['resguardante'];
		$usuario = $this->m_usuarios->obt_usuario($user);
		
		$id = $_POST['id'];
		$resguardante = $user;
		$departamento = $_POST['departamento'];
		$estado = $_POST['estado'];
		$oficio = $_POST['oficio'];
		$situacion = $_POST['situacion'];
		$detalles = $_POST['observaciones'];

		$this->upload_logo($id);
		$this->upload_imagenes($id);



		$this->m_armamento->actualizarArma($id,$user,$departamento,$estado,$oficio,$detalles,$situacion);
		$this->actualizar_h($id,$user,$resguardante,$departamento,$estado,$situacion,$oficio,$detalles);
		
	}

	// public function actualizar_fotos()
	// {
	// 	$patrimonial = $_POST['patrimonial'];
	// 	$id = $_POST['id'];
		
		
	// 	redirect('/vehiculos/historico/'.$id);
	// }

	function upload_logo($id)
	{
		if($_FILES['imagen']['name'] != "")
		{
			$this->load->library('image_lib');
			
			if(!is_dir($this->ftp_ruta . "armamento2/src/fotos/". $id))
				
			{
					if(!mkdir($this->ftp_ruta . 'armamento2/src/fotos/' . $id, 0777, true))
						{
							die ('fallo');
						};

			}
			
			$ext = explode('.',$_FILES['imagen']['name']);

			$ext = $ext[count($ext) - 1];

			move_uploaded_file($_FILES['imagen']['tmp_name'], $this->ftp_ruta . 'armamento2/src/fotos/'. $id .'/1.JPG');
			
			$config_image['image_library'] = 'gd2';
			$config_image['source_image'] = $this->ftp_ruta . 'armamento2/src/fotos/'. $id .'/1.JPG';
			$config_image['maintain_ratio'] = true;
			$config_image['quality'] = 98;
			$this->image_lib->initialize($config_image);
			$this->image_lib->resize(); 	
		
		}   

	}

	public function upload_imagenes($id)
	{		
		
		$this->load->library('image_lib');

		$carpetaDestino = $this->ftp_ruta . 'armamento2/src/fotos/'. $id .'/';
		
		
        for($i=0;$i<count($_FILES["imagenes"]["name"]);$i++)
        {
			if(file_exists($carpetaDestino) || @mkdir($carpetaDestino)){
				
				$x = $i+1;
				$origen=$_FILES["imagenes"]["tmp_name"][$i];
				$destino=$carpetaDestino.$id."_comp".$x.".jpg";

				@move_uploaded_file($origen, $destino);
			}else {
				die(var_dump($i));
			}	
        }
	}
	
	public function actualizar_h($id,$user,$resguardante,$departamento,$estado,$situacion,$oficio,$detalles)
	{	
		$id = $this->m_armamento->actualizar_h($id,$user,$resguardante,$departamento,$estado,$situacion,$oficio,$detalles);
		
		$this->upload_file($id);

		$this->session->set_userdata(array("actualizado" => "El estado del equipo ha sido <strong>actualizado</strong> correctamente </b> "));
        redirect('/armamento');
	}
	
	public function cambio_masivo()
	{
		$user = $_POST['resguardante'];
		$usuario = $this->m_usuarios->obt_usuario($user);
		
		$resguardante = $user;
		$dep_nuevo = $_POST['departamento2'];
		$dep_anterior = $_POST['departamento'];
		$oficio = $_POST['oficio'];
		$detalles = $_POST['observaciones'];

		$this->m_armamento->actualizar_masivo($user,$dep_nuevo,$dep_anterior,$oficio,$detalles);

	//	$this->actualizar_masivo_h($user,$dep_nuevo,$dep_anterior,$oficio,$detalles);
		
	}
	
	public function actualizar_masivo_h($user,$dep_nuevo,$dep_anterior,$oficio,$detalles)
	{	
		$id = $this->m_armamento->actualizar_masivo_h($user,$dep_nuevo,$dep_anterior,$oficio,$detalles);
		$this->upload_file($id);
		
		$this->session->set_userdata(array("actualizado" => "La ubicación fisica de los radios ha sido actualizada correctamente</b> "));
        redirect('/armamento');
	}

	function act_tipo()
	{
		$cat = $_POST["id"];


		$tipos = $this->m_armamento->tipoxcat($cat);

		echo'<label for="tipo"> tipo </label>
		<select id="tipo"  name="tipo" class="form-control" data-plugin="select1">
			<option value="0"  class="form-control">SELECCIONA UN TIPO DE ARMAMENTO</option>';
		foreach ($tipos as $tipo) {
		$option = '<option value="'.$tipo->id.'">'.$tipo->clasificacion . '</option>';
		echo $option;
}
	echo "</select>";

	}

	function act_subtipo()
	{
		$tipo = $_POST["id"];


		$subtipo = $this->m_armamento->subtipoxcat($tipo);

		echo'<label for="subtipo"> Descripción </label>
		<select id="subtipo"  name="subtipo" class="form-control" data-plugin="select1">
			<option value="0"  class="form-control">SELECCIONE UN ARMAMENTO</option>';
		foreach ($subtipo as $sub) {
		$option = '<option value="'.$sub->id_subtipo.'">'.$sub->descripcion . '</option>';
		
		echo $option;
}
	echo "</select>";

	}
	
	function upload_file($id)
	{
		if($_FILES['documento']['name'] != "")
		{
			$this->load->library('image_lib');
			
			$ext = explode('.',$_FILES['documento']['name']);

			$ext = $ext[count($ext) - 1];
			
			move_uploaded_file($_FILES['documento']['tmp_name'], $this->ftp_ruta . 'radios2/src/oficios/doc_'. md5($id) .'.' . $ext);
			
	
			$config_image['image_library'] = 'gd2';
			
			
			$config_image['source_image'] = $this->ftp_ruta . 'radios2/src/oficios/doc_'. md5($id) .'.'. $ext;
			$config_image['maintain_ratio'] = true;
			$config_image['quality'] = 98;
			$this->image_lib->initialize($config_image);
			$this->image_lib->resize(); 
			return $ext;
		}   
	}
	
	
	
	public function generar_pdf()
	{


		$dep = $this->uri->segment(4);
		$us = $this->uri->segment(3);


		
		$datos = $this->m_usuarios->datos_usuario_validacion($us);
		
		$t_accesorios = $this->m_accesorios->obt_cat_accesorios();
		
		$departamento = $this->m_usuarios->obt_departamento();
		
		$accesorio = $this->m_accesorios->obt_accesorios_zona_f($dep);
		
		$array = (array)$accesorio;
		$x = 1;

		$fotoPerfil = str_replace(" ", "%20", $datos->nombreCompleto);
		$ruta_foto = 'http://172.16.1.9/personal/src/img/fotografias/' .$fotoPerfil.'.JPG';
		$ruta_foto2 = 'http://172.16.1.9/personal/src/img/fotografias/' .$fotoPerfil.'.jpg';

		$pic = file_get_contents($ruta_foto2);
		if ($pic != NULL)
		{
			$valida = $ruta_foto2;
		}
		else
		{
			$pic = file_get_contents($ruta_foto);
			if ($pic != NULL)
			{
				$valida = $ruta_foto;
			}
		}
	
				
		
		$div = '';
		$radios = $this->m_armamento->obt_armamentos_resguardante($us);
		
		foreach($radios as $rs);
			
			$depto = $rs->dep;
			
		$div .= 
            '<table border="0">
				<tr>
					<td rowspan="2" style="width:30%" ><img src="'.base_url().'/src/img/comisaria.jpg"></td>
					<td style="width:30%"></td>
					<td align="center" height="100px" style="float:right;text-aling:right;width:40%"><h4 style="float:right; "><img src="'.$valida.'" width="75px"></h4></td>
				</tr>
				<tr>
					<td ></td>
					<td align="center"><h6 style="float:left;">CARTA DE RESGUARDO DE ARMAMENTO</h6>
				<h6 style="float:left;">'.$this->m_armamento->fecha_text($this->m_armamento->fechahora_actual()).'</h6></td>
				</tr>
			</table>
          
			<h4 style="float:right;"></h4>
			<table style="font-size:9px;">
					<tr>
						<td width="33%"  height="20px">	

						</td>	
					</tr>
				</table>



				




			<table class="" border="" style="font-size:10px; ">
				<thead>
					<tr>
						<th style="border-bottom: 1px solid #B4B5B0;"><b>NUMERO</b></th>
						<th style="border-bottom: 1px solid #B4B5B0;" border="" height="20px"><b>TIPO</b></th>
						<th style="border-bottom: 1px solid #B4B5B0;"><b>MODELO</b></th>
						<th style="border-bottom: 1px solid #B4B5B0;"><b>No SERIE</b></th>
						<th style="border-bottom: 1px solid #B4B5B0;"><b>ID</b></th>
						<th style="border-bottom: 1px solid #B4B5B0;"><b>PATRIMONIAL</b></th>	
					</tr>
				</thead>
				<tbody>
					<tr>
						<th height="20px"></th>
						<th height="20px"></th>
						<th height="20px"></th>
						<th height="20px"></th>
						<th height="20px"></th>
						<th height="20px"></th>
					</tr>
					';
					$X = 1;
					
					foreach($radios as $inventario)
					{		
						$div .=' 
						<tr>
							<td>'.$X.'</td>
							<td height="20px">'.$inventario->descripcion.'</td>
							<td>'.$inventario->matricula.'</td>
							<td>'.$inventario->nombre.'</td>
							<td>'.$inventario->id.'</td>
							<td>'.$inventario->patrimonial.'</td>	
						</tr>';	
						$X++;
					}
				$div .=' </tbody> 			
				</table>
				<table style="font-size:9px;">
					<tr>
						<td width="33%"  height="20px">						
						</td>	
					</tr>
				</table>
				<br>
				<table style="font-size:9px;">
				';
				
				// foreach($t_accesorios as $t_accesorio)
				// {	
				// 	$apuntador = "a".$x;
					
					
				// 	if(@$array[$apuntador] != 0 && @$array[$apuntador] != '')
				// 	{
				// 		$div .='
				// 		<tr>
				// 			<td style="border-bottom: 1px solid #B4B5B0;">
				// 				'.$t_accesorio->tipo." - ".$t_accesorio->accesorio.'
				// 			</td>
				// 			<td>
				// 				'.@$array[$apuntador].'
				// 			</td>							
				// 		</tr>
				// 	';
				// 	}

				// 	$x++;
				// }	
				
				$div .='
				</table>		
				<br>
				<p style="font-size:9px;">
					Me responsabilizo legalmente a partir de la fecha del buen o mal uso del equipo, aceptando que si por algún motivo se extravía o daña, me haré acreedor a la sanción que se me imponga conforme a la ley de servidores públicos con fundamento en los arts. 44 y 45 fracs. I, II, y IV del Reglamento de Patrimonio Municipal.												
				</p>
				<p style="font-size:9px;">
					<b>NOTA:</b> En caso de robo, extravío o daño el responsable deberá levantar parte informativo a la brevedad posible ante su superior inmediato, en los dos casos primeros con copia de denuncia ante la Fiscalía General del Estado, para que dicha documentación ser remitida a la Oficina de Control de Radios donde se iniciará el procedimiento administrativo ante la Dirección Jurídica adscrita a ésta Comisaria de la Policia Preventiva Municipal, y se remita copia a Contraloría así como al Departamento de Muebles y Otros.												
				</p>
				<p style="font-size:9px;">
					Recordando que el armamento que se encuentre bajo su resguardo es Responsabilidad única y exclusivamente del <b>RESGUARDANTE</b>, aclarando que si el equipo es prestado a otra Área, ésta Oficina no será responsable del equipo prestado por el <b>RESGUARDANTE</b> así como el encargado de Recuperarlo.  												
				</p>
				<p style="font-size:9px;">
					El armamento que se encuentra asignado a Áreas externas a la Comisaría de la Policía de Guadalajara deberán de hacer entrega de dicho equipo 8 días antes del término de la Administración o cuando el equipo no sea utilizado.																		
				</p>
				<table style="font-size:9px;">
					<tr>
						<td width="33%"  height="">
						</td>						
					</tr>
				</table>
				<h4>RESPONSABLE: '.$datos->nombreCompleto.'</h4>
				<h4>CARGO: '.$datos->puesto.'</h4>
				
				<table style="font-size:9px;">
					<tr>
						<td width="33%"  height="">
							
						</td>
						<td width="33%";>
						</td>
						<td width="33%";>
						</td>
					</tr>
					<tr>
						<td width="33%">
						</td>
						<td width="33%";>
							<b>LIC. ULISES MENDOZA MARTINEZ</b>	<br><br>			
								COMISARÍO DE LA DIVISIÓN DE LOGÍSTICA					
						</td>
						<td width="33%";>
						</td>
					</tr>
					<tr>
						<td width="33%"  height="40px">
							
						</td>
						<td width="33%";>
						</td>
						<td width="33%";>
						</td>
					</tr>
					<tr>
						<td width="33%";>
							<b>C. ROBERTO RODRIGUEZ ROSAS</b><br><br>	
							JEFE  DE LA  OFICINA DE CTL. DE ARMAMENTO
						</td>
						<td width="33%";>
						</td>
						<td width="33%";>
							<b>'.$datos->nombreCompleto.'</b><br><br>	
							RECIBE EQUIPO:
						</td>
					</tr>
				</table>
				
				';
			$this->generar($div,$depto);
	}
	
	public function generar($html, $depto) {
        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Daniel Mora');
        $pdf->SetTitle('Formato de Resguardo de Armamento');
        $pdf->SetSubject('Tutorial TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
		$pdf->SetFont('freemono', '', 14, 'deeppink', true);
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "" . ' ', PDF_HEADER_STRING."\n".$depto, "#000", "#000");
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));	

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

// Establecer el tipo de letra
 
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('Helvetica', '', 11, '', true);

// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();

//fijar efecto de sombra en el texto
        //$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => "#fff", 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir
       

        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("primer pdf");
		ob_end_clean();
        $pdf->Output($nombre_archivo, 'I');
    }

public function generar_ticket()
	{
		
		$dep = $this->uri->segment(4);
		$us = $this->uri->segment(3);
		$usuario = $this->session->userdata("user");
		$datos['entrega'] = $this->m_usuarios->nombre_entrega_armas($usuario);
	
		$datos['datos'] = $this->m_usuarios->datos_usuario_validacion($us);
		//$departamento'] = $this->m_usuarios->obt_departamento();
		$datos['armas'] = $this->m_armamento->obt_armamentos_resguardante($us);

		$this->load->view('ticket', $datos);
// 		$div .= '
// 		<table>
// 		<tr>
// 		<td>
// 		<img width="250" src="'.base_url().'/src/img/comisaria.jpg">
// 		</td>
// 		<td align="right">
// 		<img width="150" src="'.base_url().'/src/img/gdl.jpg">
// 		</td>
// 		</tr>
// 		</table>
// 		<H3 align="center">Resguardo de Armamento</h3>
// 		<br>';
// 			$div .= '<table border="" cellspacing=0 cellpadding=2 bordercolor="666633">
// 								<tr>
// 								<th width="50%"><b>Descripción</b></th>
// 								<th align="right"><b>Matricula</b></th>
// 								</tr>';
// 		$datos->nombreCompleto;
// 					foreach($armas as $inventario)
// 					{	

// 						$div .= '<tr>
// 						<td>' . $inventario->nombre . '</td>
// 						<td align="right">' .' ' . $inventario->matricula. '</td>
// 						        </tr>';
// 						$X++;
// 					}
// 			$div .= '</table>
// 			<br><br><br><br><br><br><br>
// 			<table>
// 			<tr>
// 			<td align="center" width="100%">_________________________</td>
// 			</tr>
// 			<td align="center" width="100%"><b>RESGUARDANTE: '.$datos->nombreCompleto . ' </b></td>
// 			</tr>
// 			<tr><td></td></tr>	
// 			<tr><td><br><br><br></td></tr>
// 			<tr><td></td></tr>
// 			<tr><td></td></tr>
// 			<tr>
// 			<td align="center" width="100%">_________________________</td>
// 			</tr>
// 			<tr>
// 			<td align="center" width="100%"><b>ENTREGA EL ARMAMENTO: ' . $entrega->nombreCompleto . '</b></td>
// 			</tr>
// 			</table>';


// $this->generar_tick($div);
/*
$smbc = new smbclient ('//172.16.103.65/Danny-pc', 'soporte', '123');
 
if (!$smbc->get ('path/to/desired/file.txt', '/tmp/localfile.txt'))
{
    print "Failed to retrieve file:\n";
    print join ("\n", $smbc->get_last_stdout());
}
else
{
    print "Transferred file successfully.";
}


$connector = new NetworkPrintConnector("172.16.103.65");
$printer = new Printer($connector);

$printer -> text("Hello World!\n");
$printer -> cut();
$printer -> close();*/

	}

    public function generar_tick($html) {


        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', '80mm', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Daniel Mora');
        $pdf->SetTitle('Formato de Resguardo de Armamento');
        $pdf->SetSubject('Tutorial TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
		//$pdf->SetFont('freemono', '', 14, 'deeppink', true);
      //  $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "" . ' ', PDF_HEADER_STRING."\n".$depto, "#000", "#000");
      //  $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));	

// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
    //    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  //      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
       // $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);

// Establecer el tipo de letra
 
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('Helvetica', '', 20, '', true);

// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();

//fijar efecto de sombra en el texto
        //$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => "#fff", 'opacity' => 1, 'blend_mode' => 'Normal'));

// Establecemos el contenido para imprimir
       

        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("armamento");
		ob_end_clean();
        $pdf->Output($nombre_archivo, 'I');



    }

}
