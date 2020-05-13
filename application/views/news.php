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
                    <li><a href="#" class="inactive_breadcrumb">Главная</a> <span class="divider_breadcrumb">»</span></li>
                    <li class="active_breadcrumb">Новости</li>
                </ul>

            </div>

            <div class="row override_margin-left information_news_list">

                <div class="row override_margin-left information_news_title_wrap">

                    <p class="information_news_title">Новости</p>

                </div>

                <div class="row override_margin-left information_news_block_wrap">
                    <?php
                    foreach($news as $new_page)
                    {
                    ?>
                    <div class="row override_margin-left information_news_block">

                        <div class="span3 override_margin-left information_news_block_img">
                            <a href="<?php echo base_url();?>news/<?php echo $new_page->title_url;?>"><img src="<?php echo base_url();?>public/img/index_page/news_foto<?php echo $new_page->id;?>.png" alt="<?php echo $new_page->title;?>"></a>
                        </div>

                        <div class="span5 override_margin-left information_news_block_text_wrap">

                            <div class="row override_margin-left information_news_block_text_date_wrap">
                                <p class="information_news_block_text_date"><?php echo date_create($new_page->news_date)->Format('d.m.y');?></p>
                            </div>

                            <div class="row override_margin-left information_news_block_text_title_wrap">
                                <a href="<?php echo base_url();?>news/<?php echo $new_page->title_url;?>" class="information_news_block_text_title"><?php echo $new_page->title;?></a>
                            </div>

                            <div class="row override_margin-left information_news_block_text_body_wrap">
                                <p class="information_news_block_text_body"><?php echo $new_page->preview;?></p>
                            </div>

                            <div class="row override_margin-left information_news_block_text_away_link_wrap">
                                <a href="<?php echo base_url();?>news/<?php echo $new_page->title_url;?>" class="information_news_block_text_away_link"><span class="link_forest">Подробнее</span> >></a>
                            </div>

                        </div>

                    </div>
                    <?php
                    }
                    ?>
                </div>

            </div>

        </div>

    </div>

</div>