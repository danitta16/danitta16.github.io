<h1 class="page-header">
    <?php echo !empty($alm->idproducto) ? $alm->descripProducto : 'Nuevo Producto'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Producto">Productos</a></li>
    <li class="active"><?php echo !empty($alm->idproducto) ? $alm->descripProducto : 'Nuevo Producto'; ?></li>
</ol>

<form id="frm-producto" action="?c=Producto&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idproducto" value="<?php echo $alm->idproducto; ?>" />

    <div class="form-group">
        <label>Descripción</label>
        <input type="text" name="descripProducto" value="<?php echo $alm->descripProducto; ?>" class="form-control" placeholder="Ingrese la descripción" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Precio</label>
        <input type="text" name="precioproducto" value="<?php echo $alm->precioproducto; ?>" class="form-control" placeholder="Ingrese el precio" data-validacion-tipo="requerido|numero" />
    </div>

    <div class="form-group">
        <label>Categoría</label>
        <input type="text" name="categoriaproducto" value="<?php echo $alm->categoriaproducto; ?>" class="form-control" placeholder="Ingrese la categoría" />
    </div>

    <div class="form-group">
        <label>Estado</label>
        <select name="estadoproducto" class="form-control">
            <option value="Activo" <?php echo $alm->estadoproducto === 'Activo' ? 'selected' : ''; ?>>Activo</option>
            <option value="Inactivo" <?php echo $alm->estadoproducto === 'Inactivo' ? 'selected' : ''; ?>>Inactivo</option>
        </select>
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    });
</script>
