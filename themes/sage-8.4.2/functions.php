<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/wp_bootstrap_navwalker.php' // Bootstrap nav walker
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

//Admin Menu
/** Step 2 (from text above). */
add_action('admin_menu', 'add_global_custom_options');

/** Step 1. */
function add_global_custom_options() {
  add_options_page(
      'Global Custom Options',
      'Global Custom Options',
      'manage_options',
      'functions',
      'global_custom_options'
  );
}

/** Step 3. */
function global_custom_options() { ?>
  <div class="wrap">
    <h2>Theme Options</h2>
    <form method="post" action="options.php">
      <?php wp_nonce_field('update-options') ?>
      <p><strong>Twitter ID:</strong><br />
        <input type="text" name="twitterid" size="45" value="<?php echo get_option('twitterid'); ?>" />
      </p>
      <input type="hidden" name="action" value="update" />
      <p><strong>Facebook ID:</strong><br />
        <input type="text" name="fb_link" size="45" value="<?php echo get_option('fb_link'); ?>" />
      </p>
      <p><input type="submit" name="Submit" value="Store Options" /></p>
      <input type="hidden" name="action" value="update" />
      <input type="hidden" name="page_options" value="twitterid,fb_link" />
    </form>
  </div>
  <?php
}