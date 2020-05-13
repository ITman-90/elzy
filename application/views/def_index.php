

<div class="container main_content_container_background container_override">
    <div class="row override_margin-left middle_block">

        <div class="span6">
            <div class="center"><img src="<?php echo base_url();?>public/img/index_page/main_foto.jpg" alt=""></div>
        </div>
        <div class="span6">
            <div>
                <div class="main_middle_title">Наши преимущества</div>
                <div class="hr_custom"></div>
                <div class="main_middle_title_h2">Удобная доставка</div>
                <div class="main_middle_text">Мы стараемся сделать так, чтобы наши покупатели смогли получить наши товары удобным для них способом.</div>
                <div class="main_middle_title_h2">Комфортный самовывоз</div>
                <div class="main_middle_text">Если Вам удобнее приехать за заказом самостоятельно, мы с удовольствием пойдём Вам навстречу.</div>

                <div class="main_middle_title_h2">Гарантия качества</div>
                <div class="main_middle_text">Elzy гарантирует качество товаров приобретенных в нашем магазине.</div>

                <div class="main_middle_title">Новости</div>
                <div class="hr_custom"></div>

                <div class="news_block"><div class="news_img"><img src="<?php echo base_url();?>public/img/news/<?php echo $last_new->title_url;?>.jpg" alt="<?php echo htmlspecialchars($last_new->title);?>"></div>
                    <div class="news_block_text">
                        <div class="news_date"><?php echo date_create($last_new->news_date)->Format('d.m.Y');?></div>
                        <div class="news_title"><a href="<?php echo base_url();?>news/<?php echo $last_new->title_url;?>"><?php echo $last_new->title;?></a></div>

                        <div class="news_text"><?php echo $last_new->preview;?>  <a href="<?php echo base_url();?>news/<?php echo $last_new->title_url;?>" title="читать далее">&gt;&gt;</a> </div>
                    </div>
                </div>
                <div class="news_all"></div><a href="<?php echo base_url();?>news" title="Все новости"><span class="underline_class">Все новости</span> »</a></div>
        </div>
    </div>
</div>
</div>

<div class="container container_override main_content_container_background">

    <div class="row override_margin-left index_content_wrap">

        <div class="row override_margin-left inner-row">

                <div class="main_left_title">Хиты продаж</div>
                <div class="hr_custom bottom_notmal"></div>
        </div>

        <div class="row override_margin-left">

            <?php

            $max_count = 4;
            $count = 0;

            foreach($sale_list as $sale)
            {

                $count++;
                $is_last = ($count == $max_count);
                $data['product_cell'] = $sale;
                $data['is_last'] = $is_last;
                $this->load->view('template/product_cell',$data);

                if($is_last)
                {
                    break;
                }

            }

                $count = 0;

            ?>

        </div>

    </div>

    <div class="row override_margin-left br_block"></div>

    <div class="row override_margin-left index_content_wrap">


        <div class="row override_margin-left inner-row ">
            <div class="main_left_title">Новинки</div>
            <div class="hr_custom bottom_notmal"></div>
        </div>


        <div class="row override_margin-left new_products_wrap">

        <?php

        foreach($novelty_list as $novelty)
        {

            $count++;
            $is_last = ($count == $max_count);
            $data['product_cell'] = $novelty;
            $data['is_last'] = $is_last;

            $this->load->view('template/product_cell',$data);

            if($is_last)
            {
                break;
            }

        }

             $count = 0;

        ?>

    </div>

        <div class="bottom_notmal"></div>

</div>