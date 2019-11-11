<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
$params = $displayData->params;
$menuParam = JFactory::getApplication()->getParams();
$imageStyle = $menuParam->get(image_style);
$imageFixedWidth = $menuParam->get(image_width_fixed);
$imageFixedHeight = $menuParam->get(image_height_fixed);
$imageFluidWidth = $menuParam->get(image_width_fluid);
$cropStyle = $menuParam->get(crop_style);
?>
<?php $images = json_decode($displayData->images); ?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
<?php if ($imageStyle == 0) : ?>
	<?php $imgfloat = empty($images->float_intro) ? $params->get('float_intro') : $images->float_intro; ?>
	<div aria-hidden="true" class="article-image pull-<?php echo htmlspecialchars($imgfloat, ENT_COMPAT, 'UTF-8'); ?>" style="width:<?php echo $imageFluidWidth ?>%">
	<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
		<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>"><div class="article-img-container"><div class="article-img" style="background-image: url(<?php echo $images->image_intro; ?>);"></div></div></a>
	<?php else : ?><div class="article-img-container"><div class="article-img" style="background-image: url(<?php echo $images->image_intro; ?>);"></div></div>
	<?php endif; ?>
	</div>
<?php endif; ?>
<?php if ($imageStyle == 1) : ?>
    <?php if ($cropStyle == 0) : ?>
    	<?php $imgfloat = empty($images->float_intro) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="pull-<?php echo htmlspecialchars($imgfloat, ENT_COMPAT, 'UTF-8'); ?> item-image">
	<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
		<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>"><img
		<?php if ($images->image_intro_caption) : ?>
			<?php echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"'; ?>
		<?php endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt, ENT_COMPAT, 'UTF-8'); ?>" itemprop="thumbnailUrl" width="<?php echo $imageFixedWidth; ?>" height="<?php echo $imageFixedHeight; ?>"/></a>
	<?php endif; ?><img
		<?php if ($images->image_intro_caption) : ?>
			<?php echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption, ENT_COMPAT, 'UTF-8') . '"'; ?>
		<?php endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt, ENT_COMPAT, 'UTF-8'); ?>" width="<?php echo $imageFixedWidth; ?>" height="<?php echo $imageFixedHeight; ?>" itemprop="thumbnailUrl"/>
		</div>
<?php endif; ?>
 <?php if ($cropStyle == 1) : ?>
    	<?php $imgfloat = empty($images->float_intro) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="pull-<?php echo htmlspecialchars($imgfloat, ENT_COMPAT, 'UTF-8'); ?> item-image" style="width: <?php echo $imageFluidWidth; ?>%;">
	<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
		<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>"><img
		<?php if ($images->image_intro_caption) : ?>
			<?php echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"'; ?>
		<?php endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt, ENT_COMPAT, 'UTF-8'); ?>" itemprop="thumbnailUrl"/></a>
	<?php endif; ?><img
		<?php if ($images->image_intro_caption) : ?>
			<?php echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption, ENT_COMPAT, 'UTF-8') . '"'; ?>
		<?php endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt, ENT_COMPAT, 'UTF-8'); ?>" itemprop="thumbnailUrl"/>
<?php endif; ?>
<?php endif; ?>
</div>
<?php endif; ?>