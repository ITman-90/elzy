
<div class="container">

    <h4>Добавление нового цвета.</h4>
    <br>
    <?php echo validation_errors(); ?>

    <form action="<?php echo base_url();?>admin/add_color" method="post" enctype="multipart/form-data">


        <label>Наименование цвета:</label>
        <input type="text" name="color_name" class="input-xxlarge" value="">

        <br>

        <label>Миниатюра цвета: <span style="color: red;">Изображение 31x31px *.png!</span></label>
        <input class="btn btn-default" type="file" name="color_file" size="1000">

        <br>
        <br>
        <input type="submit" class="btn btn-success" value="Добавить">
    </form>
</div>
