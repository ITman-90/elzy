<?php


$acc_group = $this->session->userdata('acc_group');


if($acc_group == 1)
{

    ?>

<!--    <pre>-->
<!--        --><?php //print_r($users);?>
<!--    </pre>-->

    <script type="text/javascript">
        $(document).ready(function()
        {
            $(".collapse").collapse();
        });

    </script>
    <div class="container">

        <h4>Скрыть пользователей.</h4>

        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Скрыть пользователей
                    </a>
                </div>

                <div id="collapseOne" class="accordion-body collapse out">
                    <div class="accordion-inner">

                        <table class="table table-bordered">
                            <tr>
                                <td style="text-align: center;"><strong>Имя</strong></td>
                                <td style="text-align: center;"><strong>Почта</strong></td>
                                <td style="text-align: center;"><strong>Скрыть</strong></td>

                            </tr>

                            <?php

                            foreach($users as $spec)
                            {
                                echo "<tr style='margin: 0; padding: 0;'>";
                                echo "<td style='text-align: center;'>".$spec->uacc_username."</td>";
                                echo "<td style='text-align: center;'>".$spec->uacc_email."</td>";

                                ?>
                                <td>

                                    <form class="form-inline pull-left" style="margin: 0; padding: 0;" action="<?php echo base_url();?>admin/hide_user/hide" method="post">

                                        <?php echo form_hidden('spec_id', $spec->uacc_id);?>
                                        <input type="checkbox" name="hide_spec">

                                        <input class="btn btn-small btn-danger" style="margin: 5px 0 0 0;" type="submit"  value="Удалить">
                                        <?php echo form_error('hide_spec'); ?>

                                    </form>

                                </td>

                                <?php

                                echo "</tr>";

                            }
                            ?>

                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>



<?

}

?>