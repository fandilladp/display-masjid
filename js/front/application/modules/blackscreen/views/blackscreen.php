<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body {
			background-color: #000;
		}
	</style>
</head>
<body>


	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

</body>
</html>


<script type="text/javascript">
	$(function() {
		setInterval(status_blackscreen, 5000);
		function status_blackscreen() {
    		$.ajax({
    			url: '<?php echo base_url(); ?>service/setgeneral',
    			dataType: 'json',
    			type: 'POST',
    			data : {nama: 'Black Screen'}
    		})
    		.done(function(res) {
    			if (res.status != '1') {
    				reload_page();
    			}
    		})
    		.fail(function(res) {
    			console.log(res);
    		})
    		.always(function() {
    		});
    	}

    	function reload_page(url = null) {
    		if (url == null) {
    			url = "<?php echo base_url(); ?>";
    		}

    		window.location.href = url;
    	}
	});
</script>