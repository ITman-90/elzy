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

                <li class="active_breadcrumb"><?php echo $category[0]->category_name;?></li>

                <?php

                ?>

            </ul>

        </div>

    </div>

</div>

<div class="container container_override main_content_container_background">

    <div class="row override_margin-left sub_category_row_wrap">
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

                    <li class="left-menu-item"><b><?php echo $subcategory->category_name;?></b></li>
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
        <div class="span9 wrap_span sub_category_span9_wrap">

        <?php



            //$sub_category_url = $subcategory->sub_category_url;
            $data['subcategory'] = $category[0];
            $data['subcategory_products'] = $products;
            $data['parent_url'] = $parent_url;
            $data['max_count'] = 3;
            $this->load->view('template/sub_category_list',$data);



        ?>

        </div>

    </div>
</div>