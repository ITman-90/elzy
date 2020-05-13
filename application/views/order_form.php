<script type="text/javascript">

    $(document).ready(function(){

        outer_fn();

    });

</script>

<br>

<form method="post" id="order_form" action="<?php echo base_url();?>cart/send_from_cart" onsubmit="yaCounter25390010.reachGoal('success_order'); return true;">
    <p class="order_form_info">Отправьте заявку, мы свяжется с Вами в ближайшее время и согласуем <a href="<?php echo base_url();?>oplata">условия оплаты</a> и <a href="<?php echo base_url();?>delivery">доставки</a>.</p>
    <div class="span4">


        <p class="order_form_notice"><span style="color: red; font-size: 14px;">*</span> - поля обязательные для заполнения</p>

        <div class="control-group">
            <div class="controls">
                <input type="text" id="client_name" name="client_name" placeholder="Ваше имя*">
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <input type="text" id="client_secondname" name="client_secondname" placeholder="Ваша фамилия">
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <input type="text" id="client_phone" name="client_phone" placeholder="Телефон для связи*">
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <input type="text" id="client_email" name="client_email" placeholder="E-mail*">
            </div>
        </div>

    </div>

    <div class="span4">

        <div class="row override_margin-left" style="margin: 30px 0 0 0;">

            <div class="control-group">
                <div class="controls">
                    <textarea id="client_addr" name="client_addr" placeholder="Адрес доставки*" style="resize: none; height: 70px;"></textarea>
                </div>
            </div>


            <div class="control-group" style="margin: 20px 0 0 0;">
                <div class="controls">
                    <textarea id="client_comment" name="client_comment" placeholder="Реквизиты/пожелания" style="resize: none; height: 70px;"></textarea>
                </div>
            </div>

        </div>

    </div>

    <div class="span4" style="width: 305px;">

        <br>
        <br>
        <br>
        <br>

        <div class="control-group">
            <div class="controls">
                <input type="checkbox" id="offers" style="margin: 0 10px 0 0;"><span>с <a href="#">условиями покупки</a> ознакомлен и согласен</span>
            </div>
        </div>

        <br>

        <div class="control-group">
            <div class="controls">
                <input type="submit" id="send_to_client" class="btn btn-primary btn-large pull-left" value="Отправить" disabled="disabled">
            </div>
        </div>

    </div>

</form>