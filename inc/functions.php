<?php

function dd($data)
{
    highlight_string("<?php\n " . var_export($data, true) . "?>");
    echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove() ; </script>';
    // die();
}

/**
 * Some override native wp function `is_user_logged_in`, but if is authenticated, returns user
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

function db_promo_on_register_render_popup() {
  ?>
  <div class="modal fade show" id="prise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style="display: block; padding-right: 15px;">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body center">
      <p style="font-size: 32px; font-family: Proxima Nova Th; font-weight: 700; text-transform: uppercase;">ВНИМАНИЕ</p>
      <hr class="orange">
      <p style="font-size: 14px; font-family: Proxima Nova Lt; text-transform: uppercase; margin-top: -10px;">До конца рекламной акции осталось:</p>
        <div class="row">
          <div class="col-sm-4">
            <p class="timer_numb" id="hour">24</p>
            <p class="timer_text">часов</p>
          </div>
          
          <div class="col-sm-4">
            <p class="timer_numb" id="min">31</p>
            <p class="timer_text">минут</p>
          </div>
          
          <div class="col-sm-4">
            <p class="timer_numb" id="sec">42</p>
            <p class="timer_text">секунд</p>
          </div>
        </div>
      <a href="/registration"><button class="btn_prise_green">Получить подарок</button></a>
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
        dd($registred_date);
        db_promo_on_register_render_popup();
    }

}

add_action('wp_footer', 'db_promo_on_register_render');
