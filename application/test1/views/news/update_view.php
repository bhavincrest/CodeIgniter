<div class="col-md-6 col-md-offset-1">
	<div class="error">
    <?php echo validation_errors(); ?>
	</div>
	<?php  echo form_open('news/update_news/'.$news_item['slug']) ?>
        <div class="form-group">
            <label for="title">Titles</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $news_item['title'] ?>">
        </div>
        <div class="form-group">
            <label for="text">Text</label>
            <textarea type="text" class="form-control" id="text" name="text"><?= $news_item['text'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Record</button>
    </form>
</div>
	