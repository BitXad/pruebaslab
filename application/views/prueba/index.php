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
                    <a href="<?php echo site_url('prueba/registrar_prueba'); ?>" class="btn btn-success btn-xs">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body table-responsive" >
                <table class="table table-striped table-condensed table-hover" id="mitabla" >
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Paciente</th>
                        <th>Tipo Prueba</th>
                        <th>Fecha</th>
                        <!--<th>Fechasolicitud</th>-->
                        <!--<th>Medico/Lab</th>-->
                        <!--<th>Fecha<br>Recepcion</th>-->
                        <th>Procedencia</th>
                        <!--<th>Fecha<br>Informe</th>-->
                        <th>Precio<br>Bs</th>
                        <th>A cuenta <br>Bs</th>
                        <th>Saldo <br>Bs</th>
                        <!--<th>Nombre<br>Analisis</th>-->
<!--                        <th>Descricpion</th>
                        <th>Resultados</th>
                        <th>Observacion</th>-->
                        <th>Responsable</th>
                        <th></th>
                    </tr>
                    <?php 
                        $fuente = "font-family: Arial; font-size: 14px; ";
                        $fuente2 = "font-family: Arial; font-size: 12px; ";
                        foreach($prueba as $p){ ?>
                    
                    <tr style="background-color: <?php echo "#".$p["estado_color"]; ?>">
                        <td><?php echo $p['prueba_id']; ?></td>
                        <td> <img  src="<?php echo base_url("resources/img/".$p['paciente_foto']); ?>" width="60" height="60" class="img img-circle"/></td>
                        <td style="white-space: nowrap">
                            <font style="<?php echo $fuente; ?>"><b> <?php echo $p['paciente_nombre']; ?> </b></font>
                            <br>
                            <b>C.I.: </b> <?php echo $p['paciente_ci']; ?>
                            <b>CODIGO: </b> <?php echo $p['prueba_codigo']; ?>
                        
                        </td>
                        
                        <td><?php echo $p['tipoprueba_descripcion']; ?></td>
                        <td style="white-space: nowrap">
                            <b>SOLIC.:</b>
                            <?php 
                                if($p['prueba_fechasolicitud']!=null){
                                    echo date_format(date_create($p['prueba_fechasolicitud']),"Y/m/d H:i:s");
                                }
                            ?><br>
                            <b>RECEPC.:</b>
                            <?php 
                            if($p['prueba_fecharecepcion']!=null){
                                echo date_format(date_create($p['prueba_fecharecepcion']),"Y/m/d H:i:s"); 
                            }
                            ?><br>
                            <b>INFORME:</b>                            
                            <?php echo date_format(date_create($p['prueba_fechainforme']),"Y/m/d H:i:s"); ?>
                            
                        </td>
                        
                        <td><?php echo $p['prueba_procedencia']; ?><br><?php echo $p['prueba_medicolab']; ?></td>
                        
                        <td>
                            <b style="<?php echo $fuente; ?>"><?php echo number_format($p['prueba_precio'],2,".",","); ?></b>
                        
                        </td>
                        
                        <td style="white-space: nowrap; text-align: center;"><b  style="<?php echo $fuente; ?>"><?php echo number_format($p['prueba_acuenta'],2,".",","); ?></b><br>
                            <?php echo $p['prueba_fechacuenta']; ?></td>
                        
                        <td style="white-space: nowrap; text-align: center;"><b  style="<?php echo $fuente; ?>"><?php echo number_format($p['prueba_saldo'],2,".",","); ?></b><br>
                            <?php echo $p['prueba_fechasaldo']; ?></td>
                        
                        <!--<td><?php echo $p['prueba_nombreanalisis']; ?></td>-->
                        
<!--                        <td><?php echo substr($p['prueba_descricpion'],0,8).".."; ?></td>
                        <td><?php echo substr($p['prueba_resultados'],0,8).".."; ?></td>
                        <td><?php echo substr($p['prueba_observacion'],0,8).".."; ?></td>-->
                        
                        <td>
                            <b  style="<?php echo $fuente; ?>">
                                <?php echo $p['estado_descripcion']; ?>
                            </b>
                            <?php echo $p['usuario_nombre']; ?>
                        </td>
                        
                        <td style="white-space: nowrap; text-align: center;">
                            <a href="<?php echo site_url('prueba/resultado/'.$p['prueba_id']); ?>" class="btn btn-facebook btn-xs" target="_blank" title="Imprimir Resultado"><span class="fa fa-vcard-o"></span> </a>
                            <a href="<?php echo site_url('prueba/edit/'.$p['prueba_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil" title="Modificar"></span> </a> 
                            <a href="<?php echo site_url('prueba/remove/'.$p['prueba_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash" title="Eliminar"></span> </a>
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
