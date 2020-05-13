
<div class="row override_margin-left sub_category_block wrap_notmal">

    <div class="row override_margin-left sub_category_row_title_block">
        <div class="row override_margin-left inner-row">

            <div class="main_left_title"><?php echo $subcategory->category_name;
                if ($is_parent)
                {
                ?> <a href="<?php echo base_url();?>catalog/<?php echo $parent_url;?>/<?php echo $subcategory->sub_category_url;?>" class="sub_category_row_more_products_link">перейти в раздел »</a>
                <?php
                }
                ?></div>
            <div class="hr_custom bottom_notmal"></div>
        </div>

    </div>

    <div class="row override_margin-left sub_category_row_description_block">

        <p class="sub_category_row_description"><?php echo $subcategory->category_description;?></p>

    </div>

    <div class="row override_margin-left sub_category_row_products_block">


        <?php

        $count = 0;


        foreach($subcategory_products as $product)
        {

            $count++;
            $is_last = ($count % $max_count==0);
            $data['product_cell'] = $product;
            $data['is_last'] = $is_last;
            $this->load->view('template/product_cell',$data);




        }

        ?>

    </div>

</div>