<div class="container container_override main_content_container_background">

<div id="articles_row" class="row override_margin-left articles_row_wrap">

<div class="span3 override_margin-left information_left_menu_wrap">

    <p class="information_left_menu_title">Информация</p>

    <?php

    $this->load->view('template/template_information_menu');

    ?>

</div>

<div class="span8 information_articles_wrap">

    <div class="row override_margin-left breadcrumbs_block_wrap">

        <ul class="breadcrumbs_block inline">
            <li><a href="<?php echo base_url();?>" class="inactive_breadcrumb">Главная</a> <span class="divider_breadcrumb">»</span></li>
            <li class="active_breadcrumb">Статьи</li>
        </ul>

    </div>

    <div class="row override_margin-left information_articles_list">

        <div class="row override_margin-left information_articles_title_wrap">

            <p class="information_articles_title">Статьи</p>

        </div>

        <div class="row override_margin-left information_articles_block_wrap">
            <?php
            foreach($articles as $article)
                {
            ?>
            <div class="row override_margin-left information_articles_block">

                <div class="span3 override_margin-left information_articles_block_img">
                    <a href="<?php echo base_url();?>articles/<?php echo $article->title_url;?>"><img src="<?php echo base_url();?>public/img/index_page/article_<?php echo $article->id;?>.png" alt="<?php echo $article->title;?>"></a>
                </div>

                <div class="span5 override_margin-left information_articles_block_text_wrap">

                    <div class="row override_margin-left information_articles_block_text_title_wrap">
                        <a href="<?php echo base_url();?>articles/<?php echo $article->title_url;?>" class="information_news_block_text_title"><?php echo $article->title;?></a>
                    </div>

                    <div class="row override_margin-left information_articles_block_text_body_wrap">
                        <p class="information_articles_block_text_body"><?php echo $article->preview;?></p>
                    </div>

                    <div class="row override_margin-left information_articles_block_text_away_link_wrap">
                        <a href="<?php echo base_url();?>articles/<?php echo $article->title_url;?>" class="information_articles_block_text_away_link"><span class="link_forest">Подробнее</span> >></a>
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