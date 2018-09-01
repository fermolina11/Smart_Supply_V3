<form id="consulta_cartera">
    <div id="margen">
        <h2 id="titulo">Consultar cartera</h2>
        <h5>Ingrese Cedula:</h5> <br>
        <input name="listas" list="clientes" id="cedula" placeholder="Cliente" autocomplete="off">
        <datalist id="clientes">
                        <?php foreach($resultado as $value): ?>
                        <option value="<?= $value->numero_documento ?>">
                            <?= $value->nombre_cliente ?>
                        </option>
                        <?php endforeach ?>
                        ?>
                    </datalist>
        <input type="reset" value="Limpiar" id="limpiar_c">
        <!-- comentario prueba -->

        <div>
            <label>Nombre cliente:</label> <br>
            <label id="nombre_cliente">""</label> <br>
            <label>Cartera Limite:</label> <br>
            <label id="cartera">0</label> <br>
            <label>Cartera disponible:</label> <br>
            <label id="disponible">0</label> <br>
            <label>Valor del pedido pendiente:</label> <br>
            <label id="pedido">0</label>
        </div>
    </div>
</form>