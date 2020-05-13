
<div class="container">

    <h4>Редактировать цветовую палитру</h4>
    <br>
    <?php echo validation_errors(); ?>
    <br>
    <div class="accordion" id="color_list">
        <div class="accordion-group"> <?php
            foreach($colors_list as $color)
            {?>
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#color_list" href="#color<?php echo $color->id;?>">
                  <?php echo '<img src="'.base_url().'public/img/color/color_'.$color->id.'.png" class="colors color_id" style="margin: 3px; border: 1px solid #001d5a; cursor: pointer;" title="Elzy.ru" / > <img src="'.base_url().'public/img/catalog_imgs/color/color_'.$color->id.'.png" class="colors color_id" style="margin: 3px; border: 1px solid #001d5a; cursor: pointer;" / > <img src="'.base_url().'public/img/catalog_imgs/color/color_'.$color->id.'.png" class="colors color_id" style="margin: 3px; border: 1px solid #001d5a; cursor: pointer;" title="Elzy" / > '.$color->color_name.' ('.$color->id.')';?>
              </a>
            </div>
            <div id="color<?php echo $color->id;?>" class="accordion-body collapse">
                <div class="accordion-inner">

                    <form action="<?php echo base_url();?>admin/list_color" method="post" enctype="multipart/form-data">

                    <label>Наименование цвета:</label>
                    <input type="text" name="color_name" class="input-xxlarge" value="<?php echo $color->color_name;?>" />

                    <br>
                    <label>Миниатюра цвета: <span style="color: red;">Изображение 31x31px *.png!</span></label>
                    <input class="btn btn-default" type="file" name="color_file" size="1000" />

                        <br>
                        <br>
                        <?php echo form_hidden('color_id', $color->id);?>
                        <input type="submit" class="btn btn-success" value="Сохранить">
                    </form>
                </div>
            </div>

            <?php
            }
            ?>
        </div>
    </div>
</div>
