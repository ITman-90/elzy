<?php


$acc_group = $this->session->userdata('acc_group');

if($acc_group == 1)
{

?>

    <div class="container override_container">

        <p>Добавь юзера!<br>Enjoy!</p>

        <div class="row override_margin-left">

            <form action="<?php echo base_url();?>admin/add_user/add_new_user" method="post">

                <label>Username</label>
                <input type="text" name="username" id="username">

                <label>E-mail</label>
                <input type="text" name="email" id="email">

                <label>Password</label>
                <input type="password" name="password" id="password">

                <label>Category</label>

                <select name="groups" id="groups">
                    <?php

                    $groups = $this->flexi_auth->get_groups()->result();

                    foreach($groups as $group)
                    {

                        echo "<option value=\"".$group->ugrp_id."\">".$group->ugrp_name."</option>";

                    }

                    ?>
                </select>
                <br>

                <?php echo form_hidden('uri', $_SERVER['REQUEST_URI'])?>

                <input type="submit" class="btn btn-success" value="Add user">

            </form>

        </div>

    </div>

<?php

}
else
{

    ?>
    <div class="container override_container">

        У вас нету прав на редактирование этого раздела.

    </div>


<?php



}
?>