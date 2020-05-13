<div class="container">

    <form action="<?php echo base_url();?>admin/loginin/check_user" method="post">

        <label>Имя пользователя</label>
        <input class="input-large" type="text" name="username" id="username" />

        <label>Пароль</label>
        <input class="input-large" type="password" name="password" id="password" />

        <?php echo form_hidden('uri', $_SERVER['REQUEST_URI'])?>

        <br>
        <br>
        <input type="submit" class="btn btn-info" value="Войти">

    </form>

</div>