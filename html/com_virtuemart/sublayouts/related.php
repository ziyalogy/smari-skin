<?php defined('_JEXEC') or die('Restricted access');

$related = $viewData['related'];
$customfield = $viewData['customfield'];
$thumb = $viewData['thumb'];

?>
<div class="item-inner">
<div class="pic-product"><?php 
echo JHtml::link (JRoute::_ ($related->link), $thumb , array('title' => $related->product_name,'target'=>'_blank'));?>
</div>
<div class="box-info">
	<div class="name-category">
		<?php foreach ($related->categoryItem as $category) {
			$catUrl = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category['virtuemart_category_id'] , FALSE);
			//echo '<pre>'.print_r($category['category_name'], 1).'</pre>';
			//echo '<pre>'.print_r($catUrl, 1).'</pre>';
			?>
			<a href="<?php echo $catUrl; ?>" title=""><?php echo $category['category_name']; ?></a>
		<?php } ?>
	</div>

	<div class="box-inner">
		<div class="title-product">
			<?php 
echo JHtml::link (JRoute::_ ($related->link),$related->product_name, array('title' => $related->product_name,'target'=>'_blank'));?>
		</div>

		<?php
		if($customfield->wPrice){
			?> <div class="product-price" id="productPrice<?php echo $related->virtuemart_product_id ?>"> <?php
			$currency = calculationHelper::getInstance()->_currencyDisplay;
			echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$related,'currency'=>$currency));
			//echo $currency->createPriceDiv ('salesPrice', 'COM_VIRTUEMART_PRODUCT_SALESPRICE', $related->prices);
			?></div><?php
		} ?>
	</div>

	<?php if($customfield->waddtocart){
		?><div class="vm3pr-related" ><?php
		echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$related, 'position' => array('ontop', 'addtocart')));
		?></div>
	<?php } ?>



	<?php
	if($customfield->wDescr){
		echo '<p class="product_s_desc">'.$related->product_s_desc.'</p>';
	}?>
</div>
</div>