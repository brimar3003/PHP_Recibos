<?php ob_start(); ?>

<?php 

	if(!isset($_GET['data'])){
		header('Location: index.php');
	}

	$data = json_decode($_GET['data']);
?>

<div style="width: 95%; margin-left: auto; margin-right: auto; font-family: arial;">
	<table style="width: 100%; margin-top: 50px;">
		<tr>
			<td colspan="2" style="font-size: 13pt; text-align: center; font-weight: bold;">MEGAPRODUCTOS FAMILIARES</td>
		</tr>
		<tr>
			<td>
				<br />
			</td>
		</tr>
		<tr>
			<td style="font-size: 8pt;">Dirección: S/N, local 9A y Manuela Saenz (Ciudad Bicentenario)</td>
			<td style="font-size: 8pt; text-align: right">RUC: 1715913033001</td>
		</tr>
		<tr>
			<td style="font-size: 8pt;">Teléfonos: (02) 344 8173 - 099 519 2471</td>
			<td style="font-size: 8pt; text-align: right">Quito - Ecuador</td>
		</tr>
	</table>
	<table style="width: 100%; margin-top: 14px;">
		<tr>
			<td colspan="2" style="font-size: 13pt; text-align: center; font-weight: bold;">COMPROBANTE DE PAGO - <?= $data->recibo ?></td>
		</tr>
	</table>
	<hr style="border-bottom: 2px black solid;" />
	<table style="width: 100%;">
		<tr>
			<td style="font-size: 9pt; width: 15%; font-weight: bold;">CLIENTE:</td>
			<td style="font-size: 9pt; width: 45%;"><?= $data->cliente ?></td>
			<td style="font-size: 9pt; width: 15%; font-weight: bold;">RUC:</td>
			<td style="font-size: 9pt; width: 25%;"><?= $data->ruc ?></td>
		</tr>
		<tr>
			<td style="font-size: 9pt; width: 15%; font-weight: bold;">DIRECCIÓN:</td>
			<td style="font-size: 9pt; width: 45%;"><?= $data->direccion ?></td>
			<td style="font-size: 9pt; width: 15%; font-weight: bold;">TEEFONOS:</td>
			<td style="font-size: 9pt; width: 25%;"><?= $data->telefonos ?></td>
		</tr>
		<tr>
			<td style="font-size: 9pt; width: 15%; font-weight: bold;">CONCEPTO:</td>
			<td style="font-size: 9pt; width: 45%;"><?= $data->concepto ?></td>
			<td style="font-size: 9pt; width: 15%; font-weight: bold;">FECHA:</td>
			<td style="font-size: 9pt; width: 25%;"><?= $data->fecha ?></td>
		</tr>
		<tr>
			<td style="width: 15%;"></td>
			<td style="width: 45%;"></td>
			<td style="font-size: 9pt; width: 15%; font-weight: bold;">NO. DOC.:</td>
			<td style="font-size: 9pt; width: 25%;"><?= $data->documento ?></td>
		</tr>
	</table>
	<hr style="border-bottom: 2px black solid;" />
	<table style="width: 100%; font-size: 9pt;">
		<thead>
			<tr>
				<th style="text-align: left;">TIPO</th>
				<th style="text-align: left;">BANCO</th>
				<th style="text-align: left;">NO. DOC.</th>
				<th style="text-align: left;">FACTURA</th>
				<th style="text-align: left;">F. EMISIÓN</th>
				<th style="text-align: right;">VALOR</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($data->pagos as $item){ ?>
				<tr>
					<td><?= $item->tipo ?></td>
					<td><?= $item->banco ?></td>
					<td><?= $item->documento ?></td>
					<td><?= $item->factura ?></td>
					<td><?= $item->fecha ?></td>
					<td style="text-align: right;">$<?php echo number_format((float) $item->valor, 2, ".", ","); ?></td>
				</tr>
			<?php } ?>
			<tr>
				<td colspan="6">
					<hr style="border-bottom: 2px black solid;" />
				</td>
			</tr>
			<tr>
				<td colspan="5" style="font-weight: bold; font-size: 11pt;">SON: <?= $data->son ?></td>
				<td style="text-align: right; font-weight: bold; font-size: 11pt;">$<?php echo number_format((float) $data->valor, 2, ".", ","); ?></td>
			</tr>
			<tr>
				<td colspan="6">
					<br />
				</td>
			</tr>
			<tr>
				<td colspan="5" style="font-weight: bold; font-size: 11pt;">Saldo pendiente: $ <?php echo number_format((float) $data->pendiente, 2, ".", ","); ?></td>
				<td style="text-align: right; font-size: 7pt;">HORA: <?php
																		date_default_timezone_set('America/Guayaquil');
																		echo date('h:i:s A', time());
																		?></td>
			</tr>
			<tr>
				<td>
					<br/><br/><br/><br/><br/>
				</td>
			</tr>
			<tr>
				<td colspan="6">
					<hr style="width: 200px; border-bottom: 1px solid black;" />
					<div style="width: 100%; text-align: center; font-size: 8pt; font-weight: bold;">Registrado por: <?= $data->usuario ?></div>
				</td>
			</tr>
			<tr>
				<td colspan="6">
					<br />
				</td>
			</tr>
			<tr>
				<td colspan="6" style="text-align: center; font-weight: bold;">
					ESTIMADO CLIENTE: Si existe disconformidad con este registro contable, reportar en el lapso de 24 horas al correo pagos@megaproductosfamiliares.com
				</td>
			</tr>
		</tbody>
	</table>
</div>

<?php
	require_once './dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
	use Dompdf\Options;
	try{
		$dompdf = new DOMPDF();
		$dompdf->load_html(ob_get_clean());
		$options = new Options();
		$options->setIsRemoteEnabled(true);
		$dompdf->setOptions($options);
		$dompdf->render();
		$pdf = $dompdf->output();
		$filename = "test.pdf";
		file_put_contents($filename, $pdf);
		// $dompdf->stream($filename);
		$dompdf->stream("", array("Attachment" => false));
	}catch(Exception $ex){
		echo $ex;
	}
?>