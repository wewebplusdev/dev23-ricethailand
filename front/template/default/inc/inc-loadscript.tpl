
<!-- JS SOURCE -->
<script src="{$template}/assets/js/jquery-3.7.0.min.js"></script>
<script src="{$template}/assets/js/popper.min.js"></script>
<script src="{$template}/assets/js/jquery-ui-1.13.2.js"></script>
<script src="{$template}/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="{$template}/assets/js/jquery.easing-1.3.min.js"></script>
<script src="{$template}/assets/js/modernizr-3.6.0.min.js"></script>
<script src="{$template}/assets/js/bootstrap.min.js"></script>
<script src="{$template}/assets/js/validator.min.js"></script>
<script src="{$template}/assets/js/wow.min.js"></script>
<script src="{$template}/assets/js/select2.min.js"></script>
<script src="{$template}/assets/js/jquery.fancybox.min.js"></script>
<script src="{$template}/assets/js/jquery.mCustomScrollbar.min.js"></script>
<script src="{$template}/assets/js/slick.js"></script>
<!-- <script src="{$template}/assets/js/slick.min.js"></script> -->
<script src="{$template}/assets/js/slick-limitdot.js"></script>
<script src="{$template}/assets/js/lazyload.min.js"></script>
<script src="{$template}/assets/js/trunk8.min.js"></script>
<script src="{$template}/assets/js/jquery.matchHeight-min.js"></script> 
<script src="{$template}/assets/js/jquery.sticky-sidebar.min.js"></script>
<script src="{$template}/assets/js/sticky-sidebar.min.js"></script>
<script src="{$template}/assets/js/resizesensor.js"></script>

<!-- Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- JS MAIN -->
<script src="{$template}/assets/js/main.js{$lastModify}"></script>

<!-- JS CONCAT -->
<!-- <script src="{$template}/assets/js/script.concat.js"></script> -->

<script>
	var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
</script>

{strip}
    {if {$assignjs|default:null}}
        {foreach $assignjs as $addAssetScript}
            {$addAssetScript}
        {/foreach}
    {/if}
{/strip}