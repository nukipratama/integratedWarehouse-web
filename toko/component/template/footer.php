</div>
</div>

<!-- jquery,popper,bootstrap,avant js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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