<?php

if(empty($id))
{

    redirect(base_url()."admin/list_price_product");

}
else
{
?>


<div class="container">

    <h4>Редактирование цен продукта</h4>
    <p style="font-size: 12pt;"><?php echo $product_name.' ('.$id.')'; ?></p>
    <br>
    <?php if (isset($product_href)) {?>
    <a href="<?php echo $product_href; ?>" target="_blank">Просмотр продукта(в новом окне)</a>
    <br>
        <br>


    <?php }?>
    <?php echo $custom_error_list; ?>

    <?php echo validation_errors(); ?>

    <form action="<?php echo base_url();?>admin/edit_price_product/update" method="post" enctype="multipart/form-data">

        <br>

        <table class="table table-bordered">
            <tbody id="tableNomenc">
            <tr>
                <td style="text-align: center; width: 10%;"><strong>ID</strong></td>
                <td style="text-align: center; width: 20%;"><strong>Цвет</strong></td>
                <td style="text-align: center; width: 20%;"><strong>Спец-я</strong></td>
                <td style="text-align: center; width: 30%;"><strong>Наименование</strong></td>
                <td style="text-align: center; width: 10%;"><strong>Артикул</strong></td>
                <td style="text-align: center; width: 10%;"><strong>Цена</strong></td>
            </tr>


            <?php
            $n =0;
            foreach ($price_data as $item)
            {
                $style="";
                if (isset($custom_error_lines) && in_array($n,$custom_error_lines))
                {
                    $style = ' style="background: #FFCCCC;"';
                }
                echo '
<tr'.$style.'>
	<td><input type="text" name="id_'.$n.'" class="input-mini" value="'.$item['id'].'" readonly></td>
	<td><textarea name="color_'.$n.'" style="resize: none; width: 150px; height: 40px;" readonly>'.$item['color_name'].'</textarea>'.
        form_hidden('color_id_'.$n, $item['color_id']).'</td>
	<td><textarea name="spec_'.$n.'" style="resize: none; width: 150px; height: 40px;" readonly>'.$item['spec_name'].'</textarea>'.
        form_hidden('spec_id_'.$n, $item['spec_id']).'</td>
	<td><textarea name="value_'.$n.'" style="resize: none; width: 350px; height: 40px;">'.$item['value'].'</textarea></td>
	<td><input type="text" name="article_'.$n.'" class="input-mini" value="'.$item['article'].'"></td>
	<td><input type="text" name="price_'.$n.'" class="input-mini" value="'.$item['price'].'"></td>
</tr>'.PHP_EOL;
                $n++;
            }
            ?>


            </tbody>
        </table>

        <br>
        <br>
        <?php echo form_hidden('count', $n);?>
        <?php echo form_hidden('id', $id);?>
        <?php echo form_hidden('id_double', $id_double);?>
        <input type="submit" class="btn btn-success" value="Сохранить">



    </form>

    <form class="form-inline pull-left" style="margin: 0; padding: 0;" action="<?php echo base_url();?>admin/edit_product" method="post">

        <?php echo form_hidden('id', $id);?>

        <input class="btn btn-small btn-info" style="margin: 5px 0 0 0;" type="submit"  value="Перейти в редактирование продукта">

    </form>
</div>
<?php
}
?>
