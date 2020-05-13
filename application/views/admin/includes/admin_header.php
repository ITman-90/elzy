<?php
define("NM_URL", "http://elzy.ru/");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>ADMIN - ИНТЕРНЕТ-МАГАЗИН детской одежды "Elzy.ru".</title>

    <!-- Bootstrap include  -->
    <?php echo link_tag('favicon.ico', 'shortcut icon', 'image/ico');?>

    <?php echo link_tag('public/css/normalize.css');?>

    <?php echo link_tag('public/css/bootstrap.css');?>

    <?php echo link_tag('public/css/fileupload.css');?>

    <?php echo link_tag('public/js/ui/css/ui-lightness/jquery-ui-1.10.0.custom.css');?>

    <?php echo link_tag('public/css/styles.css');?>

    <?php echo link_tag('public/css/nivo-slider.css');?>

    <?php echo link_tag('public/css/jquery.jscrollpane.css');?>

    <script src="<?php echo base_url();?>public/js/jquery-9.1.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/ui/js/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/ui/js/jquery.ui.datepicker-ru.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/fancybox/jquery.fancybox.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/fileupload.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/admin_scripts.js" type="text/javascript"></script>

</head>
<body class="admin">

<div class="container">

    <div class="row" style="margin-left: 0px;">
        <blockquote>
            <p><strong><a href="<?php echo base_url();?>admin">Административная панель "Elzy.ru"</a></strong></p>
            <p style="margin: 0px 0px 5px 0px; font-size: 10pt;">Добро пожаловать <span style="text-decoration: underline;"><?php echo $this->session->userdata('acc_name');?></span></p>
            <?php

            if($this->session->userdata('logged_in') == TRUE)
            {
                echo "<a href='".base_url()."admin/loginin/logout' class='btn btn-danger btn-mini'>Выйти</a>";
            }


            ?>

        </blockquote>

    </div>

        <ul class="nav nav-pills">

            <?php

            $acc_group = $this->session->userdata('acc_group');

            //if($acc_group == 1)
            //{

                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" role="menu" data-toggle="dropdown" data-target="#" href="#">Пользователи</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a href="<?php echo base_url();?>admin/add_user">Добавить пользователя</a></li>
                        <li><a href="<?php echo base_url();?>admin/hide_user">Удалить пользователя</a></li>
                    </ul>
                </li>
            <?php

            //}

            ?>



            <?php
            if($acc_group == 1 or $acc_group == 2)
            {
                ?>

                <li class="dropdown">
                    <a class="dropdown-toggle" role="menu" data-toggle="dropdown" data-target="#" href="#">Продукты</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a href="<?php echo base_url();?>admin/add_product">Добавить продукт</a></li>
                        <li><a href="<?php echo base_url();?>admin/hide_product">Скрыть продукт</a></li>
                        <li><a href="<?php echo base_url();?>admin/list_product">Редактировать продукт</a></li>  <?php
                        if($acc_group == 1)
                        {
                        ?>
                        <li><a href="<?php echo base_url();?>admin/list_price_product">Редактировать цены</a></li>
                        <?php
                        }
                        ?>

                    </ul>
                </li>
            <?php
            }
            ?>
            <?php
            if($acc_group == 1 or $acc_group == 2)
            {
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" role="menu" data-toggle="dropdown" data-target="#" href="#">Цвета</a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                        <li><a href="<?php echo base_url();?>admin/add_color">Добавить цвет</a></li>
                        <li><a href="<?php echo base_url();?>admin/list_color">Редактировать цвет</a></li>
                        <li><a href="<?php echo base_url();?>admin/list_colors_product">Изображения продуктов в цвете</a></li>

                    </ul>
                </li>
            <?php
            }
            ?>


        </ul>


</div>
