<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header">
    <font size='4' face='Arial'><b>PRUEBAS REALIZADAS</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($prueba); ?></font>
    <div class="box-tools no-print">
        <!--<a href="<?php //echo site_url('estado/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Estado</a>-->
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <!--<h3 class="box-title">Prueba Listing</h3>-->
            	<div class="box-tools">
                    <a href="<?php echo site_url('prueba/add'); ?>" class="btn btn-success btn-xs">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body table-responsive" >
                <table class="table table-striped" id="mitabla" >
                    <tr>
						<th>#</th>
						<th>Paciente</th>
						<th>Tipo Prueba</th>
						<th>Codigo</th>
						<th>Fechasolicitud</th>
						<th>Medico/Lab</th>
						<th>Fecha<br>Recepcion</th>
						<th>Procedencia</th>
						<th>Fecha<br>Informe</th>
						<th>Precio<br>Bs</th>
						<th>A cuenta</th>
						<th>Fech<br>A cuenta</th>
						<th>Saldo</th>
						<th>Fecha<br>Saldo</th>
						<th>Nombre<br>Analisis</th>
						<th>Descricpion</th>
						<th>Resultados</th>
						<th>Observacion</th>
						<th>Responsable</th>
						<th></th>
                    </tr>
                    <?php foreach($prueba as $p){ ?>
                    <tr>
						<td><?php echo $p['prueba_id']; ?></td>
						<td><?php echo $p['paciente_nombre']; ?></td>
						<td><?php echo $p['tipoprueba_descripcion']; ?></td>
						<td><?php echo $p['prueba_codigo']; ?></td>
						<td><?php echo $p['prueba_fechasolicitud']; ?></td>
						<td><?php echo $p['prueba_medicolab']; ?></td>
						<td><?php echo $p['prueba_fecharecepcion']; ?></td>
						<td><?php echo $p['prueba_procedencia']; ?></td>
						<td><?php echo $p['prueba_fechainforme']; ?></td>
						<td><?php echo $p['prueba_precio']; ?></td>
						<td><?php echo $p['prueba_acuenta']; ?></td>
						<td><?php echo $p['prueba_fechacuenta']; ?></td>
						<td><?php echo $p['prueba_saldo']; ?></td>
						<td><?php echo $p['prueba_fechasaldo']; ?></td>
						<td><?php echo $p['prueba_nombreanalisis']; ?></td>
						<td><?php echo $p['prueba_descricpion']; ?></td>
						<td><?php echo $p['prueba_resultados']; ?></td>
						<td><?php echo $p['prueba_observacion']; ?></td>
						<td><?php echo $p['usuario_nombre']; ?></td>
						<td>
                            <a href="<?php echo site_url('prueba/edit/'.$p['prueba_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modificar</a> 
                            <a href="<?php echo site_url('prueba/resultado/'.$p['prueba_id']); ?>" class="btn btn-facebook btn-xs" target="_blank"><span class="fa fa-vcard-o"></span> Resultado</a>
                            <a href="<?php echo site_url('prueba/remove/'.$p['prueba_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
