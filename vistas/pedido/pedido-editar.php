<?php
require_once '../controlador/sesion_valida.php';
require_once '../controlador/rol_valido.php';
?>
<h1 class="page-header">
    <?php echo !empty($alm->idPedido) ? $alm->fechapedido : 'Nuevo Pedido'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Pedido">Pedidos</a></li>
    <li class="active"><?php echo !empty($alm->idPedido) ? $alm->fechapedido : 'Nuevo Pedido'; ?></li>
</ol>

<form id="frm-pedido" action="?c=Pedido&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idpedido" value="<?php echo $alm->idpedido; ?>" />

    <div class="form-group">
        <label>Id Producto</label>
        <input type="text" name="idProductoFK" value="<?php echo $alm->idProductoFK; ?>" class="form-control" placeholder="Ingrese el id del producto" required />
    </div>

    <div class="form-group">
        <label>Id Usuario</label>
        <input type="text" name="idusuarioFK" value="<?php echo $alm->idusuarioFK; ?>" class="form-control" placeholder="Ingrese el id del usuario" required />
    </div>

    <div class="form-group">
        <label>Fecha Pedido</label>
        <input type="date" name="fechapedido" value="<?php echo $alm->fechapedido; ?>" class="form-control" placeholder="Ingrese la fecha del pedido" required />
    </div>

    <div class="form-group">
        <label>Hora Pedido</label>
        <input type="time" name="horapedido" value="<?php echo $alm->horapedido; ?>" class="form-control" placeholder="Ingrese la hora del pedido" required />
    </div>

    <div class="form-group">
        <label>Total Pedido</label>
        <input type="text" name="totalpedido" value="<?php echo $alm->totalpedido; ?>" class="form-control" placeholder="Ingrese el total del pedido" required />
    </div>

    <div class="form-group">
        <label>Estado Pedido</label>
        <select name="estadopedido" class="form-control" required>
            <option value="Procesando" <?php echo $alm->estadopedido === 'Procesando' ? 'selected' : ''; ?>>Procesando</option>
            <option value="Enviado" <?php echo $alm->estadopedido === 'Enviado' ? 'selected' : ''; ?>>Enviado</option>
            <option value="Entregado" <?php echo $alm->estadopedido === 'Entregado' ? 'selected' : ''; ?>>Entregado</option>
        </select>
    </div>

    <div class="form-group">
        <label>Pedido a Domicilio</label>
        <select name="pedidoadomicilio" class="form-control" required>
            <option value="Sí" <?php echo $alm->pedidoadomicilio === 'Sí' ? 'selected' : ''; ?>>Sí</option>
            <option value="No" <?php echo $alm->pedidoadomicilio === 'No' ? 'selected' : ''; ?>>No</option>
        </select>
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-pedido").submit(function(){
            return $(this).validate();
        });
    });
</script>
