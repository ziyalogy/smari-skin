<?php // no direct access
defined ('_JEXEC') or die('Restricted access');
// add javascript for price and cart, need even for quantity buttons, so we need it almost anywhere
vmJsApi::jPrice();


$modShow = $params->get('show-link');
$modCat = $params->get('title-category');
$modMenu = $params->get('link-category');

$col = 1;
$pwidth = ' width' . floor (100 / $products_per_row);
if ($products_per_row > 1) {
	$float = "floatleft";
} else {
	$float = "center";
}
?>
<div class="vmgroup<?php echo $params->get ('moduleclass_sfx') ?>">

	<?php if ($headerText) { ?>
	<div class="vmheader"><?php echo $headerText ?></div>
	<?php
}
	if ($display_style == "div") {
		?>
		<div class="vmproduct<?php echo $params->get ('moduleclass_sfx'); ?> productdetails pd-detail-item row">
			<?php foreach ($products as $product) { ?>
			<div class="item col-12 col-md-6 col-xl-<?php echo 12/$products_per_row; ?> <?php echo $pwidth; ?>">
				<div class="item-inner">
					
					<?php
					if (!empty($product->images[0])) {
						$image = $product->images[0]->displayMediaThumb ('class="featuredProductImage"', FALSE);
					} else {
						$image = '';
					} ?>

					<div class="pic-product">
					<?php
					echo JHTML::_ ('link', JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id), $image, array('title' => $product->product_name));
					echo '<div class="clear"></div>';
					?>
					</div>

					<div class="box-info">
						<div class="name-category">
							<?php
								foreach ($product->categoryItem as $category) {
									$catUrl = JRoute::_ ( 'index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category['virtuemart_category_id'] , FALSE);
									//echo '<pre>'.print_r($category['category_name'], 1).'</pre>';
									//echo '<pre>'.print_r($catUrl, 1).'</pre>';
								?>
									<a href="<?php echo $catUrl; ?>" title=""><?php echo $category['category_name']; ?></a>
								<?php }
							?>
							<?php //echo $product->get('category_name'); ?>
						</div>

						<div class="box-inner">
							<div class="title-product">
									<?php
									$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id); ?>
									<a href="<?php echo $url ?>"><?php echo $product->product_name ?></a>        <?php    echo '<div class="clear"></div>';
									?>
							</div>

							<?php
							if ($show_price) {

								echo '<div class="product-price">';
								// 		echo $currency->priceDisplay($product->prices['salesPrice']);
								if (!empty($product->prices['salesPrice'])) {
									echo $currency->createPriceDiv ('salesPrice', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
								}
								// 		if ($product->prices['salesPriceWithDiscount']>0) echo $currency->priceDisplay($product->prices['salesPriceWithDiscount']);
								if (!empty($product->prices['salesPriceWithDiscount'])) {
									echo $currency->createPriceDiv ('salesPriceWithDiscount', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
								}
								echo '</div>';

							} ?>
						</div>
						<?php
							echo '<div class="productdetails">';
					
							if ($show_addtocart) {
								echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product));
							}
							echo '</div>';
						?>
					</div>
				</div>
			</div>
			<?php
			if ($col == $products_per_row && $products_per_row && $col < $totalProd) {
				//echo "	</div><div style='clear:both;'>";
				$col = 1;
			} else {
				$col++;
			}
		} ?>
		</div>

		<?php
	} else {
		$last = count ($products) - 1;
		?>

		<ul class="vmproduct<?php echo $params->get ('moduleclass_sfx'); ?> productdetails">
			<?php foreach ($products as $product) : ?>

			<li class="product-container <?php echo $pwidth ?>">
				<div class="spacer">
				<?php
				if (!empty($product->images[0])) {
					$image = $product->images[0]->displayMediaThumb ('class="featuredProductImage"', FALSE);
				} else {
					$image = '';
				}
				echo JHTML::_ ('link', JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id), $image, array('title' => $product->product_name));
				echo '<div class="clear"></div>';
				$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id); ?>
				<a href="<?php echo $url ?>"><?php echo $product->product_name ?></a>        <?php    echo '<div class="clear"></div>';
				echo '<div class="productdetails">';
				// $product->prices is not set when show_prices in config is unchecked
				if ($show_price and  isset($product->prices)) {

					echo '<div class="product-price">'.$currency->createPriceDiv ('salesPrice', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
					if ($product->prices['salesPriceWithDiscount'] > 0) {
						echo $currency->createPriceDiv ('salesPriceWithDiscount', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
					}
					echo '</div>';

				}
				if ($show_addtocart) {
					echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'position' => array('ontop', 'addtocart')));
				}
				echo '</div>';
				?>
			</div>
			</li>
			<?php
			if ($col == $products_per_row && $products_per_row && $last) {
				echo '
		</ul><div class="clear"></div>
		<ul  class="vmproduct' . $params->get ('moduleclass_sfx') . ' productdetails">';
				$col = 1;
			} else {
				$col++;
			}
			$last--;
		endforeach; ?>
		</ul>

		<?php
	}
	if ($footerText) : ?>
		<div class="vmfooter<?php echo $params->get ('moduleclass_sfx') ?>">
			<?php echo $footerText ?>
		</div>
		<?php endif; ?>

	<?php if($modShow) :?>
		<div class="btn-more-vm">
			<a class="btn btn-outline-primary" href="<?php  echo JRoute::_("index.php?Itemid={$modMenu}"); ?>" title="<?php echo $modCat ;?>">
				<?php echo $modCat ;?>
			</a>
		</div>
	<?php endif ;?>
</div>