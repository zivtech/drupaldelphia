<?php
$wrapper = entity_metadata_wrapper('node', $node);

$logo_wrapper = $wrapper->field_sponsor_logo->value();
dsm($logo_wrapper);
if (isset($logo_wrapper)) {
	$logo_uri = $logo_wrapper['uri'];
	$logo_url = image_style_url('sponsor_logo',$logo_uri);
}
?>

<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_suffix); ?>
  <?php if (isset($logo_url)): ?>
		<img src="<?php print $logo_url; ?>" />
	<?php endif; ?>
</article>
