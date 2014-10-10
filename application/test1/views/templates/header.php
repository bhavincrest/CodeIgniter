<html>
<head>
	<title><?php echo $title ?> - CodeIgniter 2 Tutorial</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<style>
		.error > p {
			color : red;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">News Demo</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li <?php if($page_is=='create') { ?> class="active" <?php } ?>><a href="<?= prefix_url ?>news/create">Add News</a></li>
			<li <?php if($page_is=='index') { ?> class="active" <?php } ?>><a href="<?= prefix_url ?>news/">View News</a></li>
		  </ul>
		  <form class="navbar-form navbar-left" method="post" action="<?= prefix_url ?>news/search/" role="search">
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Search" name="search_news" id="search_news">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		  </form>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>