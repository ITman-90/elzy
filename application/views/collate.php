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

        <div class="span9 override_margin-left collate_view_wrap">

            <div class="row override_margin-left">

                <p class="collate_view_title">Сравнение продуктов</p>

            </div>

            <br>

            <?php

            foreach($collate_data as $collate_product)
            {

                $collate_product_id = $collate_product->product_id;

                $collate_product_full_name = $collate_product->product_name;
                $collate_product_card_name = $collate_product->product_card_name;
                $collate_product_model_name = $collate_product->product_model_name;

                $collate_product_price = $collate_product->product_price;
                $collate_product_url = $collate_product->product_url;

                $collate_product_spec_names = $collate_product->product_spec_names;
                $collate_product_spec_values = $collate_product->product_spec_values;

                $collate_product_spec_names = explode(',', $collate_product_spec_names);
                $collate_product_spec_values = explode(',', $collate_product_spec_values);

                $collate_product_sale_status = $collate_product->sale_status;
                $collate_product_new_status = $collate_product->new_status;

                ?>

                <div class="row override_margin-left product_collate_wrap">

                    <div class="span3 override_margin-left product_collate_image_wrap">

                        <div class="row override_margin-left product_collate_image_block">

                            <?php

                            if($collate_product_sale_status == 1)
                            {

                                ?>


                                <img class="current_product_image_hit_new" src="<?php echo base_url();?>public/img/index_page/status-hit.png" alt="">



                            <?php

                            }
                            elseif($collate_product_new_status == 1)
                            {

                                ?>


                                <img class="current_product_image_hit_new" src="<?php echo base_url();?>public/img/index_page/status-new.png">


                            <?php

                            }

                            ?>

                            <a href="<?php echo base_url();?>public/img/products/img_id_<?php echo $collate_product_id;?>_big.png" class="product_collate_image_link" title="<?php echo $collate_product_full_name;?>">
                                <img class="product_collate_image" src="<?php echo base_url();?>public/img/products/img_id_<?php echo $collate_product_id;?>_big_prod_view.png" title="<?php echo $collate_product_full_name;?>" alt="<?php echo $collate_product_full_name;?>">
                            </a>
                        </div>


                        <div class="row override_margin-left collate_product_price_block">

                            <div class="span1 override_margin-left">
                                <p class="collate_product_price_text"><?php echo $collate_product_price;?> <img class="collate_product_price_ico" src="<?php echo base_url();?>public/img/index_page/rur.png"></p>
                            </div>

                            <div class="span2 override_margin-left pull-right new_product_btn_block">
                                <a href="<?php echo base_url().$collate_product_url;?>" class="new_product_btn">Купить</a>
                            </div>

                        </div>

                    </div>

                    <div class="span6 collate_product_info_wrap">

                        <div class="row override_margin-left">

                            <?php

                            if(empty($collate_product_card_name) || empty($collate_product_model_name))
                            {
                                ?>
                                <p class="collate_product_full_name"><?php echo $collate_product_full_name;?></p>
                            <?php
                            }
                            else
                            {
                                ?>
                                <p class="collate_product_full_name"><?php echo $collate_product_card_name;?> <span class="collate_product_model_name">модель <?php echo $collate_product_model_name;?></span></p>
                            <?php
                            }

                            ?>

                        </div>

                        <div class="row override_margin-left">

                            <p>Технические характеристики:</p>

                        </div>


                        <div class="row override_margin-left">

                            <table class="table table-striped">

                                    <?php

                                    for($i=0; $i<count($collate_product_spec_names); $i++)
                                    {
                                        ?>
                                        <tr>
                                            <td class="collate_product_spec_name"><?php echo $collate_product_spec_names[$i];?></td>
                                            <td><?php echo $collate_product_spec_values[$i];?></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>

                            </table>

                        </div>

                    </div>

                </div>

            <?php
            }

            ?>

        </div>

    </div>

</div>