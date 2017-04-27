<?php
/*
Template Name: Home Page
*/
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url') ?>/images/favicon.ico" media="screen" />
</head>
<?php
// 抓取必应每日背景图
$str=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
if(preg_match("/<url>(.+?)<\/url>/ies",$str,$matches)){
  $imgurl='http://cn.bing.com'.$matches[1];
};
?>
<style media="screen">
*{margin: 0;padding: 0}body{font: 14px/1.5 'Microsoft YaHei',arial,tahoma,\5b8b\4f53,sans-serif;background: #fff url('<?php echo $imgurl ?>') no-repeat fixed center;background-size: cover}.content{max-width: 500px;margin: 100px auto auto auto;padding: 0 20px;text-align: center;line-height: 30px;animation: fade-in;animation-duration: 1s;-webkit-animation: fade-in 1s}@keyframes fade-in{0%{opacity: 0}40%{opacity: 0}100%{opacity: 1}}@-webkit-keyframes fade-in{0%{opacity: 0}40%{opacity: 0}100%{opacity: 1}}.logo{width: 150px;height: 150px;margin: 0 auto;margin-bottom: 30px}.logo img{width: 100%;height: 100%;border-radius: 50%}h2{height:100px;font-weight: bolder;color: #fff;overflow: hidden;margin-bottom: 20px}.nav a{font-size: 18px;color: #fff!important;padding: 0 5px;text-decoration: none}.binginfo{color:#000;font-weight:800;position:fixed;bottom:30px;right:30px;}.binginfo a{text-decoration: none;color:#000}.binginfo a:hover{text-decoration: underline};
</style>

<body>
  <div class="content">
      <div class="logo">
        <img src="<?php bloginfo('template_url') ?>/images/bear.jpg">
      </div>
      <h2 id="head"> ... </h2>
      <p class="nav">
        <a class="small" href="./archives">Enter</a><br>
      </p>
  </div>
  <p class="binginfo">一<a href="http://cn.bing.com/"> 必应 </a>每日背景图</p>


  <script type="text/javascript">window.onerror = function (e) {alert(e);}</script>
  <script src="<?php bloginfo('template_url') ?>/js/random.js" charset="utf-8"></script>

</body>

</html>
