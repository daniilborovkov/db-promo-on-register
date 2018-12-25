<?php

function dd($data)
{
    highlight_string("<?php\n " . var_export($data, true) . "?>");
    echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove() ; </script>';
    // die();
}

/**
 * Some override native wp function `is_user_logged_in`, but if is authenticated and registration date pass needed time, returns user
 * @return mixed bool|WP_User
 */
function db_promo_on_register_check_auth()
{
    $user = wp_get_current_user();
    if ($user->exists()) {
        return $user;
    } else {
        return false;
    }
}

function db_promo_on_register_check_modal_needed($user_registered) {
  $now = strtotime('now');
  $deadline_hours = get_option( 'db-promo-time' );
  $deadline = strtotime("+ $deadline_hours hours", strtotime($user_registered));
  if ($now < $deadline) {
    return $deadline - $now;
  } else {
    return false;
  }
}

function db_promo_on_register_render_popup() {
  ?>
  <div class="modal fade show" id="db_promo_on_register_prise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style=" padding-right: 15px;">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body center">
      <p style="font-size: 32px; font-weight: 700; text-transform: uppercase;">
        <?php echo esc_attr(get_option('db-promo-main-header')); ?>
      </p>
      <hr class="orange">
      <p style="font-size: 14px; text-transform: uppercase; margin-top: -10px;"><?php echo esc_attr(get_option('db-promo-second-header')); ?></p>
        <div class="row">
          <div class="col-sm-4">
            <p class="timer_numb" id="hour"></p>
            <p class="timer_text">часов</p>
          </div>
          
          <div class="col-sm-4">
            <p class="timer_numb" id="min"></p>
            <p class="timer_text">минут</p>
          </div>
          
          <div class="col-sm-4">
            <p class="timer_numb" id="sec"></p>
            <p class="timer_text">секунд</p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  <?php
}

function db_promo_on_register_render()
{
    $user = db_promo_on_register_check_auth();
    if ($user != false) {
        $registred_date = db_promo_on_register_check_auth()->data->user_registered;
        $deadline_left = db_promo_on_register_check_modal_needed($registred_date);
        if ($deadline_left != false && $deadline_left > 0) {
          db_promo_on_register_render_popup();
        }   
    }

}

add_action('wp_footer', 'db_promo_on_register_render');
