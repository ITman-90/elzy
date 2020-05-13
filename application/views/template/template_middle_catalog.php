<div id="index_middle_container" class="container container_override">
    <div class="row override_margin-left breadcrumb_block">

        <?php

        if(isset($parent_category))
        {
            $parent_link_name = $parent_category[0]->category_name;
            $parent_link = $parent_category[0]->parent_category_url;
            $active_link_name = $category[0]->category_name;

            $category_desc = $category[0]->category_description;

            ?>

            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Главная</a> <span class="divider">»</span></li>
                <li><a href="<?php echo base_url();?>catalog/<?php echo $parent_link;?>"><?php echo $parent_link_name;?></a> <span class="divider">»</span></li>
                <li class="active"><?php echo $active_link_name;?></li>
            </ul>

        <?php

        }
        else
        {
            $active_link_name = $category[0]->category_name;

            $category_desc = $category[0]->category_description;

            ?>

            <ul class="breadcrumb">
                <li><a href="<?php echo base_url();?>">Главная</a> <span class="divider">»</span></li>
                <li class="active"><?php echo $active_link_name;?></li>
            </ul>

        <?php
        }

        ?>

    </div>

    <div class="span3 override_margin-left left_menu_block">

        <div class="left_menu_sub_category_block"></div>

        <ul class="unstyled">

            <?php

            foreach($parent_category_list as $parent)
            {

                ?>

                <li><a href="<?php echo base_url();?>catalog/<?php echo $parent->parent_category_url;?>" class="left_menu_block_parent_link" data-parent-id="<?php echo $parent->parent_category_id;?>"><?php echo $parent->category_name;?></a></li>

            <?php

            }

            ?>

        </ul>


    </div>

    <div class="span8 override_margin-left category_middle_block">

        <div class="row override_margin-left title_category_middle_block">

            <h3><?php echo $active_link_name;?></h3>

        </div>


        <div class="row override_margin-left">
            <img src="<?php echo base_url();?>public/img/index_page/slider_index_middle_block/1.png">

            <div class="row override_margin-left desc_category_middle_block">

                <p><?php echo $category_desc;?></p>

            </div>
        </div>

    </div>

</div>