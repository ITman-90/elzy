

<?php
    if ($is_last)
    {
    ?>
    <div class="span3 override_margin-left hit_product_last_wrap">
    <?php

    }
    else
    {

    ?>
    <div class="span3 override_margin-left hit_product_wrap">

        <?php

        }
        $current_parent_category_url = '';
        $current_sub_category_url = '';

        foreach($sub_category_list as $sub_category)
        {

            if($product_cell->category_id == $sub_category->sub_category_id)
            {
                $current_sub_category_url = $sub_category->sub_category_url;

                $current_parent_category_id = $sub_category->parent_category_id;

                foreach($parent_category_list as $parent_category)
                {
                    if($parent_category->parent_category_id == $current_parent_category_id)
                    {
                        $current_parent_category_url = $parent_category->parent_category_url;
                    }
                }
            }
        }

        ?>

        <div class="row override_margin-left hit_product_block">



                <a href="<?php echo base_url();?>catalog/<?php echo $current_parent_category_url;?>/<?php echo $current_sub_category_url;?>/<?php echo $product_cell->product_url;?>">
                    <img src="<?php echo base_url();?>public/img/products/<?php echo $product_cell->product_card_model_name;?>_prod_view.jpg">
                </a>

        </div>
        <div class="row override_margin-left hit_product_name_wrap">

            <?php

            if($product_cell->product_card_name == null)
            {
                ?>
                <div class="sub_category_product_title_block"><a href="<?php echo base_url();?>catalog/<?php echo $current_parent_category_url;?>/<?php echo $current_sub_category_url;?>/<?php echo $product_cell->product_url;?>" class="sub_category_product_title"><?php echo Client_Shop_Model::get_normal_registr($product_cell->product_name)." ".$product_cell->company;?></a></div>
            <?php
            }
            else
            {
                ?>
            <div class="sub_category_product_title_block"><a href="<?php echo base_url();?>catalog/<?php echo $current_parent_category_url;?>/<?php echo $current_sub_category_url;?>/<?php echo $product_cell->product_url;?>" class="sub_category_product_title"><?php echo Client_Shop_Model::get_normal_registr($product_cell->product_card_name)." ".$product_cell->company;?></a></div>
                <?php
            }
            if($product_cell->product_card_model_name == null)
            {
                ?>
                <?php
            }
            else
            {
                ?>
                <a href="<?php echo base_url();?>catalog/<?php echo $current_parent_category_url;?>/<?php echo $current_sub_category_url;?>/<?php echo $product_cell->product_url;?>"><p class="sub_category_product_card_model_name">артикул: <span><?php echo $product_cell->product_card_model_name;?></span></p></a>
                <?php
            }

            ?>

        </div>

        <div class="row override_margin-left hit_product_price_wrap">

            <div class="span2 override_margin-left pull-left hit_product_price_block">


                        <span class="hit_product_price"><?php echo $product_cell->first_shop_product_price;?> <img class="hit_product_price_img" src="<?php echo base_url();?>public/img/index_page/rur.png"></span>

            </div>

            <div class="span2 override_margin-left pull-right hit_product_btn_block">
                <a href="<?php echo base_url();?>catalog/<?php echo $current_parent_category_url;?>/<?php echo $current_sub_category_url;?>/<?php echo $product_cell->product_url;?>" class="hit_product_btn">Купить</a>
            </div>

        </div>

    </div>
