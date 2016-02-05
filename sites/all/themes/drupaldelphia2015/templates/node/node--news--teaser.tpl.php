
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>

      <?php print render($title_prefix); ?>
        <h3<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
      <?php print render($title_suffix); ?>
  <?php endif; ?>

  <?php // print render($content); ?>
</article>
