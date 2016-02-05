<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * A QUICK OVERVIEW OF DRUPAL THEMING
 *
 *   The default HTML for all of Drupal's markup is specified by its modules.
 *   For example, the comment.module provides the default HTML markup and CSS
 *   styling that is wrapped around each comment. Fortunately, each piece of
 *   markup can optionally be overridden by the theme.
 *
 *   Drupal deals with each chunk of content using a "theme hook". The raw
 *   content is placed in PHP variables and passed through the theme hook, which
 *   can either be a template file (which you should already be familiary with)
 *   or a theme function. For example, the "comment" theme hook is implemented
 *   with a comment.tpl.php template file, but the "breadcrumb" theme hooks is
 *   implemented with a theme_breadcrumb() theme function. Regardless if the
 *   theme hook uses a template file or theme function, the template or function
 *   does the same kind of work; it takes the PHP variables passed to it and
 *   wraps the raw content with the desired HTML markup.
 *
 *   Most theme hooks are implemented with template files. Theme hooks that use
 *   theme functions do so for performance reasons - theme_field() is faster
 *   than a field.tpl.php - or for legacy reasons - theme_breadcrumb() has "been
 *   that way forever."
 *
 *   The variables used by theme functions or template files come from a handful
 *   of sources:
 *   - the contents of other theme hooks that have already been rendered into
 *     HTML. For example, the HTML from theme_breadcrumb() is put into the
 *     $breadcrumb variable of the page.tpl.php template file.
 *   - raw data provided directly by a module (often pulled from a database)
 *   - a "render element" provided directly by a module. A render element is a
 *     nested PHP array which contains both content and meta data with hints on
 *     how the content should be rendered. If a variable in a template file is a
 *     render element, it needs to be rendered with the render() function and
 *     then printed using:
 *       <?php print render($variable); ?>
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. With this file you can do three things:
 *   - Modify any theme hooks variables or add your own variables, using
 *     preprocess or process functions.
 *   - Override any theme function. That is, replace a module's default theme
 *     function with one you write.
 *   - Call hook_*_alter() functions which allow you to alter various parts of
 *     Drupal's internals, including the render elements in forms. The most
 *     useful of which include hook_form_alter(), hook_form_FORM_ID_alter(),
 *     and hook_page_alter(). See api.drupal.org for m]ore information about
 *     _alter functions.
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   If a theme hook uses a theme function, Drupal will use the default theme
 *   function unless your theme overrides it. To override a theme function, you
 *   have to first find the theme function that generates the output. (The
 *   api.drupal.org website is a good place to find which file contains which
 *   function.) Then you can copy the original function in its entirety and
 *   paste it in this template.php file, changing the prefix from theme_ to
 *   drupaldelphia_. For example:
 *
 *     original, found in modules/field/field.module: theme_field()
 *     theme override, found in template.php: drupaldelphia_field()
 *
 *   where drupaldelphia is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_field() function.
 *
 *   Note that base themes can also override theme functions. And those
 *   overrides will be used by sub-themes unless the sub-theme chooses to
 *   override again.
 *
 *   Zen core only overrides one theme function. If you wish to override it, you
 *   should first look at how Zen core implements this function:
 *     theme_breadcrumbs()      in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called theme hook suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node--forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and theme hook suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440 and http://drupal.org/node/1089656
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function drupaldelphia_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  drupaldelphia_preprocess_html($variables, $hook);
  drupaldelphia_preprocess_page($variables, $hook);
}
// */
/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function drupaldelphia_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
*/

/**
 * Override or insert variables into the node templates.
 *
 * @param array
 *   $variables
 *   An array of variables to pass to the theme template.
 * @param string
 *   $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function drupaldelphia2015_preprocess_node(&$variables, $hook) {
  // Manipulating current user and date.
  $created  = $variables['created'];
  // Setting some variables.
  $variables['date'] = drupaldelphia2015_nicetime($created);
}


/**
 * Override or insert variables into the comment templates.
 *
 * @param array
 *   $variables
 *   An array of variables to pass to the theme template.
 * @param string
 *   $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
function drupaldelphia2015_preprocess_comment(&$variables, $hook) {
  $variables['submitted']  = '<time pubdate datetime="';
  $variables['submitted'] .= format_date($variables['comment']->created, 'custom', 'c') . '">';
  $variables['submitted'] .= drupaldelphia2015_nicetime($variables['comment']->created) . '</time>';
}

/**
 * Override or insert variables into the region templates.
 *
 * @param array
 *   $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function drupaldelphia_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
*/

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function drupaldelphia_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
*/

/**
 * Implements hook_form_alter().
 */
function drupaldelphia2015_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'comment_node_news_form') {
    // Getting language.
    $lang = $form['comment_body']['#language'];
    // Add a placeholder to comment.
    $form['comment_body'][$lang]['0']['value']['#attributes']['placeholder'] = t('Leave a comment...');
    // Unsetting the comment title.
    unset($form['comment_body'][$lang]['0']['value']['#title']);
    // Get current user id.
    global $user;
    $uid      = $user->uid;
    $name     = $user->name;
    $form['author']['_author']['#markup'] = t('Signed in as ') . l($name, 'user/' . $uid) . '</span>';
    unset($form['author']['_author']['#title']);
    // Put this on the bottom of the form;
    $form['author']['#weight'] = $form['comment_body'][$lang]['0']['value']['#weight'] + '1';
    return $form;
  }
}

/**
 * Formats dates like facebook.
 *
 * @param string
 *   $date
 *   timestamp
 *
 * @return string
 *   Nicely formatted date string.
 */
function drupaldelphia2015_nicetime($date) {
  if (empty($date)) {
    return "No date provided";
  }
  $periods = array(
    "second",
    "minute",
    "hour",
    "day",
    "week",
    "month",
    "year",
    "decade",
  );
  $lengths   = array("60", "60", "24", "7", "4.35", "12", "10");
  $now       = time();
  $unix_date = date($date);
  // Check validity of date.
  if (empty($unix_date)) {
    return "Bad date";
  }

  // Is it future date or past date.
  if ($now > $unix_date) {
    $difference = $now - $unix_date;
    $tense      = "ago";
  }
  else {
    $difference = $unix_date - $now;
    $tense      = "from now";
  }

  for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
    $difference /= $lengths[$j];
  }

  $difference = round($difference);

  if ($difference != 1) {
    $periods[$j] .= "s";
  }
  return "$difference $periods[$j] {$tense}";
}
