
<?php global $wp; ?>
<?php if ($pagination->total_pages > 1) { ?>
	<ul class="uzp__pagination">
	<?php for($page = 1; $page <= $pagination->total_pages; $page++) {
	   if ($pagination->current_page != $page) { ?>
		<li>
			<a href="<?php echo ($page != 1) ? get_permalink() . $page . '/' : get_permalink(); ?>">
				<?php echo $page ?>
			</a>
		</li>
	   <?php } else { ?>
			<li class="active"><div class="uzp__pagination-item"><?php echo $page ?></div></li>
		<?php } ?>
	<?php } ?>
</ul>
<?php } ?>
