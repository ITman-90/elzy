
<script language="javascript">

    var textNumber = <?php echo count($name_specs_list); ?>;
    var nomencNumber = <?php echo count($shop_specs_list); ?>;

    function CreateFormElement(){

        document.getElementById('tableFabric').innerHTML += '<tr id="trId_' + textNumber+ '"><td><input class="input-xlarge" type="text" name="name_specs_' + textNumber+ '" value=""></td><td><input class="input-xlarge" type="text" name="specs_' + textNumber+ '" value=""></td><td><input class="btn btn-danger" type="button" onclick="DeleteFormElement('+textNumber+')" value="Удалить"></td></tr>';
        textNumber = textNumber +1;
        document.getElementById('maxSpecCnt').value=textNumber ;
    }
    function CreateNomencElement(){

        document.getElementById('tableNomenc').innerHTML += '<tr id="trNomencId_' + nomencNumber+ '"><td><input class="input-xxlarge" type="text" name="nomenc_' + nomencNumber+ '" value=""></td><td><input class="btn btn-danger" type="button" onclick="DeleteNomencElement('+nomencNumber+')" value="Удалить"></td></tr>';
        nomencNumber = nomencNumber +1;
        document.getElementById('maxNomencCnt').value=nomencNumber ;
    }
    function DeleteFormElement(id){
        var element = document.getElementById('trId_'+id);
        element.parentNode.removeChild(element);
        if (id == textNumber-1)
        {
            textNumber = textNumber - 1;
            document.getElementById('maxSpecCnt').value=textNumber ;
        }
    }
    function DeleteNomencElement(id){
        var element = document.getElementById('trNomencId_'+id);
        element.parentNode.removeChild(element);
        if (id == nomencNumber-1)
        {
            nomencNumber = nomencNumber - 1;
            document.getElementById('maxNomencCnt').value=nomencNumber ;
        }
    }
</script>
<script type="text/javascript">
    tinymce.init({
        selector: "#description",
        theme: "modern",
        language: "ru",
        height: 300,
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
            "save table contextmenu directionality template paste textcolor"
        ],
        forced_root_block : "",
        force_p_newlines : 'false',
        force_br_newlines : 'true',
        remove_linebreaks : 'false',
        remove_trailing_nbsp : 'false',
        verify_html : 'false'
    });

</script>
<div class="container">

    <h4>Добавление продукта.</h4>
    <br>

    <?php echo $custom_error_list; ?>
    <?php echo validation_errors(); ?>
    <p style="font-size: 12pt;">Выбираем категорию продукта:</p>

    <?php
    $last_prod = $products[0]->id;
    ?>


    <form action="<?php echo base_url();?>admin/add_product" method="post" enctype="multipart/form-data">

        <select name='category'>
            <option disabled selected>- Выбираем категорию -</option>
            <?php

            foreach($view as $v)
            {
                echo "<option disabled style='font-weight: bold; color: #f47d00;'>".$v->catalog_category_name."</option>".PHP_EOL;

                foreach($category as $cat)
                {
                    $selected = "";
                    if ($cat->category_id == $category_id) $selected=" selected";

                    if($cat->catalog_category_id == $v->id)
                    {
                        echo "<option value='".$cat->category_id."'".$selected.">".$cat->category_name." -> ".$cat->category_id."</option>".PHP_EOL;
                    }
                }
            }

            ?>
        </select>
        <br>

        <label>Наименование продукта:</label>
        <input type="text" name="product_name" class="input-xxlarge" value="<?php echo set_value('product_name'); ?>">

        <label>Описание продукта:</label>
        <textarea id="description" name="description" style="resize: none;"><?php echo set_value('description'); ?></textarea>

        <br>
        <label>Тэги для поиска (<span style="color: red;">обязательно разделение слов ","</span>):</label>
        <textarea id="search_tags" name="search_tags" style="resize: none; width: 530px;" rows="3"><?php echo set_value('search_tags'); ?></textarea>

        <br>
        <label>Тех. характеристики:</label>

        <table class="table table-bordered" style="width: 800px">
            <tbody id="tableFabric">
            <tr>
                <td style="text-align: center; width: 40%;"><strong>Наименование</strong></td>
                <td style="text-align: center; width: 40%;"><strong>Значение</strong></td>
                <td style="text-align: center; width: 20%;"><strong>Удалить</strong></td>
            </tr>
            <?php
            $n = 0;
            foreach($name_specs_list as $name_spec)
            {
                echo '
<tr id="trId_'.$n.'">
	<td><input class="input-xlarge" type="text" name="name_specs_'.$n.'" value="'.$name_spec.'"></td>
	<td><input class="input-xlarge" type="text" name="specs_'.$n.'" value="'.$specs_list[$n].'"></td>
	<td><input class="btn btn-danger" type="button" onclick="DeleteFormElement('.$n.')" value="Удалить"></td>
</tr>'.PHP_EOL;
                $n++;
            }
            ?>


            </tbody>
        </table>

        <input class="btn btn-default" type="button" value="Добавить характеристику" onClick="CreateFormElement()">
        <br>
        <br>
        <label>Спецификации:</label>

        <table class="table table-bordered" style="width: 800px">
            <tbody id="tableNomenc">
            <tr>
                <td style="text-align: center; width: 80%;"><strong>Наименование</strong></td>
                <td style="text-align: center; width: 20%;"><strong>Удалить</strong></td>
            </tr>
            <?php
            $n = 0;
            foreach($shop_specs_list as $shop_spec)
            {
                echo '
<tr id="trNomencId_'.$n.'">
	<td><input class="input-xxlarge" type="text" name="nomenc_'.$n.'" value="'.$shop_spec.'"></td>
	<td><input class="btn btn-danger" type="button" onclick="DeleteNomencElement('.$n.')" value="Удалить"></td>
</tr>'.PHP_EOL;
                $n++;
            }
            ?>


            </tbody>
        </table>

        <input class="btn btn-default" type="button" value="Добавить спецификацию" onClick="CreateNomencElement()">
        <br>

        <br>
        <label>Цвета:</label>
        <div class="accordion" id="color_list">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#color_list" href="#collapsecolor">
                        Выбрать цвета
                    </a>
                </div>
                <div id="collapsecolor" class="accordion-body collapse">
                    <div class="accordion-inner">


                        <?php
                        foreach($colors_list as $color)
                        {
                            $checked = "";
                            if (in_array($color->id, $product_colors)) {
                                $checked=" checked";
                            }
                            echo '&nbsp;<label class="checkbox btn"><img src="'.base_url().'public/img/catalog_imgs/color/color_'.$color->id.'.png" class="colors color_id" style="margin: 3px; border: 1px solid #001d5a; cursor: pointer;" title="'.$color->color_name.'" alt="'.$color->color_name.'" / > <input type="checkbox" name="color'.$color->id.'"'.$checked.'>'.$color->color_name.' ('.$color->id.')</label>'.PHP_EOL;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <br>
        <label>Изображение для продукта: <span style="color: red;">Изображение *.png!</span></label>
        <input type="file" class="btn btn-default" name="prod_foto" size="1000">
        <br>
        <label>Увеличенное изображение для продукта: <span style="color: red;">Изображение *.png!</span></label>
        <input type="file" class="btn btn-default" name="big_prod_foto" size="1000">
        <br>
        <label>Изображение упаковки для продукта: <span style="color: red;">Изображение *.png!</span></label>
        <input type="file" class="btn btn-default" name="box_prod_foto" size="1000">
        <br>
        <label>Схема для продукта: <span style="color: red;">Изображение *.png!</span></label>
        <input type="file" class="btn btn-default" name="scheme_prod_foto" size="1000">
        <br>
        <label>Комплект для продукта: <span style="color: red;">Изображение *.png!</span></label>
        <input type="file" class="btn btn-default" name="komplekt_prod_foto" size="1000">


        <br>
        <br>
        <input type="hidden" name="hidden_mark" value="1" />
        <input type="hidden" name="maxSpecCnt" value="<?php echo count($name_specs_list);?>" id="maxSpecCnt" />
        <input type="hidden" name="maxNomencCnt" value="<?php echo count($shop_specs_list);?>" id="maxNomencCnt" />
        <input type="submit" class="btn btn-success" value="Добавить">



    </form>

</div>