<?php $number = rand(0,999); ?>
<div class="header-search">
	<form method="get" id="s-<?php echo esc_attr($number); ?>" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-group">
			<input type="text" name="s" id="header_s<?php echo esc_attr($number); ?>" placeholder="<?php esc_html_e('Enter a keyword and press enter...',"doctor"); ?>" class="form-control" required>
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="icon icon-Search"></i></button>
			</span>
		</div><!-- /input-group -->
	</form>
</div>
<?php $searchpid = rand(0,999); ?>
<div class="page_search">
	<form method="get" id="<?php echo esc_attr($searchpid); ?>" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-group">
			<input type="text" name="s" id="s-<?php echo esc_attr($searchpid); ?>" placeholder="<?php esc_html_e('Search . . .',"doctor"); ?>" class="form-control" required>
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
			</span>
		</div><!-- /input-group -->
	</form>
</div>