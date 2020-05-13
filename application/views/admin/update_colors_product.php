<?php

if(empty($id))
{

    redirect(base_url()."admin/list_colors_product");

}
else
{
?>


<div class="container">

    <h4>Обновление изображений продукта в цвете</h4>
    <br>
    <p style="font-size: 12pt;"><?php echo $product_name.' ('.$id.')'; ?></p>
    <?php if (isset($product_href)) {?>
    <a href="<?php echo $product_href; ?>" target="_blank">Просмотр продукта(в новом окне)</a>
    <br>
        <br>


    <?php }?>



    <form action="<?php echo base_url();?>admin/update_colors_product/update" method="post" enctype="multipart/form-data">


        <br>
        <div class="accordion" id="color_list">
            <div class="accordion-group"> <?php
                foreach($product_colors as $color)
                {?>
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#color_list" href="#color<?php echo $color->id;?>">
                      <?php echo '<img src="'.base_url().'public/img/catalog_imgs/color/color_'.$color->id.'.png" class="colors color_id" style="margin: 3px; border: 1px solid #001d5a; cursor: pointer;" title="'.$color->color_name.'" alt="'.$color->color_name.'" / > '.$color->color_name.' ('.$color->id.')';?>
                  </a>
                </div>
                <div id="color<?php echo $color->id;?>" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <label><?php echo '<img src="'.base_url().'public/img/catalog_imgs/pages_img/'.$category_id.'/colors/img_id_'.$id.'_'.$color->id.'_big.png" / >' ; ?></label>
                        <label>Продукт "<?php echo $product_name;?>" в цвете "<?php echo $color->color_name;?>": <span style="color: red;">Изображение *.png!</span></label>
                        <input class="btn btn-default" type="file" name="prod_color<?php echo $color->id;?>" size="1000">
                        <br>
                    </div>
                </div>

                <?php
                }
                ?>
            </div>
        </div>

        <br>
        <?php echo form_hidden('id', $id);?>
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
