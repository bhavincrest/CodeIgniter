<div class="footer" style="clear:both;">
      <div class="container">
        <p class="text-muted">Testing Demo.</p>
      </div>
</div>
<script>
	function delete_post(url) {
	
		if(confirm("Are you sure want to delete ?")) {
			
			jQuery.ajax({
					url: url,
					success:function(result){
						window.location.reload();
					}
			});
		}	
		else {
			return false;
		}
	
	}
</script>
</body>
</html>
