<script type="text/javascript">
    $(document).ready(function()
    {
        $(".collapse").collapse();
    });

</script>
<div class="container">
    <h4><?php echo $title; ?></h4>
    <p>
    <form class="form-inline pull-left" style="margin: 0; padding: 0;" action="<?php echo base_url();?>admin/list_search_product" method="post">
        <input type="text" name="search" class="input-xlarge" value="<?php echo $search; ?>">
        <?php echo form_hidden('template', $template);?>
        <?php echo form_hidden('title', $title);?>
        <input class="btn btn-small btn-info" style="margin: 5px 0 0 0;" type="submit"  value="Поиск">
    </form>
    </p><br><br>



    <table class="table table-bordered">
        <tr>
            <td style="text-align: center;"><strong>Prod_Id</strong></td>
            <td style="text-align: center;"><strong>Cat_Id</strong></td>
            <td style="text-align: center;"><strong>Миниатюра</strong></td>
            <td style="text-align: center;"><strong>Название</strong></td>
            <td style="text-align: center;"><strong>Сортировка</strong></td>
            <td style="text-align: center;"><strong>Редактировать</strong></td>

        </tr>

        <?php
        foreach($list as $product)
        {
            echo "<tr style='margin: 0; padding: 0;'>";
            echo "<td style='text-align: center;'>".$product->id."</td>";
            echo "<td style='text-align: center;'>".$product->category_id."</td>";
            echo "<td style='text-align: center;'><img src='".base_url()."public/img/catalog_imgs/pages_img/".$product->category_id."/img_id_".$product->id.".png' width='100' / ></td>";


            echo "<td style='text-align: left;'>".$product->product_name."</td>";
            echo "<td style='text-align: left;'>".$product->sort_id."</td>";


            echo "<td>";
            echo "       <form class='form-inline pull-left' style='margin: 0; padding: 0;' action='".base_url()."admin/".$template."' method='post'>";
            echo form_hidden('id', $product->id);
            echo "        <input class='btn btn-small btn-info' style='margin: 5px 0 0 0;' type='submit'  value='Редактировать'>";
            echo "        </form>";
            echo "    </td>";
            echo "</tr>";
        }
        ?>

    </table>


</div>