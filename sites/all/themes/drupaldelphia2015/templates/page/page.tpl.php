<header id="header" role="banner">
  <div class="header-inner">
      <div for="toggle" class="mobile-handle"><i class="icon-reorder"></i></div>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print base_path() . path_to_theme() ?>/images/logo.png" alt="<?php print t('Home'); ?>" />
      </a>

    <?php print render($page['header']); ?>
    <div id="navigation" class="slide-menu">
      <?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation">
          <?php
          // This code snippet is hard to modify. We recommend turning off the
          // "Main menu" on your sub-theme's settings form, deleting this PHP
          // code block, and, instead, using the "Menu block" module.
          // @see http://drupal.org/project/menu_block
          print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>

      <?php print render($page['navigation']); ?>

    </div><!-- /#navigation -->
  </div>
</header>
<div id="page">
  <?php if ($page['splash']): ?>
    <div id="splash">
      <div id="splash-inner">
      <?php print render($page['splash']); ?>
        </div>
      <div class="border"></div>

    </div>
    <?php endif; ?>
  
    <?php if(!$is_front): ?>
      <?php if ($title): ?>
        <div class="main-title"><h1 class="main-inner"><?php print $title; ?></h1></div>
      <?php endif; ?>
    <?php endif; ?>
    <div id="main">
      <div class="main-content">
      <div id="content" class="column" role="main">
        <?php print render($page['highlighted']); ?>
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>
        <?php print $messages; ?>
        <?php //print render($tabs); ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div><!-- /#content -->

      <?php
        // Render right sidebar to see if there's anything in them.
        $sidebar_second = render($page['sidebar_second']);
      ?>

      <?php if ($sidebar_second): ?>
        <aside class="sidebars">
          <?php print $sidebar_second; ?>
        </aside><!-- /.sidebars -->
      <?php endif; ?>
      </div>
    </div>

    <div class="content-bottom">
      <?php print render($page['content_bottom']); ?>
    </div>

  </div><!-- /#main -->

</div><!-- /#page -->

<?php print render($page['footer']); ?>
<?php print render($page['bottom']); ?>
