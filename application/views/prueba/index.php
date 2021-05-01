<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Prueba Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('prueba/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Prueba Id</th>
						<th>Usuario Id</th>
						<th>Tipoprueba Id</th>
						<th>Paciente Id</th>
						<th>Prueba Codigo</th>
						<th>Prueba Fechasolicitud</th>
						<th>Prueba Medicolab</th>
						<th>Prueba Fecharecepcion</th>
						<th>Prueba Procedencia</th>
						<th>Prueba Fechainforme</th>
						<th>Prueba Precio</th>
						<th>Prueba Acuenta</th>
						<th>Prueba Fechacuenta</th>
						<th>Prueba Saldo</th>
						<th>Prueba Fechasaldo</th>
						<th>Prueba Nombreanalisis</th>
						<th>Prueba Descricpion</th>
						<th>Prueba Resultados</th>
						<th>Prueba Observacion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($prueba as $p){ ?>
                    <tr>
						<td><?php echo $p['prueba_id']; ?></td>
						<td><?php echo $p['usuario_id']; ?></td>
						<td><?php echo $p['tipoprueba_id']; ?></td>
						<td><?php echo $p['paciente_id']; ?></td>
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
						<td>
                            <a href="<?php echo site_url('prueba/edit/'.$p['prueba_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('prueba/remove/'.$p['prueba_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
