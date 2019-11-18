</div>
</div>

<!-- jquery,popper,bootstrap,avant js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="./assets/js/avantui.js"></script>
<script src="<?= $_SESSION['url'] ?>node_modules/swup/dist/swup.min.js"></script>
<script src="<?= $_SESSION['url'] ?>node_modules/@swup/preload-plugin/dist/SwupPreloadPlugin.min.js"></script>
<script src="<?= $_SESSION['url'] ?>node_modules/@swup/scripts-plugin/dist/SwupScriptsPlugin.min.js"></script>
<script>
    var swup;
    if (swup == null) {

        const options = {
            plugins: [new SwupPreloadPlugin(), new SwupScriptsPlugin({
                head: true,
                body: true
            })],
            cache: false,
            animateHistoryBrowsing: true
        };
        swup = new Swup(options);
    }

    $('#example').DataTable({
        responsive: true
    });
</script>
<!-- sidebar js-->
<script src="./assets/js/sidebar.js"></script>
<?php
if (strpos($_SERVER['PHP_SELF'], 'page_itemDetails.php') !== false) {
    include './component/modal/orderModal.php';
} else { }
?>
</main>

</body>

</html>