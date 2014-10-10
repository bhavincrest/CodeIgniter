<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">News Listing</div>
  
  <!-- Table -->
  <table class="table">
	<tr>
		<th>
			Title
		</th>
		<th>
			Text
		</th>
		<th>
			Edit
		</th>
		<th>
			Delete
		</th>
	</tr>
	<?php foreach($news as $news_item) : ?>
	<tr>
		<td>
			<?= $news_item['title'] ?>
		</td>
		<td>
			<?= $news_item['text']; ?>
		</td>
		<td>
			<a href="<?= prefix_url ?>news/update_view/<?= $news_item['slug'] ?>">Edit</a>
		</td>
		<td>
			<a  href="javascript:void(0);" onclick=delete_post("<?= prefix_url ?>news/delete/<?= $news_item['slug'] ?>") >Delete</a>
		</td>
	</tr>
	<?php endforeach; ?>
  </table>
  
</div>
	
	<ul class="pagination">
		<?php
			if(isset($pagination_data)) {
				echo $pagination_data;
			}
		?>
	</ul>
</div>

