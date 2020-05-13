<div class="container container_override main_content_container_background">

<div id="contacts_row" class="row override_margin-left delivery_row_wrap">

<div class="span3 override_margin-left information_left_menu_wrap">

    <p class="information_left_menu_title">Информация</p>

    <?php

    $this->load->view('template/template_information_menu');

    ?>

</div>

<div class="span8 information_news_wrap">

    <div class="row override_margin-left breadcrumbs_block_wrap">

        <ul class="breadcrumbs_block inline">
            <li><a href="http://elzy.ru/" class="inactive_breadcrumb">Главная</a> <span class="divider_breadcrumb">»</span></li>
            <li class="active_breadcrumb">Контакты</li>
        </ul>

    </div>

    <div class="row override_margin-left information_news_list">

        <div class="row override_margin-left information_news_title_wrap">

            <p class="information_news_title">Контакты</p>

        </div>



        <?php

        $this->load->view('send_ask_form');

        ?>

        <br>
        <br>

    </div>

</div>

</div>

</div>