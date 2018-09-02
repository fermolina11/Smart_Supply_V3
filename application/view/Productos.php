<form id="crear_producto">
    <div id="margen">
        <div id="informacion">
            <input style="margin-left: 95%;" type="button" value="Atras" id="atras_p">
            <h2 id="titulo">Productos</h2>

            <br>
                <label>Nombre Producto</label> <br>
                <input id="nombre_p" type="text" placeholder="nombre" name="nombre" maxlength="50" autocomplete="off">

            <br>

            <label>Cantidad</label>
            <label style="margin-left: 135px;">Stock minimo</label>
            <label style="margin-left: 110px;">Precio de venta</label>

            <br>

            <input id="cantidad_p" type="number" name="cantidad" placeholder="Cantidad">
            <input id="stock_p" type="number" name="stock" placeholder="Stock Min">
            <input id="precio_p" type="number" name="precio" placeholder="Precio de venta">

            <br>

            <label>Categorias</label><br>

            <select id="categorias_p">
                        <option value="">Seleccione</option>
                        <?php foreach($lista as $value): ?>
                        <option value="<?= $value->id_categoria ?>">
                            <?= $value->nombre_categoria ?>
                        </option>
                        <?php endforeach ?>
                    </select>

            <br>
            
                <button id="añadir" type="button">Añadir</button>
                <button id="modificar_p" type="button">Guardar cambios</button>
                <button id="cancelar" type="reset">Cancelar</button>
            <table id="datos">
            </table>
        </div>

        <div id="crear_detalle">
            <h2 id="titulo2">Asignar Proveedor</h2>

            <br>

            <h4>Proveedores:</h4> <br>
            <select id="proveedores_p">
                        <option value="">Seleccione</option>
                        <?php foreach($proveedores as $value): ?>
                        <option value="<?= $value->id_proveedor ?>">
                            <?= $value->nombre_empresa ?>
                        </option>
                        <?php endforeach ?>
                    </select>

            <input id="agregar" type="button" value="Agregar">

            <h3>Proveedores añadidos:</h3>

            <ul id="lista">
            </ul>

            <br>

            <button id="guardar" type="button">Listo</button>
            <button id="volver" type="button">Atras</button>
        </div>
    </div>
</form>

<form id="ver_detalle">
    <div id="margen">
       <input style="margin-left: 89%;" id="crear_p" type="button" value="Crear producto"><br>
        <label>Nombre producto</label><br>
        <input id="nombre_d" type="text" autocomplete="off"><br>

        <label>Proveedor</label><br>
        <select id="proveedor_d">
                        <option value="">Seleccione</option>
                        <?php foreach($proveedores as $value): ?>
                        <option value="<?= $value->id_proveedor ?>">
                            <?= $value->nombre_empresa ?>
                        </option>
                        <?php endforeach ?>
                    </select>

        <input id="limpiar_d" type="reset" value="Limpiar">

        <table id="registros_d"></table>
    </div>
</form>