<h1 class="page-header">
    <?php echo !empty($alm->idDomicilio) ? $alm->horaDomicilio : 'Nuevo Domicilio'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Domicilio">Domicilios</a></li>
    <li class="active"><?php echo !empty($alm->idDomicilio) ? $alm->horaDomicilio : 'Nuevo Domicilio'; ?></li>
</ol>

<form id="frm-domicilio" action="?c=Domicilio&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idDomicilio" value="<?php echo $alm->idDomicilio; ?>" />

    <div class="form-group">
        <label>Hora</label>
        <input type="time" name="horaDomicilio" value="<?php echo $alm->horaDomicilio; ?>" class="form-control" placeholder="Ingrese la hora" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Estado</label>
        <select name="estadoDomicilio" class="form-control">
            <option value="Procesando" <?php echo $alm->estadoDomicilio === 'Procesando' ? 'selected' : ''; ?>>Procesando</option>
            <option value="Enviado" <?php echo $alm->estadoDomicilio === 'Enviado' ? 'selected' : ''; ?>>Enviado</option>
            <option value="Entregado" <?php echo $alm->estadoDomicilio === 'Entregado' ? 'selected' : ''; ?>>Entregado</option>
        </select>
    </div>

    <div class="form-group">
        <label>Id Pedido</label>
        <input type="text" name="idpedidoFK" value="<?php echo $alm->idpedidoFK; ?>" class="form-control" placeholder="Ingrese el id del pedido" />
    </div>

    <div class="form-group">
        <label>Id Domicilio</label>
        <input type="text" name="idDomicilioFK" value="<?php echo $alm->idDomicilioFK; ?>" class="form-control" placeholder="Ingrese el id del domicilio" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-domicilio").submit(function(){
            return $(this).validate();
        });
    });
</script>
