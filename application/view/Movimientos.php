<form id="movimientos">
    <div id="margen">
        <h2 id="titulo2">Movimientos</h2>

        <h4>Tipo de movimiento</h4>
        <input list="tipo_mov" id="tipo" autocomplete="off" maxlength="20">
        <datalist id="tipo_mov">
            <option value="Dada de baja">
            <option value="Devolucion">
            <?php foreach($mov as $value): ?>
                        <option value="<?= $value->tipo_movimiento ?>">
                        <?php endforeach ?>
        </datalist>

        <h4>Producto</h4>
        <select id="producto_mov">
            <option value="">Seleccione</option>
                        <?php foreach($pro as $value): ?>
                        <option value="<?= $value->id_producto ?>">
                            <?= $value->nombre_producto ?>
                        </option>
                        <?php endforeach ?>
        </select>

        <input id="cantidad_mov" type="number" placeholder="Cantidad">
        <input type="text" placeholder="Descripcion" id="descripcion_mv" maxlength="50"> <br>

        <input type="button" value="Guardar" id="guardar_mv">

        <table id="datos_mov"></table>
    </div>
</form>
