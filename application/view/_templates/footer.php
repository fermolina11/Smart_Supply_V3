<script>
    <?php if(isset($_SESSION["mensaje"]) && $_SESSION["mensaje"] != null): ?>
    alert('<?= $_SESSION["mensaje"] ?>');
    <?php unset($_SESSION["mensaje"]) ?>
    <?php endif; ?>
    var uri = "<?=URL?>";
</script>

<script type="text/javascript" src="<?= URL?>/public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= URL?>/public/js/main.js"></script>
<script type="text/javascript" src="<?= URL?>/public/js/metodos.js"></script>
<script type="text/javascript" src="<?= URL?>/public/js/alertas.js"></script>
<script type="text/javascript" src="<?= URL?>/public/js/load.js"></script>
<script type="text/javascript" src="<?= URL ?>/public/js/application.js"></script>
<script type="text/javascript" src="<?= URL ?>/public/select2/js/select2.min.js"></script>
<script type="text/javascript" src="<?= URL ?>/public/js/crearPedido.js"></script>
<script type="text/javascript" src="<?= URL ?>/public/js/ponerPrecio.js"></script>
<script type="text/javascript" src="<?= URL ?>/public/js/select2.js"></script>
<script type="text/javascript" src="<?= URL ?>/public/js/adicionarP.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>




<script>
        <?php if(isset($_SESSION["mensaje"]) && $_SESSION["mensaje"] != null): ?>

        swal("Bien hecho!", "Pedido guardado con éxito!", "success");
        <?php unset($_SESSION["mensaje"]) ?>

        <?php endif; ?>
    

</script>

</body>

</html>
