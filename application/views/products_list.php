<div id="catalog_page" class="span7 override_margin-left content_wrap">

    <div class="row override_margin-left catalog_content_middle_wrap">

        <div class="row override_margin-left">

            <ul class="breadcrumb override_breadcrumb">
                <li><a href="<?php echo base_url();?>">Главная</a><span class="divider">/</span></li>
                <li><a href="<?php echo base_url();?>catalog">Каталог</a><span class="divider">/</span></li>
                <li><a href="<?php echo base_url();?>catalog/category/<?php echo $parent_category->parent_category_url;?>"><?php echo $parent_category[0]->category_name;?></a><span class="divider">/</span></li>
                <li><a href="<?php echo base_url();?>catalog/products/<?php echo $category[0]->sub_category_url;?>"><?php echo $category[0]->category_name;?></a><span class="divider">/</span></li>
                <li class="active"><?php echo $product[0]->product_name;?></li>
            </ul>

        </div>

        <div class="row override_margin-left product_block_wrap">

            <div class="span3 override_margin-left product_block_left_span">

                <div class="row override_margin-left">

                    <?php

                    $product_id = $product[0]->product_id;
                    $product_name = $product[0]->product_name;
                    $product_description = $product[0]->product_description;
                    $product_new = $product[0]->product_new;
                    $product_sale = $product[0]->product_sale;
                    $category_id = $product[0]->category_id;
                    $category_name = $category[0]->category_name;


                    $product_image_big_route = $_SERVER['DOCUMENT_ROOT'].'/public/img/products_images/'.$category_id.'/id_'.$product_id.'_big.png';
                    $product_image_box_route = $_SERVER['DOCUMENT_ROOT'].'/public/img/products_images/'.$category_id.'/id_'.$product_id.'_box.png';
                    $product_image_scheme_route = $_SERVER['DOCUMENT_ROOT'].'/public/img/products_images/'.$category_id.'/id_'.$product_id.'_scheme.png';

                    $product_image_big_src = base_url().'public/img/products_images/'.$category_id.'/id_'.$product_id.'_big.png';
                    $product_image_box_src = base_url().'public/img/products_images/'.$category_id.'/id_'.$product_id.'_box.png';
                    $product_image_scheme_src = base_url().'public/img/products_images/'.$category_id.'/id_'.$product_id.'_scheme.png';
                    $noimage = base_url().'public/img/no_image.gif';

                    $box_btn = base_url().'public/img/product_buttons/box.png';
                    $big_btn = base_url().'public/img/product_buttons/big.png';
                    $scheme_btn = base_url().'public/img/product_buttons/scheme.png';

                    if(file_exists($product_image_big_route))
                    {

                    ?>

                        <div id="product_big_image" class="row override_margin-left">

                            <a class="product_preview" href="<?php echo $product_image_big_src;?>" title="<?php echo $category_name;?> :: <?php echo $product_name;?>">
                                <img src="<?php echo $product_image_big_src;?>" alt="<?php echo $product_name;?>" title="<?php echo $product_name;?>">
                            </a>

                        </div>

                    <?php

                    }
                    else
                    {

                        ?>

                        <div id="product_big_image" class="row override_margin-left">

                            <a class="product_preview" href="<?php echo $product_image_big_src;?>" title="<?php echo $category_name;?> :: <?php echo $product_name;?>">
                                <img src="<?php echo $noimage;?>" alt="<?php echo $product_name;?>" title="<?php echo $product_name;?>">
                            </a>

                        </div>

                    <?php

                    }

                    if(file_exists($product_image_box_route))
                    {

                    ?>

                        <div id="product_box_image" class="row override_margin-left">

                            <a class="product_preview" href="<?php echo $product_image_box_src;?>" title="<?php echo $category_name;?> :: <?php echo $product_name;?>">
                                <img src="<?php echo $product_image_box_src;?>" alt="<?php echo $product_name;?>" title="<?php echo $product_name;?>">
                            </a>

                        </div>

                    <?php

                    }
                    else
                    {

                        ?>

                        <div id="product_box_image" class="row override_margin-left">

                            <a class="product_preview" href="<?php echo $product_image_box_src;?>" title="<?php echo $category_name;?> :: <?php echo $product_name;?>">
                                <img src="<?php echo $noimage;?>" alt="<?php echo $product_name;?>" title="<?php echo $product_name;?>">
                            </a>

                        </div>

                    <?php

                    }

                    if(file_exists($product_image_scheme_route))
                    {

                    ?>

                        <div id="product_scheme_image" class="row override_margin-left">

                            <a class="product_preview" href="<?php echo $product_image_scheme_src;?>" title="<?php echo $category_name;?> :: <?php echo $product_name;?>">
                                <img src="<?php echo $product_image_scheme_src;?>" alt="<?php echo $product_name;?>" title="<?php echo $product_name;?>">
                            </a>

                        </div>

                    <?php

                    }
                    else
                    {

                        ?>

                        <div id="product_scheme_image" class="row override_margin-left">

                            <a class="product_preview" href="<?php echo $product_image_scheme_src;?>" title="<?php echo $category_name;?> :: <?php echo $product_name;?>">
                                <img src="<?php echo $noimage;?>" alt="<?php echo $product_name;?>" title="<?php echo $product_name;?>">
                            </a>

                        </div>

                    <?php

                    }

                    ?>

                </div>

                <div class="row override_margin-left product_buttons_panel">

                     <img id="product_big_btn" src="<?php echo $big_btn;?>">

                     <img id="product_box_btn" src="<?php echo $box_btn;?>">

                     <img id="product_scheme_btn" src="<?php echo $scheme_btn;?>">

                </div>

                <br>

                <div class="row override_margin-left">

                    <div class="row override_margin-left product_colors">
                        <p class="product_colors_title">Доступные цвета</p>

                        <ul class="inline">
                            <?php

                            for($i=0; $i<count($product_colors); $i++)
                            {

                                ?>

                                <li><img class="product_color" src="<?php echo base_url();?>public/img/color/color_<?php echo $product_colors[$i];?>.png" title="<?php echo $colors[$i];?>"></li>

                            <?php

                            }

                            ?>
                        </ul>

                    </div>

                    <p class="product_image_warn">
                        * Уважаемые покупатели, обращаем Ваше внимание, что миниатюра обозначающая цвет может не совпадать с реальным цветом изделия.
                    </p>

                </div>

                <div class="row override_margin-left products_specs">

                    <p class="products_specs_title">Технические характеристики</p>

                    <table class="table table-striped">

                        <?php

                        $product_specs_count = count($product_spec_names);

                        for($i=0; $i<$product_specs_count; $i++)
                        {

                            ?>

                            <tr>
                                <td class="products_specs_name"><?php echo $product_spec_names[$i];?></td>
                                <td><?php echo $product_spec_array[$i];?></td>
                            </tr>

                        <?php

                        }

                        ?>

                    </table>

                </div>

            </div>

            <div class="span3 override_margin-left product_block_right_span">

                <div class="row override_margin-left product_block_right">

                    <p class="product_right_block_title"><?php echo $product_name;?></p>
                    <p class="product_right_block_description"><?php echo $product_description;?></p>

                    <div class="row override_margin-left product_right_block_cart">

                        <?php

                        /*start price*/

                        $start_price = 0;
                        $start_weight = 0;
                        $start_id = 0;
                        $start_count = 0;
                        $start_color = 0;
                        $start_spec = 0;

                        print_r($shop_products_spec_array);


                        if(empty($shop_products_spec_array[0]))
                        {
                            for($i=0; $i<1; $i++)
                            {
                                if($product_colors[$i] == $shop_products[$i]->shop_product_color)
                                {
                                    $start_price = $shop_products[$i]->shop_product_price;
                                    $start_weight = $shop_products[$i]->shop_product_weight;
                                    $start_id = $shop_products[$i]->shop_product_id;
                                    $start_count = $shop_products[$i]->shop_product_count;
                                    $start_color = $shop_products[$i]->shop_product_color;
                                    $start_spec = $shop_products[$i]->shop_product_spec;


                                }
                            }

                        }
                        else
                        {
                            for($i=0; $i<1; $i++)
                            {

                                if(($product_colors[$i] == $shop_products[$i]->shop_product_color) && ($shop_products_spec_array[$i] == $shop_products[$i]->shop_product_spec))
                                {
                                    $start_price = $shop_products[$i]->shop_product_price;
                                    $start_weight = $shop_products[$i]->shop_product_weight;
                                    $start_id = $shop_products[$i]->shop_product_id;
                                    $start_count = $shop_products[$i]->shop_product_count;
                                    $start_color = $shop_products[$i]->shop_product_color;
                                    $start_spec = $shop_products[$i]->shop_product_spec;
                                }

                            }

                        }


                        ?>


                        <div class="row override_margin-left product_cart_form">

                            <form id="product_cart_form" class="form-inline" action="" method="post">


                            <div class="row override_margin-left cart_element">


                                    <?php

                                    if(empty($shop_products_spec_array[0]))
                                    {
                                        ?>

                                        <div class="row override_margin-left colors_cart_element">

                                            <p class="products_specs_title">Выберите цвет</p>

                                            <?php

                                            $count_colors = count($colors);

                                            if($count_colors <= 1)
                                            {

                                            ?>

                                                <?php

                                                for($i=0; $i<count($product_colors); $i++)
                                                {

                                                ?>

                                                <?php echo form_hidden('shop_product_color', $product_colors[$i]);?>

                                                <p><?php echo $colors[$i];?></p>

                                                <?php

                                                }

                                                ?>


                                            <?php

                                            }
                                            else
                                            {
                                                ?>

                                                <select id="shop_product_color" class="select_pole" name="shop_product_color">


                                                    <?php

                                                    for($i=0; $i<count($product_colors); $i++)
                                                    {

                                                        ?>

                                                        <option value="<?php echo $product_colors[$i];?>"><?php echo $colors[$i];?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>

                                            <?php
                                            }


                                            ?>

                                        </div>

                                    <?php

                                    }
                                    else
                                    {

                                        ?>

                                        <div class="row override_margin-left colors_cart_element">

                                            <p class="products_specs_title">Выберите цвет</p>

                                            <?php

                                            $count_colors = count($colors);

                                            if($count_colors <= 1)
                                            {

                                                ?>

                                                <?php

                                                for($i=0; $i<count($product_colors); $i++)
                                                {

                                                    ?>

                                                    <?php echo form_hidden('shop_product_color', $product_colors[$i]);?>

                                                    <p id="shop_product_color_text"><?php echo $colors[$i];?></p>

                                                <?php

                                                }

                                                ?>


                                            <?php

                                            }
                                            else
                                            {
                                                ?>

                                                <select id="shop_product_color" class="select_pole" name="shop_product_color">


                                                    <?php

                                                    for($i=0; $i<count($product_colors); $i++)
                                                    {

                                                        ?>

                                                        <option value="<?php echo $product_colors[$i];?>"><?php echo $colors[$i];?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>

                                            <?php
                                            }


                                            ?>

                                        </div>

                                        <div class="row override_margin-left specs_cart_element">

                                            <p class="products_specs_title">Выберите спецификацию</p>

                                            <?php

                                            $count_specs = count($shop_products_spec_array);

                                            if($count_specs <= 1)
                                            {

                                                ?>

                                                <?php

                                                for($i=0; $i<count($shop_products_spec_array); $i++)
                                                {

                                                    ?>

                                                    <?php echo form_hidden('shop_product_spec', $shop_products_spec_array[$i]);?>

                                                    <p id="shop_product_spec_text"><?php echo $specs[$i];?></p>

                                                <?php

                                                }

                                                ?>


                                            <?php

                                            }
                                            else
                                            {
                                                ?>

                                                <select id="shop_product_spec" class="select_pole" name="shop_product_spec">


                                                    <?php

                                                    for($i=0; $i<count($shop_products_spec_array); $i++)
                                                    {

                                                        ?>

                                                        <option value="<?php echo $shop_products_spec_array[$i];?>"><?php echo $specs[$i];?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>

                                            <?php
                                            }


                                            ?>

                                        </div>

                                    <?php

                                    }

                                    ?>


                            </div>

                            <div class="row override_margin-left cart_submit_block">


                                <span class="product_catalog_price"><span id="shop_product_show_price" class="product_catalog_price"><?php echo $start_price;?></span> p.</span>
                                <?php echo form_hidden('product_id', $product_id);?>
                                <?php echo form_hidden('product_name', $product_name);?>
                                <?php echo form_hidden('category_id', $category_id);?>
                                <?php echo form_hidden('start_shop_product_id', $start_id);?>
                                <?php echo form_hidden('start_shop_product_weight', $start_weight);?>
                                <?php echo form_hidden('start_shop_product_price', $start_price);?>
                                <?php echo form_hidden('start_shop_product_count', $start_count);?>
                                <?php echo form_hidden('start_shop_product_color', $start_color);?>
                                <?php echo form_hidden('start_shop_product_spec', $start_spec);?>
                                <input type="text" class="product_catalog_count" id="qty" name="qty" value="1" maxlength="3">
                                <input id="cart_buy_btn" type="submit" class="btn btn-small" value="Купить">

                            </div>

                            </form>

                        </div>

                        <div class="row override_margin-left">

                            <p id="error_text">Данный товар отсутствует в продаже!</p>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

</div>