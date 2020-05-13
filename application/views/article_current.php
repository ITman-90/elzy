
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
                    <li><a href="<?php echo base_url();?>articles" class="inactive_breadcrumb">Статьи</a> <span class="divider_breadcrumb">»</span></li>
                    <li class="active_breadcrumb"><?php echo $article->title;?></li>
                </ul>

            </div>

            <div class="row override_margin-left information_articles_list">

                <div class="row override_margin-left information_articles_current_title_wrap">

                    <p class="information_articles_current_title"><?php echo $article->title;?></p>

                </div>

                <div class="row override_margin-left information_articles_current_block_wrap">

                    <div class="row override_margin-left information_articles_block">


                        <?php echo $article->body_article;?>


                    </div>

                </div>

            </div>

            <div class="row override_margin-left information_articles_current_links_block">

                <div class="row override_margin-left information_articles_current_links_title_wrap">
                    <p class="information_articles_current_links_title">Так же вам будет интересно:</p>
                </div>
                <?php
                foreach($articles as $next_article)
                {
                ?>
                <div class="span3 information_articles_current_links_wrap">

                    <div class="span1 override_margin-left">
                        <a href="<?php echo base_url();?>articles/<?php echo $next_article->title_url;?>" class="information_articles_current_links_away_link"><img src="<?php echo base_url();?>public/img/index_page/article_<?php echo $next_article->id;?>_ico.png" alt="<?php echo $next_article->title;?>"></a>
                    </div>

                    <div class="span2 override_margin-left information_articles_current_links_text_wrap">
                        <p class="information_articles_current_links_text"><?php echo $next_article->title;?></p>
                        <a href="<?php echo base_url();?>articles/<?php echo $next_article->title_url;?>" class="information_articles_current_links_away_link">читать >></a>
                    </div>

                </div>
                <?php
                }
                ?>

            </div>

        </div>

    </div>

</div>