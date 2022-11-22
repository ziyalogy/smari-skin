<?php 
if(!$displayData['author']) return;
	$authorParams = json_decode($displayData['author']->params);
	$proParams = $displayData['author']->profile;
	$fields = $displayData['author']->fields;
	$author_link = !empty($displayData['link']) ? $displayData['link'] : "";
	$cls = !empty($displayData['class']) ? " ".str_replace("_", "-", $displayData['class']) : "";
	if(!empty($proParams->get('user_avatar'))){
		$avatar = JUri::base(true). '/'.$proParams->get('user_avatar');
	}else{
		if(file_exists(JPATH_ROOT . "/media/t4/author/default.jpg")){
			$avatar = JUri::base(true). '/media/t4/author/default.jpg';
		}else {
			$avatar = "//www.gravatar.com/avatar";
		}
	}
?>

<div class="author-block<?php echo $cls; ?>">
	<div class="author-avatar" itemprop="author" itemscope itemtype="https://schema.org/Person">
		<?php if($author_link): ?>
		<a href="<?php echo $displayData['author']->link;?>">
			<img src="<?php echo $avatar;?>" alt="<?php echo $displayData['author']->name;?>" />
		</a>
		<?php else: ?>
			<span class="h-100"><img src="<?php echo $avatar;?>" alt="<?php echo $displayData['author']->name; ?>" /></span>
		<?php endif ?>
	</div>
	<div class="author-other-info">
			<?php if($displayData['link']): ?>
			<div class="author-name"><a href="<?php echo $displayData['author']->link;?>"><?php echo $displayData['author']->name;?></a></div>
		<?php else: ?>
			<div class="author-name"><?php echo $displayData['author']->name; ?></div>
		<?php endif ?>

		<?php if(!empty($proParams->get('user_jobtitle'))): ?>
		<div class="author-title">
      <div class="title text-capitalize">Job</div>
      <span class="text"><?php echo $proParams->get('user_jobtitle'); ?></span>
    </div>
		<?php endif ?>

    <?php if(!empty($proParams->get('phone'))): ?>
    <div class="author-phone">
      <div class="title">Phone</div>  
      <div class="text">
        <?php echo $proParams->get('phone');?>
      </div>
    </div>
    <?php endif ?>

		<?php if(!empty($proParams->get('aboutme'))): ?>
    <div class="author-about-me">
      <div class="title">About Me</div>
      <div class="text about">
        <?php echo $proParams->get('aboutme');?>
      </div>
    </div>
		<?php endif ?>
    
		<?php 
		if($proParams->get('user_social','') != "null" && !empty($proParams->get('user_social',''))): ?>
		<div class="author-socials social-listing-page">
      <div class="title">Social</div>
      <div class="list-social text">
				<?php foreach ($proParams->get('user_social') as $social):?>
					<a href="<?php echo $social->social_link; ?>" target="_Blank" title="<?php echo $social->social_name; ?>">
						<span class="<?php echo $social->social_icon; ?>" target="_Blank"><?php echo empty($social->social_icon) ? $social->social_name : ""; ?></span>
					</a>
				<?php endforeach ?>
      </div>
		</div>
		<?php endif ?>
        </div>
</div>
