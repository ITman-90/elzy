<script type="text/javascript">
    $(document).ready(function()
    {
        $(".collapse").collapse();
    });

</script>
<div class="container">
    <h4>Скрытие продуктов.</h4>

    <div class="accordion" id="accordion0">
        <div class="accordion-group">
            <?php

            foreach($view as $v)
            {


            echo '<div class="accordion-heading">'.PHP_EOL;
            echo '  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion0" href="#collapse'.$v->id.'">'.PHP_EOL;
            echo $v->catalog_category_name.' ('.$v->id.')'.PHP_EOL;
            echo '  </a>'.PHP_EOL;
            echo '</div>'.PHP_EOL;
            echo '<div id="collapse'.$v->id.'" class="accordion-body collapse in">';
            echo '<div class="accordion-inner">';


            echo '<div class="accordion" id="catalog'.$v->id.'">';
            echo '<div class="accordion-group">';


            foreach($category as $cat)
            {
            if($cat->catalog_category_id == $v->id)
            {
            echo '<div class="accordion-heading">'.PHP_EOL;
            echo '  <a class="accordion-toggle" data-toggle="collapse" data-parent="#catalog'.$v->id.'" href="#category'.$cat->category_id.'">'.PHP_EOL;
            echo    $cat->category_name.' ('.$cat->category_id.')'.PHP_EOL;
            echo '  </a>'.PHP_EOL;
            echo '</div>'.PHP_EOL;
            echo '<div id="category'.$cat->category_id.'" class="accordion-body collapse in">';
            echo '<div class="accordion-inner">';


            ?>

                <table class="table table-bordered">
                    <tr>
                        <td style="text-align: center;"><strong>Id</strong></td>
                        <td style="text-align: center;"><strong>Миниатюра</strong></td>
                        <td style="text-align: center;"><strong>Название</strong></td>
                        <td style="text-align: center;"><strong>Скрыть</strong></td>


                    </tr>

                    <?php

                    foreach($list as $product)
                    {
                    if ($product->category_id == $cat->category_id)
                    {
                        echo "<tr style='margin: 0; padding: 0;'>";
                        echo "<td style='text-align: center;'>".$product->id."</td>";
                        echo "<td style='text-align: center;'><img src='".base_url()."public/img/catalog_imgs/pages_img/".$product->category_id."/img_id_".$product->id.".png' width='100' / ></td>";


                        echo "<td style='text-align: left;'>".$product->product_name."</td>";


                        ?>
                    <td>

                        <form class="form-inline pull-left" style="margin: 0; padding: 0;" action="<?php echo base_url();?>admin/hide_product" method="post">
                            <?php echo form_hidden('product_id', $product->id);?>
                            <input type="checkbox" name="hide_product">

                            <input class="btn btn-small btn-danger" style="margin: 5px 0 0 0;" type="submit"  value="Скрыть">
                            <?php echo form_error('hide_product'); ?>


                        </form>

                    </td>

                        <?php

                        echo "</tr>";
                    }
                    }
                    ?>

                </table>

        </div>
    </div>
    <?php
    }
    }

    echo '</div>';
    echo '</div>';

    echo '</div>';
    echo '</div>';
    }
    ?>
      </div>

</div>