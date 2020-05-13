<div class="container main_content_container_background container_override">

    <div class="row override_margin-left search_content_wrap">


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


        <?php

        if($keywords != null)
        {

            if($products_result == 0)
            {

                ?>

                    <div class="span9 override_margin-left search_content_block_wrap" style="height: 350px;">

                        <div class="row override_margin-left">

                            <br>

                            <p class="search_title">Результаты поиска</p>

                            <br>

                            <p class="search_keywords">Результаты по Вашему запросу: <strong><?php echo $keywords;?></strong> - не найдены =( Попробуйте ввести другой запрос.</p>

                            <br>

                        </div>


                    </div>


            <?php

            }
            else
            {
                ?>

                    <div class="span9 override_margin-left search_content_block_wrap">

                    <div class="row override_margin-left">

                        <br>

                        <p class="search_title">Результаты поиска</p>

                        <br>

                        <p class="search_keywords">Результаты по Вашему запросу: <strong><?php echo $keywords;?></strong></p>

                        <br>

                    </div>

                    <div class="row override_margin-left">

                    <?php

                    $category_keys = array();

                    $layout_count = 3;

                    $count = 0;

                    foreach($products_result as $products)
                    {

                        array_push($category_keys, $products->category_id);

                    }

                    $category_keys = array_unique($category_keys);
                    $category_keys = array_values($category_keys);


                    for($i=0; $i<count($category_keys); $i++)
                    {

                    foreach($sub_category_list as $category)
                    {

                    if($category->sub_category_id == $category_keys[$i])
                    {
                    $parent_url = $category->parent_category_url;
                    $sub_category_url = $category->sub_category_url;

                    ?>

                    <div class="row override_margin-left">


                                    <span>

                                        <span>
                                                <a class="search_category_title" href="<?php echo base_url();?>catalog/<?php echo $category->parent_category_url;?>/<?php echo $category->sub_category_url;?>"><?php echo $category->category_name;?></a>
                                        </span>

                                        <span class="sub_category_row_pdficon">
                                            <img src="<?php echo base_url();?>public/img/index_page/ico-pdf.png">
                                        </span>

                                        <span>
                                            <a href="#" class="sub_category_row_pdflink">Посмотреть презентацию</a>
                                        </span>

                                    </span>


                    </div>

                    <div class="row override_margin-left sub_category_row_description_block">

                        <p class="sub_category_row_description"><?php echo $category->category_description;?></p>

                    </div>

                    <div class="row override_margin-left sub_category_row_products_block">

                        <?php

                        foreach($products_result as $product)
                        {


                        if($product->category_id == $category->sub_category_id)
                        {

                        $product_url = $product->product_url;


                        if($count == 3)
                        {

                        ?>


                        <div class="span3 override_margin-left sub_category_product_last_child_block">

                            <?php

                            }
                            else
                            {

                            ?>

                            <div class="span3 override_margin-left sub_category_products_list_block">

                                <?php

                                }

                                ?>



                                <div class="row override_margin-left sub_category_product_wrap">

                                    <div class="row override_margin-left sub_category_product_title_wrap">

                                        <?php

                                        if($product->product_card_name == null)
                                        {
                                            ?>
                                            <a href="<?php echo base_url();?>catalog/<?php echo $parent_url;?>/<?php echo $sub_category_url;?>/<?php echo $product_url;?>" class="sub_category_product_title"><?php echo $product->product_name;?></a>
                                        <?php
                                        }
                                        else
                                        {
                                            ?>
                                        <a href="<?php echo base_url();?>catalog/<?php echo $parent_url;?>/<?php echo $sub_category_url;?>/<?php echo $product_url;?>" class="sub_category_product_title"><?php echo $product->product_card_name;?></a>
                                        <?php
                                        }

                                        if($product->product_card_model_name == null)
                                        {
                                            ?>
                                        <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <a href="<?php echo base_url();?>catalog/<?php echo $parent_url;?>/<?php echo $sub_category_url;?>/<?php echo $product_url;?>"><p class="sub_category_product_card_model_name">модель: <span><?php echo $product->product_card_model_name;?></span></p></a>
                                        <?php
                                        }

                                        ?>

                                    </div>

                                    <div class="row override_margin-left sub_category_product_img_wrap">

                                        <a href="<?php echo base_url();?>catalog/<?php echo $parent_url;?>/<?php echo $sub_category_url;?>/<?php echo $product_url;?>">
                                            <img class="sub_category_product_img" src="<?php echo base_url();?>public/img/products/img_id_<?php echo $product->product_id;?>_big_prod_list.png">
                                        </a>

                                    </div>

                                    <?php

                                    if($product->product_sale == 1)
                                    {

                                        ?>

                                        <div class="row override_margin-left sub_category_product_status_hit_wrap">

                                            <img src="<?php echo base_url();?>public/img/index_page/status-hit.png" alt="">

                                        </div>


                                    <?php

                                    }
                                    elseif($product->product_new == 1)
                                    {

                                        ?>

                                        <div class="row override_margin-left sub_category_product_status_new_wrap">

                                            <img src="<?php echo base_url();?>public/img/index_page/status-new.png" alt="">

                                        </div>

                                    <?php

                                    }

                                    ?>

                                </div>

                            </div>

                            <?php

                            $count++;

                            }



                            if($count==$layout_count) break;

                            }
                            ?>

                        </div>


                        <div class="row override_margin-left pull-right" style="margin: 0 20px 0 0;">
                            <a href="<?php echo base_url();?>catalog/<?php echo $category->parent_category_url;?>/<?php echo $category->sub_category_url;?>">перейти в раздел <?php echo $category->category_name;?></a>
                        </div>

                        <br>

                        <?php

                        $count = 0;


                        }

                        }

                        }

                        ?>

                    </div>

                    </div>


                    </div>


            <?php

            }

        }
        else
        {
            ?>

            <div class="span9 override_margin-left search_content_block_wrap" style="height: 350px;">

                <div class="row override_margin-left">

                    <br>

                    <p class="search_title">Результаты поиска</p>

                    <br>

                    <p class="search_keywords">Вы ввели пустой запрос, попробуйте еще раз =)</a></p>

                    <br>

                </div>


            </div>

        <?php
        }

        ?>




    <br>
    <br>
    <br>

</div>