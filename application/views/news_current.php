<div class="container container_override main_content_container_background">

<div id="news_row" class="row override_margin-left news_row_wrap">

<div class="span3 override_margin-left information_left_menu_wrap">

    <p class="information_left_menu_title">Информация</p>

    <?php

    $this->load->view('template/template_information_menu');

    ?>
</div>

<div class="span8 information_news_wrap">

    <div class="row override_margin-left breadcrumbs_block_wrap">

        <ul class="breadcrumbs_block inline">
            <li><a href="<?php echo base_url();?>" class="inactive_breadcrumb">Главная</a> <span class="divider_breadcrumb">»</span></li>
            <li><a href="<?php echo base_url();?>news" class="inactive_breadcrumb">Новости</a> <span class="divider_breadcrumb">»</span></li>
            <li class="active_breadcrumb"><?php echo $news_page->title;?></li>
        </ul>

    </div>

    <div class="row override_margin-left information_news_list">

        <div class="row override_margin-left information_news_current_title_wrap">

            <p class="information_news_current_title"><?php echo $news_page->title;?></p>

        </div>

        <div class="row override_margin-left information_news_current_block_wrap">

            <div class="row override_margin-left information_news_block">

                    <div class="row override_margin-left information_news_current_block_text_date_wrap">
                        <p class="information_news_current_block_text_date"><?php echo date_create($news_page->news_date)->Format('d.m.y');?></p>
                    </div>

                    <div class="row override_margin-left information_news_current_block_img_wrap">
                        <img class="information_news_current_block_img" src="<?php echo base_url();?>public/img/index_page/news_big_<?php echo $news_page->id;?>.png" alt="<?php echo $news_page->title;?>">
                    </div>

                    <div class="row override_margin-left information_news_current_block_text_body_wrap">
                        <p class="information_news_current_block_text_body"><?php echo $news_page->body_new;?></p>
                    </div>

            </div>

        </div>

    </div>

</div>

</div>

</div>