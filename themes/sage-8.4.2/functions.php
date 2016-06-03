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

// Register Custom Post Type
function work_custom_post_type() {

  $labels = array(
      'name'                  => _x( 'Works', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Work', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Work', 'text_domain' ),
      'name_admin_bar'        => __( 'Work', 'text_domain' ),
      'archives'              => __( 'Work Archives', 'text_domain' ),
      'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
      'all_items'             => __( 'All Items', 'text_domain' ),
      'add_new_item'          => __( 'Add New Item', 'text_domain' ),
      'add_new'               => __( 'Add New', 'text_domain' ),
      'new_item'              => __( 'New Item', 'text_domain' ),
      'edit_item'             => __( 'Edit Item', 'text_domain' ),
      'update_item'           => __( 'Update Item', 'text_domain' ),
      'view_item'             => __( 'View Item', 'text_domain' ),
      'search_items'          => __( 'Search Item', 'text_domain' ),
      'not_found'             => __( 'Not found', 'text_domain' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
      'featured_image'        => __( 'Featured Image', 'text_domain' ),
      'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
      'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
      'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
      'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
      'items_list'            => __( 'Items list', 'text_domain' ),
      'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
      'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
  );
  $args = array(
      'label'                 => __( 'Work', 'text_domain' ),
      'description'           => __( 'Examples of my work', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
      'taxonomies'            => array( 'category', 'post_tag' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-hammer',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
  );
  register_post_type( 'work', $args );

}
add_action( 'init', 'work_custom_post_type', 0 );