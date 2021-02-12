</div>
<!-- Penutup main content -->

<!-- Footer -->
<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
                <span>SIPP | Copyright &copy; <?= $keterangan[1]; ?>
                    <?= $keterangan[2]; ?> (<a href="https://MrFrost-Nv27.github.io/sipp">Official Page</a>)</span>
            </div>
            <div class="app-footer-right">
                v<?= $keterangan[0]; ?>
            </div>
        </div>
    </div>
</div>
<!-- End Of FOoter -->
</div>
<!-- End Of Content -->
</div>
</div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
(function() {
    var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/601fb175c31c9117cb769f59/1ettsqda2';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
})();
</script>
<!--End of Tawk.to Script-->

<script>
var logout = '<?= base_url('masuk/logout'); ?>';
var getDetail = '<?= base_url('operator/getdetail'); ?>';
</script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>dashboard/scripts/main.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>dashboard/scripts/my.js"></script>
</body>

</html>
