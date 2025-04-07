<h1 class="page-header">
    <?php echo !empty($alm->idRolusuario) ? $alm->descripRolusuario : 'Nuevo Rol'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Rol">Roles</a></li>
    <li class="active"><?php echo !empty($alm->idRolusuario) ? $alm->descripRolusuario : 'Nuevo Rol'; ?></li>
</ol>

<form id="frm-rol" action="?c=Rol&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idRolusuario" value="<?php echo $alm->idRolusuario; ?>" />

    <div class="form-group">
        <label>Descripción</label>
        <input type="text" name="descripRolusuario" value="<?php echo $alm->descripRolusuario; ?>" class="form-control" placeholder="Ingrese la descripción" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Estado</label>
        <select name="estadoRolusuario" class="form-control">
            <option value="Activo" <?php echo $alm->estadoRolusuario === 'Activo' ? 'selected' : ''; ?>>Activo</option>
            <option value="Inactivo" <?php echo $alm->estadoRolusuario === 'Inactivo' ? 'selected' : ''; ?>>Inactivo</option>
        </select>
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-rol").submit(function(){
            return $(this).validate();
        });
    });
</script>
