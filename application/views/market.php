<?php


header('Content-Type: text/xml;charset=utf8');

echo '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
echo '<!DOCTYPE yml_catalog SYSTEM "shops.dtd">'.PHP_EOL;
echo '<yml_catalog date="'.date("Y-m-d H:m").'">'.PHP_EOL;

echo '<shop>'.PHP_EOL;

echo '<name>Elzy.ru</name>'.PHP_EOL;
echo '<company>Elzy.ru</company>'.PHP_EOL;
echo '<url>http://elzy.ru/</url>'.PHP_EOL;

echo '<currencies>'.PHP_EOL;

echo '<currency id="RUR" rate="1" plus="0"/>'.PHP_EOL;

echo '</currencies>'.PHP_EOL;

echo '<categories>'.PHP_EOL;

    foreach($parent_category as $par_cat)
    {
        echo '<category id="'.$par_cat->parent_category_id.'">'.$par_cat->category_name.'</category>'.PHP_EOL;

        foreach($sub_category as $sub_cat)
        {
            if($sub_cat->parent_category_id == $par_cat->parent_category_id)
            {
                echo '<category id="'.$sub_cat->sub_category_id.'" parentId="'.$par_cat->parent_category_id.'">'.$sub_cat->category_name.'</category>'.PHP_EOL;
            }
        }
    }

echo '</categories>'.PHP_EOL;

echo '<local_delivery_cost>300</local_delivery_cost>'.PHP_EOL;

echo '<offers>'.PHP_EOL;

    foreach($products as $prod)
    {
        $prod_id = $prod->product_id;
        $first_prods = $this->client_shop_model->getShopProductFirstPrice($prod->product_id);
        $full_item_price = $first_prods[0]->shop_product_price;


        echo '<offer id="'.$prod_id.'" type="vendor.model" available="true">'.PHP_EOL;

        foreach($sub_category as $sub_cat)
        {
            if($sub_cat->sub_category_id == $prod->category_id)
            {
                echo '<url>'.base_url().'catalog/'.$sub_cat->parent_category_url.'/'.$sub_cat->sub_category_url.'/'.$prod->product_url.'</url>'.PHP_EOL;
            }

        }

        echo '<price>'.$full_item_price.'</price>'.PHP_EOL;
        echo '<currencyId>RUR</currencyId>'.PHP_EOL;
        foreach($sub_category as $sub_cat)
        {
            if($sub_cat->sub_category_id == $prod->category_id)
            {
                echo '<categoryId>'.$prod->category_id.'</categoryId>'.PHP_EOL;
                echo '<picture>'.base_url().'public/img/products/img_id_'.$prod_id.'_big_prod_list.png</picture>'.PHP_EOL;
            }

        }
        echo '<pickup>false</pickup>'.PHP_EOL;
        echo '<delivery>true</delivery>'.PHP_EOL;
        echo '<typePrefix>'.$prod->product_card_name.'</typePrefix>'.PHP_EOL;
        echo '<model>'.$prod->product_card_model_name.'</model>'.PHP_EOL;
        echo '<description>'.$prod->product_description.'</description>'.PHP_EOL;

        echo '</offer>'.PHP_EOL;


    }


echo '</offers>'.PHP_EOL;


echo '</shop>'.PHP_EOL;
echo '</yml_catalog>'.PHP_EOL;