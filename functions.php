<?php
include('info.php');

//注册导航
register_nav_menus(
      array(
       'main' => __( '主菜单导航' )
      )
   );

//限制直接进入后台登入
add_action('login_enqueue_scripts','login_protection');
   function login_protection(){
       if($_GET['root'] != 'lynth_')  header('Location: /');
   }
?>
