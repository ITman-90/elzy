
<div class="container main_content_container_background container_override">

    <div class="row override_margin-left middle_content_wrap">

        <div class="span3 override_margin-left catalog_left_menu">

            <div class="row override_margin-left">

                <p class="catalog_header_text">Каталог</p>

            </div>

            <div class="row override_margin-left catalog_parent_category_list_wrap">

                <ul class="unstyled">

                    <?php

                    foreach($parent_category_list as $parent)
                    {

                        if($parent->parent_category_id == 4 || $parent->parent_category_id == 8)
                        {
                            ?>

                            <li class="catalog_parent_category_fe_wrap">
                                <div class="row override_margin-left">

                                    <div class="span1 override_margin-left catalog_parent_category_icon_wrap">
                                        <img src="<?php echo base_url();?>public/img/index_page/ico-list.png" alt="">
                                    </div>

                                    <div class="span1 catalog_parent_category_fe_link">
                                        <a href="<?php echo base_url();?>catalog/<?php echo $parent->parent_category_url;?>" class="parent_category_link" data-parent-id="<?php echo $parent->parent_category_id;?>"><?php echo $parent->category_name;?></a>
                                    </div>

                                    <div class="span1 override_margin-left catalog_parent_category_fe_arrow_icon_wrap">
                                        <img src="<?php echo base_url();?>public/img/index_page/menu_arrow.png" alt="">
                                    </div>

                                </div>
                            </li>

                        <?php
                        }
                        elseif($parent->parent_category_id == 10)
                        {
                            ?>

                            <li class="catalog_parent_category_last_child_wrap">
                                <div class="row override_margin-left">

                                    <div class="span1 override_margin-left catalog_parent_category_icon_wrap">
                                        <img src="<?php echo base_url();?>public/img/index_page/ico-list.png" alt="">
                                    </div>

                                    <div class="span1 catalog_parent_category_link">
                                        <a href="<?php echo base_url();?>catalog/<?php echo $parent->parent_category_url;?>" class="parent_category_link" data-parent-id="<?php echo $parent->parent_category_id;?>"><?php echo $parent->category_name;?></a>
                                    </div>

                                    <div class="span1 override_margin-left catalog_parent_category_arrow_icon_wrap">
                                        <img src="<?php echo base_url();?>public/img/index_page/menu_arrow.png" alt="">
                                    </div>

                                </div>
                            </li>

                        <?php
                        }
                        else
                        {
                            ?>

                            <li class="catalog_parent_category_wrap">
                                <div class="row override_margin-left">

                                    <div class="span1 override_margin-left catalog_parent_category_icon_wrap">
                                        <img src="<?php echo base_url();?>public/img/index_page/ico-list.png" alt="">
                                    </div>

                                    <div class="span1 catalog_parent_category_link">
                                        <a href="<?php echo base_url();?>catalog/<?php echo $parent->parent_category_url;?>" class="parent_category_link" data-parent-id="<?php echo $parent->parent_category_id;?>"><?php echo $parent->category_name;?></a>
                                    </div>

                                    <div class="span1 override_margin-left catalog_parent_category_arrow_icon_wrap">
                                        <img src="<?php echo base_url();?>public/img/index_page/menu_arrow.png" alt="">
                                    </div>

                                </div>
                            </li>

                        <?php
                        }

                    }

                    ?>

                </ul>

                <div class="row override_margin-left sub_category_menu">

                    <div class="row override_margin-left header_parent_category"></div>


                    <div class="row override_margin-left subcategory_list_wrap">

                        <ul class="unstyled subcategory_list"></ul>

                    </div>

                    <div class="row override_margin-left subcategory_img"></div>


                </div>

            </div>

        </div>

        <div class="span9 override_margin-left cart_wrap">

            <div class="row override_margin-left breadcrumbs_block_wrap">

                <ul class="breadcrumbs_block inline">
                    <li><a href="http://elzy.ru/" class="inactive_breadcrumb">Главная</a> <span class="divider_breadcrumb">»</span></li>
                    <li class="active_breadcrumb">Заявка принята</li>
                </ul>

            </div>

            <br>


            <div class="row override_margin-left cart_empty_wrap" style="display: block;">

                <div class="row override_margin-left">

                    <p class="cart_sub_title"><strong>Заявка принята.</strong></p>

                    <p class="cart_sub_title">Спасибо , ваша заявка принята!</p>
                    <p class="cart_sub_title">В ближайшее время менеджер свяжется с Вами.</p>

                </div>

            </div>


            <div class="row override_margin-left cart_content_wrap">


            </div>

        </div>
    </div>
</div>