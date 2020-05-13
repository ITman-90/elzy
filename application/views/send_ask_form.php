<!--
<script type="text/javascript">

    $(document).ready(function(){

        init_ask();

    });

</script>



<form method="post" id="ask_form" action="<?php echo base_url();?>send_ask" onsubmit="yaCounter25390010.reachGoal('feedback'); return true;">

    <div class="callback_form_wrap"><br>

        <div class="row override_margin-left">

            <p class="information_delivery_sub_title">Возникли вопросы? Ответим!</p>
            <p>Позвоните нам <span class="zamki_simple_phone">8 (495) 364-72-44</span></p>
            <p>Задайте свой вопрос, и наш менеджер перезвонит вам.</p>
            <p>Приятных покупок вместе с <a href="<?php echo base_url();?>">Elzy.ru</a>!</p>

        </div>
        <p class="order_form_notice"><span style="color: red; font-size: 14px;">*</span> - поля обязательные для заполнения</p>

        <div class="row">
            <div class="span3">
                <div class="control-group">
                    <div class="controls">
                        <input type="text" id="ask_client_name" name="ask_client_name" placeholder="Ваше имя*" value="<?php echo $ask_client_name;?>">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="text" id="ask_client_phone" name="ask_client_phone" placeholder="Телефон для связи*" value="<?php echo $ask_client_phone;?>">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <input type="text" id="ask_client_email" name="ask_client_email" placeholder="E-mail" value="<?php echo $ask_client_email;?>">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="row override_margin-left captcha_block">

                            <div class="span2 override_margin-left captcha_img_wrap pull-left">

                                <?php

                                echo $image;

                                ?>

                            </div>

                            <div class="span1 override_margin-left captcha_update_btn_block pull-right">
                                <img id="captcha_update_btn" src="<?php echo base_url();?>public/img/index_page/captcha_update.png" title="Обновить CAPTCHA" alt="Обновить CAPTCHA">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="span3">
                <div class="control-group">
                    <div class="controls">
                        <textarea id="ask_client_text" name="ask_client_text" placeholder="Введите Ваш вопрос/комментарий" style="resize: none; height: 120px; margin: 0 0 10px 0;"><?php echo $ask_client_text;?></textarea>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="row override_margin-left">
                            <input type="text" id="ask_client_captcha" name="ask_client_captcha" placeholder="Символы с картинки*">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" class="btn btn-primary btn-big pull-right" value="Отправить">
                    </div>
                </div>
            </div>
        </div>
        <div class="row after_ask"></div>
    </div>
</form>!-->