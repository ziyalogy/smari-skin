<?php
$col = floor(12/$this->params->get('num_author_col',3));

?>
<div class="row author-lists items-row">
	<?php foreach ($this->authors as $i => $item): ?>
		<div class="col-12 col-md-6 col-lg-4 col-xxl-<?php echo $col;?>">
			<div class="author">
			<?php 
				$this->author = $item;
				echo JLayoutHelper::render('t4.content.author_info', ["author"=> $this->author,'link'=>true, 'class'=> "author-block-list"] , T4PATH . '/html/layouts');
			 ?>	
		</div>
	</div>	
	<?php endforeach; ?>
</div>

<script>
  jQuery(document).ready(function() {
	jQuery('.author-block-list').on('hover', function(){
		jQuery('.list-social').addClass('open');
	});
  })
</script>