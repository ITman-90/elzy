<div class="span3 override_margin-left catalog_left_menu">

            <div class="row override_margin-left">

                <p class="catalog_header_text">Каталог</p>

            </div>

            <div class="row override_margin-left catalog_parent_category_list_wrap">

                <ul class="unstyled">

                    <?php

                    foreach($parent_category_list as $parent)
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