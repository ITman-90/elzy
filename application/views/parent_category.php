<div class="container container_override main_content_container_background" id="breadcrumbs">

    <div class="row override_margin-left parent_category_row_wrap">

        <div class="row override_margin-left breadcrumbs_block_wrap">

            <ul class="breadcrumbs_block inline">

                <li><a href="<?php echo base_url();?>" class="inactive_breadcrumb">Главная</a> <span class="divider_breadcrumb">»</span></li>

                <?php

                $parent_url = 0;

                foreach($category as $parent)
                {

                    ?>

                    <li class="active_breadcrumb"><?php echo $parent->category_name;?></li>

                <?php

                    $parent_url = $parent->parent_category_url;

                }

                ?>

            </ul>

        </div>

    </div>

</div>

<div class="container container_override main_content_container_background">

    <div class="row override_margin-left sub_category_row_wrap">

        <div class="span3 wrap_span">

            <div class="row override_margin-left inner-row">

                <div class="main_left_title"><?php echo $parent->category_name;?></div>
                <div class="hr_custom bottom_mini"></div>
            </div>

            <ul class="list-unstyled ">
            <?php

            foreach($sub_category as $subcategory)
            {
            ?>
                <li class="left-menu-item"><a href="<?php echo base_url().'catalog/'.$parent_url.'/'.$subcategory->sub_category_url;?>"><?php echo $subcategory->category_name;?></a></li>
            <?php
            }
            ?>
            </ul>
            </div>
        <div class="span9 wrap_span sub_category_span9_wrap">
            <!--
            <div class="row override_margin-left sub_category_block">

                <div class="row override_margin-left par_category_row_description_block">

                    <p class="par_category_row_description"><?php echo $parent->category_description;?></p>

                </div>

            </div>!-->
            <?php

            foreach($sub_category as $subcategory)
            {
                //$sub_category_url = $subcategory->sub_category_url;
                $data['subcategory'] = $subcategory;
                $data['subcategory_products'] = $products[$subcategory->sub_category_id];
                $data['parent_url'] = $parent_url;
                $data['max_count'] = 3;
                $data['is_parent'] = true;
                $this->load->view('template/sub_category_list',$data);
            }

        ?>

        </div>
    </div>

</div>