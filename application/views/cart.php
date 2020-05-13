

<div class="container main_content_container_background container_override">

    <div class="row override_margin-left middle_content_wrap">

        <?php
        $this->load->view('template/template_menu');
        ?>
        <div class="span9 override_margin-left cart_wrap">

            <div class="row override_margin-left breadcrumbs_block_wrap">

                <ul class="breadcrumbs_block inline">
                    <li><a href="<?php echo base_url();?>" class="inactive_breadcrumb">Главная</a> <span class="divider_breadcrumb">»</span></li>
                    <li class="active_breadcrumb">Корзина</li>
                </ul>

            </div>

            <div class="row override_margin-left information_articles_title_wrap">

                <div class="span2 override_margin-left pull-left">
                    <p class="information_articles_title">Корзина</p>
                </div>

                <div id="cart_title_table" class="span3 override_margin-left pull-right" style="width: 260px;">

                    <div class="span1 override_margin-left">
                        <p class="current_product_text_header">Цена</p>
                    </div>
                    <div class="span1">
                        <p class="current_product_text_header">Количество</p>
                    </div>
                    <div class="span1">
                        <p class="current_product_text_header">Сумма</p>
                    </div>

                </div>

            </div>

            <br>

            <?php

            if($this->session->userdata('order_send') == 1)
            {
                ?>

                <div class="row override_margin-left cart_order_send_wrap">

                    <div class="row override_margin-left">

                        <p class="cart_sub_title"><strong>Ваш заказ <a>№ <?php echo $this->session->userdata('order_id');?></a> принят в обработку. Менеджер свяжется с Вами.</strong></p>

                        <p class="cart_sub_title"><strong><a href="<?php echo base_url();?>">Продолжить покупки >></a></strong></p>

                    </div>

                </div>

            <?php

                $this->session->unset_userdata('order_id');
                $this->session->unset_userdata('order_send');
                $this->session->unset_userdata('yaparams');

            }
            else
            {

                ?>


                <div class="row override_margin-left cart_empty_wrap">

                    <div class="row override_margin-left">

                        <p class="cart_sub_title"><strong>Ваша корзина пуста</strong></p>

                        <p class="cart_sub_title">Вы можете начать свой выбор с <a href="<?php echo base_url();?>">главной страницы</a> или воспользоваться поиском, если ищете что-то конкретное.</p>

                    </div>

                </div>

            <?php

            }

            ?>

            <div class="row override_margin-left cart_content_wrap">

                <?php

                $cart_status = $this->flexi_cart->cart_status();

                if($cart_status == true)
                {

                    $cart_rowid = array();

                    $cart_items = $this->flexi_cart->cart_items();

                    ksort($cart_items);

                    $cart_total = $this->flexi_cart->total();

                    $cart_total = substr($cart_total, 0, -3);

                    $cart_total_weight = $this->flexi_cart->total_weight();

                    $cart_rowid = array_keys($cart_items);

                    $cart_rowid_count = count($cart_rowid);

                    $cart_items_count = $this->flexi_cart->cart_summary();


                    for($i=0; $i<$cart_rowid_count; $i++)
                    {

                        $row_ids = $cart_items[$cart_rowid[$i]]['row_id'];


                        $shop_product_id = $cart_items[$cart_rowid[$i]]['id'];
                        $product_name = $cart_items[$cart_rowid[$i]]['name'];

                        $qty = $cart_items[$cart_rowid[$i]]['quantity'];
                        $shop_product_price = $cart_items[$cart_rowid[$i]]['internal_price'];


                        $product_url = $cart_items[$cart_rowid[$i]]['options']['product_url'];
                        $product_id = $cart_items[$cart_rowid[$i]]['options']['product_id'];
                        $shop_product_color = $cart_items[$cart_rowid[$i]]['options']['shop_product_color'];
                        $shop_product_spec = $cart_items[$cart_rowid[$i]]['options']['shop_product_spec'];

                        if(empty($shop_product_spec))
                        {
                            $product_full_name = $product_name.' '.$shop_product_color.' '.$shop_product_spec;
                        }
                        else
                        {
                            $product_full_name = $product_name.' '.$shop_product_spec.' '.$shop_product_color;
                        }

                        $total_price = $shop_product_price * $qty;

                        ?>


                        <div class="row override_margin-left cart_current_product_wrap">

                            <div class="span2 override_margin-left cart_current_product_img_block">

                                <a href="<?php echo base_url();?>public/img/products/img_id_<?php echo $product_id;?>_big.png" class="cart_current_product_img" title="<?php echo $product_full_name;?>">
                                    <img src="<?php echo base_url();?>public/img/products/img_id_<?php echo $product_id;?>_big_cart_pic.png" title="<?php echo $product_full_name;?>" alt="<?php echo $product_full_name;?>">
                                </a>

                            </div>

                            <div class="span4 cart_current_product_title_block">

                                <div class="row override_margin-left">

                                    <p class="cart_current_product_title"><?php echo $product_full_name;?></p>

                                </div>

                                <br>

<!--                                <div class="row override_margin-left">-->
<!---->
<!--                                    <div class="span2 override_margin-left current_product_compare_bookmarks_btn_block">-->
<!--                                        <a href="#" class="current_product_compare_link"><img class="current_product_compare_btn_link_ico" src="--><?php //echo base_url();?><!--public/img/index_page/ico_compare.png">сравнить</a>-->
<!--                                    </div>-->
<!---->
<!--                                    <div class="span2 current_product_compare_bookmarks_btn_block">-->
<!--                                        <a href="#" class="current_product_bookmarks_link"><img class="current_product_bookmarks_btn_link_ico" src="--><?php //echo base_url();?><!--public/img/index_page/ico_bookmarks.png">в закладки</a>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->

                            </div>

                            <div class="span3 override_margin-left cart_current_product_price_block">

                                <div class="span2 override_margin-left cart_current_product_price_wrap">
                                    <p class="cart_current_product_price"><span id="cart_current_product_price_value"><?php echo $shop_product_price;?></span> <img src="<?php echo base_url();?>public/img/index_page/rur_10.png"></p>
                                </div>

                                <div class="span2 cart_current_product_count_wrap">
                                    <div class="row override_margin-left">
                                        <div class="span1 override_margin-left cart_current_product_minus_wrap">
                                            <p class="cart_current_product_minus" data-cart-rowid="<?php echo $row_ids;?>">&#45;</p>
                                        </div>
                                        <div class="span1 override_margin-left cart_current_product_qty_wrap">
                                            <input class="cart_current_product_qty" data-cart-rowid="<?php echo $row_ids;?>" value="<?php echo $qty;?>" maxlength="3" min="0">
                                        </div>
                                        <div class="span1 override_margin-left cart_current_product_plus_wrap">
                                            <p class="cart_current_product_plus" data-cart-rowid="<?php echo $row_ids;?>">&#43;</p>
                                        </div>
                                    </div>

                                    <div class="row override_margin-left cart_current_product_delete_wrap">
                                        <p class="cart_current_product_delete" data-cart-rowid="<?php echo $row_ids;?>">удалить<img src="<?php echo base_url();?>public/img/index_page/but_delete.png"></p>
                                    </div>
                                </div>

                                <div class="span2 cart_current_product_total_wrap">
                                    <p class="cart_current_product_total"><span id="cart_current_product_total_value"><?php echo $total_price;?></span> <img src="<?php echo base_url();?>public/img/index_page/rur_10.png"></p>
                                </div>

                            </div>

                        </div>


                    <?php

                    }

                    ?>

                    <br>

                    <div class="row override_margin-left">

                        <div class="row override_margin-left">

                            <p class="cart_products_total pull-right">Итого:<span><?php echo $cart_total;?></span><img src="<?php echo base_url();?>public/img/index_page/rur.png"></p>

                        </div>

                        <br>

                        <div class="row override_margin-left">

                            <div class="span3 override_margin-left pull-left">
                                <a href="<?php echo base_url();?>" class="cart_continue_btn"></a>
                            </div>

                            <div class="span3 override_margin-left pull-right cart_order_btn_wrap">
                                <img id="cart_order_btn_fake" src="<?php echo base_url();?>public/img/index_page/cart_order_active.png">
                                <a class="cart_order_btn"></a>
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