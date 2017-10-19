<?php



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
	?>

<table width="400">
 		<tr>
 		<td >
 		<img width="250" src="<?=base_url()?>/src/img/comisaria.jpg">
 		</td>
 		<td align="right">
 		<img width="100" src="<?=$valida?>">
 		</td>
 		</tr>
 		<tr>
 		<td colspan="2">
 		<H3 align="center">Resguardo de Armamento</h3>
 		</td>
 		</tr>
 		<tr>
 		<th><b>Descripción</b></th>
 		<th align="center"><b>Matricula</b></th>
 		</tr>
 		<?
 		foreach($armas as $inventario)
 		{
 			?>
						<tr>
 						<td><?=$inventario->nombre?></td>
 						<td align="center"><?= $inventario->matricula?></td>
 						</tr>
 					
 					<?
 				}
 				?>
 			</table>
 			<br><br><br><br><br><br><br>
 			<table width="400">
 			<tr>
 			<td align="center" width="100%">_________________________</td>
 			</tr>
 			<td align="center" width="100%"><b>RESGUARDANTE: <?=$datos->nombreCompleto?> </b></td>
 			</tr>
 			<tr><td></td></tr>	
 			<tr><td><br><br><br></td></tr>
 			<tr><td></td></tr>
 			<tr><td></td></tr>
 			<tr>
 			<td align="center" width="100%">_________________________</td>
 			</tr>
 			<tr>
 			<td align="center" width="100%"><b>ENTREGA EL ARMAMENTO: <?=$entrega->nombreCompleto ?></b></td>
 			</tr>
 			<tr>
 				<td>.</td>
 			</tr>

 			<tr>


 				<td align="center">
 					<?
 					$generator = new Picqer\Barcode\BarcodeGeneratorSVG();
					echo  $generator->getBarcode('U 30216 F 1236', $generator::TYPE_CODE_128);

					?>
 				</td>

 			</tr>
 			</table>
 			
 			<br><br><br><br><br>
 			......
 			
		
 			<script type="text/javascript">
 				//window.print();
 				//setTimeout(window.close, 500)

 			</script>