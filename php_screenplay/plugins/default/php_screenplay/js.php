<script>
$(document).ready(function(){
		var phpScreenplayComponent = <?php echo json_encode(ossn_plugin_view('php_screenplay/php_screenplay'));?>;
		$('.newsfeed-middle').prepend(phpScreenplayComponent);
});
</script>
