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
var versiapp = '<?= $keterangan[0]; ?>';
var forEach = function(t, o, r) {
    if ("[object Object]" === Object.prototype.toString.call(t))
        for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
    else
        for (var e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t)
};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
    forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
            this.classList.toggle("is-active");
        }, false);
    });
}
</script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>dashboard/scripts/main.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>dashboard/scripts/my.js"></script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js">
</script>
</body>

</html>
