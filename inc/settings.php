<?php

add_action('admin_menu', 'db_promo_register_admin_actions');

function db_promo_register_admin_actions()
{
    add_submenu_page('options-general.php', 'Register popup', 'On register popup', 'manage_options', 'db-promo-on-register', 'db_promo_on_register_render_admin_page');
}

function db_promo_on_register_render_admin_page() {
  ?>
    <h1>First page visit modal window</h1>
    
    <form method="post" action="options.php">
      <?php settings_fields('db_promo_on_register-settings-group');?>
      <?php do_settings_sections('db_promo_on_register-settings-group');?>
      <table class="form-table">
          <tr valign="top">
          <th scope="row"><?php echo __('Header'); ?>:</th>
          <td><input type="text" name="db-promo-main-header" value="<?php echo esc_attr(get_option('db-promo-main-header')); ?>" /></td>
          </tr>

          <tr valign="top">
          <th scope="row"><?php echo __('Second header'); ?>:</th>
          <td><input type="text" name="db-promo-second-header" value="<?php echo esc_attr(get_option('db-promo-second-header')); ?>" /></td>
          </tr>

          <tr valign="top">
          <th scope="row"><?php echo __('Time') ?> (<?php echo __('in hours') ?>):</th>
          <td><input type="number" min="1" max="1200" name="db-promo-time" value="<?php echo esc_attr(get_option('db-promo-time')); ?>" /></td>
          </tr>
      </table>

      <?php submit_button();?>
    </form>
  <?php
}

function db_promo_on_register_register_settings()
{
    register_setting('db_promo_on_register-settings-group', 'db-promo-main-header');
    register_setting('db_promo_on_register-settings-group', 'db-promo-second-header');
    register_setting('db_promo_on_register-settings-group', 'db-promo-time');
}
add_action('admin_init', 'db_promo_on_register_register_settings', $priority = 10, $accepted_args = 1);
