<?php

$user_session_id = $this->session->userdata('session_id');

$user_session_id_data = array(
    'user_session_id' => $user_session_id
);

$user_session_id_data = json_encode($user_session_id_data);

$cart_item_count = $this->flexi_cart->cart_summary();

$cart_count = $cart_item_count['total_items'];

$cart_item_count = $this->flexi_cart->cart_summary();

$cart_summary = $cart_item_count['total'];
$cart_summary = substr($cart_summary, 0, -3);
$cart_summary = str_replace("&nbsp;", "", $cart_summary);
$cart_summary = str_replace(",", "", $cart_summary);
if ($seo_title=="") $seo_title = "Одежда для детей elzy.ru";
if ($seo_desc=="") $seo_desc = "Одежда для детей elzy.ru";
if ($seo_tags=="") $seo_tags = "Одежда для детей elzy.ru";
?>


<!DOCTYPE html>
<html lang="ru">
<head>

    <title><?php echo $seo_title;?></title>

    <?php echo link_tag('favicon.ico?v=2', 'shortcut icon', 'image/ico');?>

    <META name='description' content='<?php echo $seo_desc;?>'>

    <META name='keywords' content='<?php echo $seo_tags;?>'>

    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>

    <link href="<?php echo base_url();?>public/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>public/css/normalize.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>public/js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>public/css/bootstrap-select.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>public/css/styles.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url();?>public/js/jquery.js"></script>
    <script src="<?php echo base_url();?>public/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>public/js/fancybox/jquery.fancybox.js"></script>
    <script src="<?php echo base_url();?>public/js/jquery.validate.js"></script>
    <script src="<?php echo base_url();?>public/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url();?>public/js/jquery.hoverIntent.js"></script>
    <script src="<?php echo base_url();?>public/js/jquery.cycle2.js"></script>
    <script src="<?php echo base_url();?>public/js/jquery.form.js"></script>
    <script src="<?php echo base_url();?>public/js/mask.js"></script>
    <script src="<?php echo base_url();?>public/js/ac.js"></script>
    <script src="<?php echo base_url();?>public/js/scripts.js"></script>
    <script src="<?php echo base_url();?>public/js/scrool.js"></script>
</head>


<body>
<script type="text/javascript">

    $(document).ready(function(){

        var view_data = <?php echo $user_session_id_data;?>;
        var collate_data = <?php echo $user_session_id_data;?>;
        var bookmark_data = <?php echo $user_session_id_data;?>;

        get_view_data(view_data);

        get_collate_data(collate_data);

        get_bookmarks_data(bookmark_data);
    });

</script>



<div class="container main_content_container_background container_override">
    <div class="main_head">
        <div class="row override_margin-left main_content_wrap">
            <div class="span6">
                <div class="header_phones"><img src="<?php echo base_url();?>public/img/index_page/phone.png" alt=""> 8-800-700-57-58 <span class="pink">|</span> +7 (495) 604-10-29</div>
                <div class="header_mail"><img src="<?php echo base_url();?>public/img/index_page/email.png" alt=""> elzy@gmail.com</div>
                <div class="header_vk"><img src="<?php echo base_url();?>public/img/index_page/vk.png" alt=""> elzy_kids-shop</div>

            </div>
            <div class="span3 cart_top_wrap">
                <div class="row override_margin-left">
                    <div class="span1 override_margin-left cart_iconset">
                        <div class="row">
                            <a href="<?php echo base_url();?>cart" class="text-center" id="cart_count" title="Корзина товаров"><?php echo $cart_count;?></a>
                        </div>
                        <div class="row override_margin-left">
                            <a href="<?php echo base_url();?>cart" class="text-center" id="cart_icon" title="Корзина товаров">&nbsp;</a>
                        </div>
                    </div>
                    <div class="span1 override_margin-left cart_text_wrap">
                        <div class="row override_margin-left cart_title">
                            <a href="<?php echo base_url();?>cart">Корзина</a>
                        </div>
                        <div class="row override_margin-left">
                            <span id="cart_total_price"><span id="total_price"><?php echo $cart_summary;?></span> <img src="<?php echo base_url();?>public/img/index_page/rur_11.png" alt=""></span>
                        </div>
                        <div class="row override_margin-left cart_checkout_wrap">
                            <a href="<?php echo base_url();?>cart" id="cart_checkout">оформить заказ</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span3 head_decor_wrap">
                <img src="<?php echo base_url();?>public/img/index_page/head_decor.png" alt="">
            </div>
        </div>
    </div>
</div>
<div class="container main_content_container_background container_override">

    <div class="row override_margin-left header_menu">

        <div class="span3">
            <div class="center"><img src="<?php echo base_url();?>public/img/index_page/company_pin.png" alt="" class="header_menu_pin"> <a href="<?php echo base_url();?>company">О КОМПАНИИ</a></div>
        </div>
        <div class="span3">
            <div class="center"><img src="<?php echo base_url();?>public/img/index_page/boys_pin.png" alt="" class="header_menu_pin"> <a href="<?php echo base_url();?>catalog/boys">МАЛЬЧИКИ</a></div>
        </div>
        <div class="span3">
            <div class="center"><img src="<?php echo base_url();?>public/img/index_page/girls_pin.png" alt="" class="header_menu_pin"> <a href="<?php echo base_url();?>catalog/girls">ДЕВОЧКИ</a></div>
        </div>
        <div class="span3">
            <div class="center"><img src="<?php echo base_url();?>public/img/index_page/delivery_pin.png" alt="" class="header_menu_pin"> <a href="<?php echo base_url();?>delivery">ОПЛАТА И ДОСТАВКА</a></div>
        </div>

    </div>
</div>