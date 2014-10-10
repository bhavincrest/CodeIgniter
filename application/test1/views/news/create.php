<div class="col-md-6 col-md-offset-1">
	<div class="error">
    <?php echo validation_errors(); ?>
	</div>
	<?php if(isset($news_item['title'])) {   ?>
	<?php  echo form_open('news/update_news/'.$news_item['slug']) ?>
	<?php } else { ?>
	<?php echo form_open_multipart('news/create') ?>
	<?php } ?>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title"  value="<?php if(isset($news_item['title'])) { echo $news_item['title']; } ?>">
        </div>
        <div class="form-group">
            <label for="text">Text</label>
            <textarea type="text" class="form-control" id="text" rows="10" name="text"><?php if(isset($news_item['text'])) { echo $news_item['text']; } ?></textarea>
        </div>
		<?php if(isset($news_item['title'])) {   ?>
		<button type="submit" class="btn btn-primary">Edit News</button>
		<?php } else { ?>
		<button type="submit" class="btn btn-primary">Add News</button>
		<?php } ?>
    </form>
</div>
	