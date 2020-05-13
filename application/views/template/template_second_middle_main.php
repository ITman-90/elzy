<div id="index_second_middle_novelty" class="container container_override">

    <?php

    $novelty_count = 0;
    $loops = 3;


    foreach($novelty_list as $novelty)
    {
        $category_name = '';

        foreach($sub_category_list as $category)
        {
            if($category->sub_category_id == $novelty->category_id)
            {
                $category_name = $category->category_name;
                $parent_category_url = $category->parent_category_url;
                $sub_category_url = $category->sub_category_url;
            }
        }

        ?>

        <div class="span4 override_margin-left novelty_block">

            <div class="row override_margin-left new_img">
                <img src="<?php echo base_url();?>public/img/index_page/new.png">
            </div>

            <div class="row override_margin-left">
                <p class="novelty_title text-center"><a href="<?php echo base_url();?>catalog/<?php echo $parent_category_url;?>/<?php echo $sub_category_url;?>"><?php echo $category_name;?></a></p>
            </div>

            <div class="row override_margin-left">

                <div class="span2 override_margin-left novelty_img">

                    <a href="<?php echo base_url();?>catalog/<?php echo $parent_category_url;?>/<?php echo $sub_category_url;?>/<?php echo $novelty->product_url;?>"><img src="<?php echo base_url();?>public/img/products_images/<?php echo $novelty->category_id;?>/id_<?php echo $novelty->product_id;?>.png"></a>

                </div>

                <div class="span2 override_margin-left novelty_description">

                    <div class="row override_margin-left novelty_text_block">
                        <p class="text-left novelty_product_name"><?php echo $novelty->product_name;?></p>

                        <?php

                        $novelty_price = '';

                        foreach($novelty_price_list as $novelty_product_price)
                        {

                            if($novelty_product_price->product_id == $novelty->product_id)
                            {
                                $novelty_price = $novelty_product_price->first_shop_product_price;
                            }

                        }

                        ?>

                        <p class="text-left novelty_product_price"><?php echo $novelty_price;?>.00 Р.</p>

                    </div>

                    <div class="row override_margin-left text-right novelty_buy_block">

                        <a href="<?php echo base_url();?>catalog/<?php echo $parent_category_url;?>/<?php echo $sub_category_url;?>/<?php echo $novelty->product_url;?>" class="btn btn-primary novelty_buy_btn">Купить<span><i class="icon-shopping-cart"></i></span></a>

                    </div>

                </div>

            </div>

        </div>

    <?php

        $novelty_count++;

        if($loops == $novelty_count)
        {
            break;
        }

    }

    ?>

</div>

<div id="index_second_middle_sale" class="container container_override">

    <?php

    $sale_count = 0;

    foreach($sale_list as $sale)
    {
        $category_name = '';

        foreach($sub_category_list as $category)
        {
            if($category->sub_category_id == $sale->category_id)
            {
                $category_name = $category->category_name;
                $parent_category_url = $category->parent_category_url;
                $sub_category_url = $category->sub_category_url;
            }
        }

        ?>

        <div class="span4 override_margin-left sale_block">

            <div class="row override_margin-left sale_img">
                <img src="<?php echo base_url();?>public/img/index_page/sale.png">
            </div>

            <div class="row override_margin-left">
                <p class="sale_title text-center"><a href="<?php echo base_url();?>catalog/<?php echo $parent_category_url;?>/<?php echo $sub_category_url;?>"><?php echo $category_name;?></a></p>
            </div>



            <div class="row override_margin-left">

                <div class="span2 override_margin-left sale_image">

                    <a href="<?php echo base_url();?>catalog/<?php echo $parent_category_url;?>/<?php echo $sub_category_url;?>/<?php echo $sale->product_url;?>"><img src="<?php echo base_url();?>public/img/products_images/<?php echo $sale->category_id;?>/id_<?php echo $sale->product_id;?>.png"></a>

                </div>

                <div class="span2 override_margin-left sale_description">


                    <div class="row override_margin-left sale_text_block">
                        <p class="text-left sale_product_name"><?php echo $sale->product_name;?></p>

                        <?php

                        $sale_price = '';

                        foreach($sale_price_list as $sale_product_price)
                        {

                            if($sale_product_price->product_id == $sale->product_id)
                            {
                                $sale_price = $sale_product_price->first_shop_product_price;
                            }

                        }

                        ?>

                        <p class="text-left sale_product_price"><?php echo $sale_price;?>.00 Р.</p>

                    </div>

                    <div class="row override_margin-left text-right sale_buy_block">

                        <a href="<?php echo base_url();?>catalog/<?php echo $parent_category_url;?>/<?php echo $sub_category_url;?>/<?php echo $sale->product_url;?>" class="btn btn-primary sale_buy_btn">Купить<span><i class="icon-shopping-cart"></i></span></a>

                    </div>

                </div>

            </div>

        </div>

    <?php

        $sale_count++;

        if($loops == $sale_count)
        {
            break;
        }

    }

    ?>

</div>

<div id="index_news_container" class="container container_override">

    <div class="row override_margin-left">

        <h3>Новости</h3>

    </div>

    <div class="row override_margin-left">

        <div class="span5 override_margin-left index_news_block">

            <p class="index_news_text">

                <img class="index_news_img" src="<?php echo base_url();?>public/img/no_image.gif">
                <strong>Title</strong><br><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non nunc facilisis, placerat elit in, ultrices quam. Aenean ultrices, quam ut consectetur imperdiet, quam velit tincidunt ipsum, nec vestibulum dolor diam id justo.<br> Curabitur vitae cursus odio. Pellentesque at felis sit amet leo laoreet consequat. Aenean aliquet eleifend magna non posuere. Sed quis sodales est. Mauris urna arcu, accumsan et faucibus volutpat, rutrum non libero. Vivamus ultricies volutpat justo, id lacinia ipsum tristique ac.

            </p>

        </div>

        <div class="span5 override_margin-left index_news_block">

            <p class="index_news_text">

                <img class="index_news_img" src="<?php echo base_url();?>public/img/no_image.gif">
                <strong>Title</strong><br><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non nunc facilisis, placerat elit in, ultrices quam. Aenean ultrices, quam ut consectetur imperdiet, quam velit tincidunt ipsum, nec vestibulum dolor diam id justo.<br> Curabitur vitae cursus odio. Pellentesque at felis sit amet leo laoreet consequat. Aenean aliquet eleifend magna non posuere. Sed quis sodales est. Mauris urna arcu, accumsan et faucibus volutpat, rutrum non libero. Vivamus ultricies volutpat justo, id lacinia ipsum tristique ac.

            </p>

        </div>

        <div class="span5 override_margin-left index_news_block">

            <p class="index_news_text">

                <img class="index_news_img" src="<?php echo base_url();?>public/img/no_image.gif">
                <strong>Title</strong><br><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non nunc facilisis, placerat elit in, ultrices quam. Aenean ultrices, quam ut consectetur imperdiet, quam velit tincidunt ipsum, nec vestibulum dolor diam id justo.<br> Curabitur vitae cursus odio. Pellentesque at felis sit amet leo laoreet consequat. Aenean aliquet eleifend magna non posuere. Sed quis sodales est. Mauris urna arcu, accumsan et faucibus volutpat, rutrum non libero. Vivamus ultricies volutpat justo, id lacinia ipsum tristique ac.

            </p>

        </div>

    </div>

</div>