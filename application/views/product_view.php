<?php

$user_session_id = $this->session->userdata('session_id');


?>
<div class="container container_override main_content_container_background" id="breadcrumbs">

    <div class="row override_margin-left parent_category_row_wrap">

        <div class="row override_margin-left breadcrumbs_block_wrap">

            <ul class="breadcrumbs_block inline">

                <li><a href="<?php echo base_url();?>" class="inactive_breadcrumb">Главная</a> <span class="divider_breadcrumb">»</span></li>

                <?php

                $parent_url = 0;
                $sub_category_url = 0;

                $parent_url = $parent_category->parent_category_url;

                ?>

                <li><a href="<?php echo base_url();?>catalog/<?php echo $parent_url;?>" class="inactive_breadcrumb"><?php echo $parent_category->category_name;?></a> <span class="divider_breadcrumb">»</span></li>

                <?php


                $sub_category_url = $category[0]->sub_category_url;

                ?>
                <li><a href="<?php echo base_url();?>catalog/<?php echo $parent_url;?>/<?php echo $sub_category_url;?>" class="inactive_breadcrumb"><?php echo $category[0]->category_name;?></a> <span class="divider_breadcrumb">»</span></li>


                <?php
                foreach($product as $current_product2)
                {
                    $current_product = $current_product2;
                    $current_product_url = 'catalog/'.$parent_url.'/'.$sub_category_url.'/'.$current_product->product_url;
                    $current_product_name = Client_Shop_Model::get_normal_registr($current_product->product_name)." ".$current_product->company;

                ?>
                <li class="active_breadcrumb"><?php echo $current_product_name;?></li>
                <?php
                }
                ?>

            </ul>

        </div>

    </div>

</div>
<div itemscope itemtype="http://schema.org/Product" class="container main_content_container_background container_override">

    <div class="row  override_margin-left sub_category_row_wrap">

        <div class="span3 wrap_span">

            <div class="row override_margin-left inner-row">

                <div class="main_left_title"><?php echo $parent_category->category_name;?></div>
                <div class="hr_custom bottom_mini"></div>
            </div>

            <ul class="list-unstyled ">
                <?php

                foreach($sub_categories as $subcategory)
                {
                    if ($subcategory->id==$category[0]->id)
                    {
                        ?>

                        <li class="left-menu-item"><b><a href="<?php echo base_url().'catalog/'.$parent_url.'/'.$subcategory->sub_category_url;?>"><?php echo $subcategory->category_name;?></a></b></li>
                    <?php
                    }
                    else
                    {
                        ?>

                        <li class="left-menu-item"><a href="<?php echo base_url().'catalog/'.$parent_url.'/'.$subcategory->sub_category_url;?>"><?php echo $subcategory->category_name;?></a></li>
                    <?php
                    }
                }
                ?>
            </ul>


        </div>

        <div class="span9 override_margin-left current_product_main_wrap">




            <div class="row override_margin-left">

                <div class="row override_margin-left current_product_title_wrap">
                    <div class="row override_margin-left inner-row">

                        <div class="main_left_title"><?php echo $current_product_name;?></div>
                        <div class="hr_custom bottom_mini"></div>
                    </div>



                </div>

                <div class="row override_margin-left current_product_wrap">

                    <div class="span3 override_margin-left current_product_image_wrap">

                        <div class="row override_margin-left current_product_image_block">



                            <?php

                            $first_product_color = $product_colors[0];

                            $first_product_color_pic_src = base_url()."public/img/products/".$current_product->product_card_model_name.".jpg";
                            $first_product_color_pic_route = $_SERVER['DOCUMENT_ROOT']."public/img/products/".$current_product->product_card_model_name.".jpg";

                            ?>

                            <div id="current_product_big" class="row override_margin-left">

                                <a href="<?php echo $first_product_color_pic_src;?>" class="current_product_image_zoom current_product_preview" title="<?php echo $current_product->product_name;?>">
                                    <img src="<?php echo base_url();?>public/img/index_page/current_zoom.png" title="Увеличить" alt="Увеличить <?php echo $current_product->product_name;?>">
                                </a>

                                <a href="<?php echo $first_product_color_pic_src;?>" class="current_product_preview" title="<?php echo $current_product->product_name;?>">
                                    <img  itemprop="image" class="current_product_image" alt="<?php echo $current_product->product_name;?>" src="<?php echo $first_product_color_pic_src;?>">
                                </a>

                            </div>
                            <?php
                            $default_product_pic_route = $_SERVER['DOCUMENT_ROOT']."/public/img/products/".$current_product->product_card_model_name."-1.jpg";

                            if(true || file_exists($default_product_pic_route))
                            {
                                $img_1_file_exists=true;
                            ?>

                            <div id="current_product_scheme" class="row override_margin-left">

                                <a href="<?php echo base_url();?>public/img/products/<?php echo $current_product->product_card_model_name;?>-1.jpg" class="current_product_image_zoom current_product_preview" title="<?php echo $current_product->product_name;?>">
                                    <img src="<?php echo base_url();?>public/img/index_page/current_zoom.png" title="Увеличить" alt="Увеличить <?php echo $current_product->product_name;?>">
                                </a>

                                <a href="<?php echo base_url();?>public/img/products/<?php echo $current_product->product_card_model_name;?>-1.jpg" class="current_product_preview" title="<?php echo $current_product->product_name;?>">
                                    <img class="current_product_image"  alt="<?php echo $current_product->product_name;?>"src="<?php echo base_url();?>public/img/products/<?php echo $current_product->product_card_model_name;?>-1_prod_view.jpg">
                                </a>

                            </div>

                            <?php

                            }
                            ?>
                            <?php
                            $default_product_pic_route = $_SERVER['DOCUMENT_ROOT']."/public/img/products/".$current_product->product_card_model_name."-2.jpg";

                            if(true || file_exists($default_product_pic_route))
                            {
                                $img_2_file_exists=true;
                                ?>
                            <div id="current_product_box" class="row override_margin-left">

                                <a href="<?php echo base_url();?>public/img/products/<?php echo $current_product->product_card_model_name;?>-2.jpg" class="current_product_image_zoom current_product_preview" title="<?php echo $current_product->product_name;?>">
                                    <img src="<?php echo base_url();?>public/img/index_page/current_zoom.png" title="Увеличить" alt="Увеличить <?php echo $current_product->product_name;?>">
                                </a>

                                <a href="<?php echo base_url();?>public/img/products/<?php echo $current_product->product_card_model_name;?>-2.jpg" class="current_product_preview" title="<?php echo $current_product->product_name;?>">
                                    <img class="current_product_image" alt="<?php echo $current_product->product_name;?>" src="<?php echo base_url();?>public/img/products/<?php echo $current_product->product_card_model_name;?>-2_prod_view.jpg">
                                </a>

                            </div>
                            <?php

                            }
                            ?>
                        </div>



                        <div class="row override_margin-left current_product_image_btn_wrap">

                            <div class="span2 override_margin-left current_product_image_btn">
                                <a id="current_product_big_btn" href="#big">
                                    <img id="current_product_big_over" class="current_product_image_over" src="<?php echo base_url();?>public/img/index_page/ramka.png">
                                    <img class="current_product_image_btn_pic" src="<?php echo base_url();?>public/img/products/<?php echo $current_product->product_card_model_name;?>_pic_btn.jpg">
                                </a>
                            </div>
                            <?php

                            if($img_1_file_exists) {
                                ?>
                                <div class="span2 override_margin-left current_product_image_btn">
                                    <a id="current_product_scheme_btn" href="#scheme">
                                        <img id="current_product_scheme_over" class="current_product_image_over"
                                             src="<?php echo base_url(); ?>public/img/index_page/ramka.png">
                                        <img class="current_product_image_btn_pic"
                                             src="<?php echo base_url(); ?>public/img/products/<?php echo $current_product->product_card_model_name; ?>-1_pic_btn.jpg">
                                    </a>
                                </div>
                            <?php
                            }
                            if($img_2_file_exists) {
                                ?>
                                <div class="span2 override_margin-left current_product_image_btn_last">
                                    <a id="current_product_box_btn" href="#box">
                                        <img id="current_product_box_over" class="current_product_image_over"
                                             src="<?php echo base_url(); ?>public/img/index_page/ramka.png">
                                        <img class="current_product_image_btn_pic"
                                             src="<?php echo base_url(); ?>public/img/products/<?php echo $current_product->product_card_model_name; ?>-2_pic_btn.jpg">
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>



                    </div>

                    <div class="span5 current_product_specs_block">
                        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="span1 override_margin-left current_product_price_block pull-right">
                            <span class="current_product_price_block_inner"><span itemprop="price" class="current_product_price"><?php echo $shop_products[0]->shop_product_price;?></span>
                            <meta itemprop="priceCurrency" content="RUB">
                            <?php $current_product_shop_price = $shop_products[0]->shop_product_price; ?>
                            <span><img class="current_product_price_ico" src="<?php echo base_url();?>public/img/index_page/rur_big.png"></span>
                            </span>
                        </div>
                        <div class="row override_margin-left current_product_specs_description_wrap">
                            <p class="current_product_specs_description"><b>Артикул:</b> <?php echo $current_product->product_card_model_name; ?></p>
                            <p class="current_product_specs_description"><b>Состав:</b> <?php echo $current_product->consist; ?></p>

                            <p class="current_product_specs_description"><?php echo $current_product->product_description;?></p>
                            <!--<p class="current_product_specs_description"><?php echo $seo_desc_title;?></p>!-->


                        </div>


                        <div class="override_margin-left current_product_buy_button_block pull-right">



                            <div class="span2 override_margin-left current_product_price_btn_block pull-right">


                                <img class="current_product_price_btn_img" src="<?php echo base_url();?>public/img/index_page/but_buy.png">

                                <input class="current_product_qty_minus" type="button" value="&#45;">
                                <input class="current_product_qty" value="1" maxlength="3" min="0">
                                <input class="current_product_qty_plus" type="button" value="&#43;">

                                <form method="post">

                                    <?php

                                    echo form_hidden('current_shop_product_id', $shop_products[0]->shop_product_id);
                                    echo form_hidden('current_shop_product_weight', $shop_products[0]->shop_product_weight);

                                    echo form_hidden('current_product_id', $current_product_id);
                                    echo form_hidden('current_sub_category_id', $sub_category_id);

                                    echo form_hidden('current_product_name_full', $current_product_name_full);

                                    echo form_hidden('current_parent_url', $parent_url);
                                    echo form_hidden('current_sub_category_url', $sub_category_url);
                                    echo form_hidden('size', '3 мес');

                                    echo form_hidden('collate_status', $collate_status);
                                    echo form_hidden('bookmarks_status', $bookmarks_status);


                                    ?>

                                    <a id="buy_btn" class="current_product_price_btn">Купить</a>
                                </form>
                            </div>


                        </div>
                        <div class="row override_margin-left current_product_specs_warning_wrap">
                        <span class="normal_size" style="padding: 5px 14px;">3 мес</span> <span class="active_size" style="padding: 5px 14px;">6 мес</span> <span class="normal_size" style="padding: 5px 14px;">9 мес</span><br><br>
                                <span class="normal_size" style="padding: 5px 10px;">12 мес</span> <span class="normal_size" style="padding: 5px 10px;">18 мес</span> <span class="normal_size" style="padding: 5px 10px;">24 мес</span>
                        </div>
                        <div class="row override_margin-left current_product_specs_description2_wrap">

                                <div class="main_middle_prop_desc">Дополнительное описание<span style="color: #fa3396;">*</span></div>
                                <div class="hr_custom_prop_desc bottom_mini"></div>
                            <?php echo $current_product->product_description2;?>


                        </div>


                    </div>

                </div>
<!--
                <div class="row override_margin-left current_product_specsbars_wrap">

                    <div class="row override_margin-left current_product_specsbars_block">

                        <ul class="nav nav-tabs">
                            <li id="current_product_tech_specs" class="current_product_specsbar current_product_specsbar_active">
                                <p class="current_product_specsbar_link current_product_specsbar_link_active">Технические характеристики</p>
                            </li>

                            <?php

                            $product_reviews_count = count($products_reviews);

                            if($product_reviews_count == 0)
                            {
                                ?>
                                <li id="current_product_review" class="current_product_specsbar">
                                    <p class="current_product_specsbar_link">Отзывы о товаре</p>
                                </li>
                            <?php
                            }
                            else
                            {
                                ?>
                                <li id="current_product_review" class="current_product_specsbar">
                                    <p class="current_product_specsbar_link">Отзывы о товаре <span class="current_product_review">(<?php echo $product_reviews_count;?>)</span></p>
                                </li>
                            <?php
                            }

                            ?>



                            <li id="current_product_related_products" class="current_product_specsbar">
                                <p class="current_product_specsbar_link">Сопутствующие товары</p>
                            </li>
                        </ul>

                    </div>

                    <div class="row override_margin-left" style="border-right: 1px solid #e0e0e0;">

                        <div id="current_product_tech_specs_block" class="row override_margin-left current_product_specsbar_content current_product_specsbar_content_active">

                            <div class="span6 override_margin-left current_product_tech_specs_block_table_wrap">

                                <table class="table">

                                    <?php

                                    $count_product_spec_array = count($product_spec_array);

                                    for($i=0; $i<$count_product_spec_array; $i++)
                                    {

                                        ?>

                                        <tr class="current_product_tech_specs_row">
                                            <td class="current_product_tech_specs_names"><?php echo $product_spec_names[$i];?>:</td>
                                            <td><?php echo $product_spec_array[$i];?></td>
                                        </tr>

                                    <?php

                                    }

                                    ?>

                                </table>

                            </div>

                            <div class="span3 override_margin-left">

                                <div class="row override_margin-left current_product_delivery_block">

                                    <p>
                                        <a href="<?php echo base_url();?>delivery" target="_blank" class="current_product_delivery_link">Оплата и доставка</a>
                                    </p>

                                    <p class="current_product_delivery_text">
                                        Регион: Москва<br>
                                        Возможен самовывоз<br>
                                        Курьером: завтра
                                    </p>

                                </div>

                            </div>

                        </div>

                        <div id="current_product_review_block" class="row override_margin-left current_product_specsbar_content">

                                <?php

                                if(empty($products_reviews))
                                {
                                    ?>

                                    <div class="row override_margin-left">
                                        <div class="span2 override_margin-left current_product_review_write_btn">
                                            <a class="current_product_review_write_link"><img class="current_product_review_write_ico" src="<?php echo base_url();?>public/img/index_page/ico_write.png"><span id="current_product_review_write_link_span" style="border-bottom: 1px dashed #02709b;">Написать отзыв о товаре</span></a>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row override_margin-left current_product_review_write_block current_product_review_write_block_active">

                                        <form id="product_review_form" method="post" action="">

                                            <div class="row override_margin-left">

                                                <div class="span3 override_margin-left">

                                                    <div class="row override_margin-left">
                                                        <textarea id="review_plus_text" name="review_plus_text" class="review_text" placeholder="Достоинства:"></textarea>
                                                    </div>

                                                    <br>

                                                    <div class="row override_margin-left">
                                                        <input type="text" id="review_client_name" name="review_client_name" class="review_input_data" placeholder="Введите Ваше имя:">
                                                    </div>

                                                    <br>

                                                    <div class="row override_margin-left captcha_block">

                                                        <div class="span2 override_margin-left captcha_img_wrap pull-left">

                                                            <?php

                                                            echo $image;

                                                            ?>

                                                        </div>

                                                        <div class="span1 override_margin-left captcha_update_btn_block pull-right">
                                                            <img id="captcha_update_btn" src="<?php echo base_url();?>public/img/index_page/captcha_update.png" title="Обновить CAPTCHA" alt="Обновить CAPTCHA">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="span3">

                                                    <div class="row override_margin-left">
                                                        <textarea id="review_minus_text" name="review_minus_text" class="review_text" placeholder="Недостатки:"></textarea>
                                                    </div>

                                                    <br>

                                                    <div class="row override_margin-left">
                                                        <input type="text" id="review_client_email" name="review_client_email" class="review_input_data" placeholder="Введите Ваш e-mail:">
                                                    </div>

                                                    <br>

                                                    <div class="row override_margin-left">
                                                        <input type="text" id="review_client_captcha" name="review_client_captcha" class="review_input_data" placeholder="Введите символы с картинки:">
                                                    </div>

                                                </div>

                                                <div class="span3">

                                                    <div class="row override_margin-left">
                                                        <textarea id="review_comment_text" name="review_comment_text" class="review_common" placeholder="Общие впечатления:"></textarea>
                                                    </div>


                                                    <div class="row override_margin-left review_btn_wrap">
                                                        <button class="btn btn-block review_btn">Отправить</button>
                                                    </div>

                                                </div>

                                            </div>

                                        </form>

                                        <br>
                                    </div>

                                <?php
                                }
                                else
                                {

                                ?>

                                    <div class="row override_margin-left">
                                        <div class="span2 override_margin-left current_product_review_write_btn">
                                            <a class="current_product_review_write_link"><img class="current_product_review_write_ico" src="<?php echo base_url();?>public/img/index_page/ico_write.png"><span id="current_product_review_write_link_span" style="border-bottom: 1px dashed #02709b;">Написать отзыв о товаре</span></a>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row override_margin-left current_product_review_write_block current_product_review_write_block">

                                        <form id="product_review_form" method="post" action="">

                                            <div class="row override_margin-left">

                                                <div class="span3 override_margin-left">

                                                    <div class="row override_margin-left">
                                                        <textarea id="review_plus_text" name="review_plus_text" class="review_text" placeholder="Достоинства:"></textarea>
                                                    </div>

                                                    <br>

                                                    <div class="row override_margin-left">
                                                        <input type="text" id="review_client_name" name="review_client_name" class="review_input_data" placeholder="Введите Ваше имя:">
                                                    </div>

                                                    <br>

                                                    <div class="row override_margin-left captcha_block">

                                                        <div class="span2 override_margin-left captcha_img_wrap pull-left">

                                                            <?php

                                                            echo $image;

                                                            ?>

                                                        </div>

                                                        <div class="span1 override_margin-left captcha_update_btn_block pull-right">
                                                            <img id="captcha_update_btn" src="<?php echo base_url();?>public/img/index_page/captcha_update.png" title="Обновить CAPTCHA" alt="Обновить CAPTCHA">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="span3">

                                                    <div class="row override_margin-left">
                                                        <textarea id="review_minus_text" name="review_minus_text" class="review_text" placeholder="Недостатки:"></textarea>
                                                    </div>

                                                    <br>

                                                    <div class="row override_margin-left">
                                                        <input type="text" id="review_client_email" name="review_client_email" class="review_input_data" placeholder="Введите Ваш e-mail:">
                                                    </div>

                                                    <br>

                                                    <div class="row override_margin-left">
                                                        <input type="text" id="review_client_captcha" name="review_client_captcha" class="review_input_data" placeholder="Введите символы с картинки:">
                                                    </div>

                                                </div>

                                                <div class="span3">

                                                    <div class="row override_margin-left">
                                                        <textarea id="review_comment_text" name="review_comment_text" class="review_common" placeholder="Общие впечатления:"></textarea>
                                                    </div>


                                                    <div class="row override_margin-left review_btn_wrap">
                                                        <button class="btn btn-block review_btn">Отправить</button>
                                                    </div>

                                                </div>

                                            </div>

                                        </form>

                                        <br>
                                    </div>

                                    <div class="row override_margin-left current_product_reviews_block">

                                    <?php

                                    foreach($products_reviews as $product_review)
                                    {

                                        $client_name = $product_review->client_name;
                                        $datetime = $product_review->datetime;
                                        $plus_text = $product_review->plus_text;
                                        $minus_text = $product_review->minus_text;
                                        $result_text = $product_review->result_text;

                                        $datetime = substr($datetime, 0, 10);
                                        $datetime = explode('-', $datetime);
                                        krsort($datetime);
                                        $datetime = implode('.', $datetime);

                                        ?>

                                            <div class="row override_margin-left current_product_review_block">

                                                <div class="row override_margin-left">
                                                    <p class="review_client_header"><span class="review_client_name"><?php echo $client_name;?></span> <span class="review_date">Дата публикации: <?php echo $datetime;?></span></p>
                                                    <p class="review_client_data"><span class="review_title">Достоинства:</span> <span class="review_text"><?php echo $plus_text;?></span></p>
                                                    <p class="review_client_data"><span class="review_title">Недостатки:</span> <span class="review_text"><?php echo $minus_text;?></span></p>
                                                    <p class="review_client_data"><span class="review_title">Общие впечатления:</span> <span class="review_text"><?php echo $result_text;?></span></p>
                                                </div>

                                            </div>

                                    <?php
                                    }

                                    ?>

                                    </div>

                                <?php

                                }

                                ?>

                        </div>

                        <div id="current_product_related_products_block" class="row override_margin-left current_product_specsbar_content">

                            <img id="load_gif" src="<?php echo base_url();?>public/img/load.gif" style="margin: 200px 0 0 300px;">

                            <div class="row override_margin-left current_product_related_products_wrap"></div>

                        </div>

                    </div>

                </div>
!-->
            </div>

        </div>

    </div>

<span itemprop="brand" itemscope itemtype="http://schema.org/Brand">
<meta itemprop="name" content="Elzy"></span>
    <meta itemprop="url" content="<?php echo base_url();?>catalog/<?php echo $parent_url;?>/<?php echo $sub_category_url;?>/<?php echo $product[0]->product_url;?>">
</div>

<?php

$page_view_data = array(
    'product_id' => $current_product_id,
    'product_name' => $current_product_name_full,
    'product_price' => $current_product_shop_price,
    'product_url' => $current_product_url,
    'product_card_name' => $current_product_card_name,
    'product_model_name' => $current_product_card_model_name,
    'user_session_id' => $user_session_id
);

$product_collate_spec_names = implode(',',$product_spec_names);
$product_collate_spec_values = implode(',',$product_spec_array);


$collate_product_data = array(
    'product_id' => $current_product_id,
    'product_name' => $current_product_name_full,
    'product_price' => $current_product_shop_price,
    'product_url' => $current_product_url,
    'product_card_name' => $current_product_card_name,
    'product_model_name' => $current_product_card_model_name,
    'user_session_id' => $user_session_id,
    'product_spec_names' => $product_collate_spec_names,
    'product_spec_values' => $product_collate_spec_values,
);



$page_view_data = json_encode($page_view_data);

$collate_product_data = json_encode($collate_product_data);

?>

<script type="text/javascript">

    $(document).ready(function(){

        var send_viewdata = <?php echo $page_view_data;?>;
        var send_collatedata = <?php echo $collate_product_data;?>;

        send_view_data(send_viewdata);

        var collate_current_product = $('#collate_current_product');
        var bookmark_current_product = $('#bookmark_current_product');

        collate_current_product.click(function(){

            $('#collate_current_product_fake').css({'display':'block', 'padding':'0'});
            $('#collate_current_product').css({'display':'none'});

            send_collate_data(send_collatedata);

        });

        bookmark_current_product.click(function(){

            $('#bookmark_current_product_fake').css({'display':'block', 'padding':'0'});
            $('#bookmark_current_product').css({'display':'none'});

            send_bookmark_data(send_viewdata);

        });




    });

</script>