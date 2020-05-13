


<div id="callback_send">


<form id="callback_form" method="post" action="">


    <div class="callback_form_wrap"><br>


        <div class="row">
            <div class="span3">

                <div class="row override_margin-left">

                    <p class="information_delivery_sub_title">Закажите звонок!</p>
                    <p>Наш менеджер перезвонит вам.</p>

                </div>
                <p class="order_form_notice"><span style="color: red; font-size: 14px;">*</span> - поля обязательные для заполнения</p>
                <div class="control-group">
                    <div class="controls">
                        <input type="text" id="callback_client_name" name="callback_client_name" placeholder="Ваше имя*">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="text" id="callback_client_phone" name="callback_client_phone" placeholder="Телефон для связи*">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <input type="text" id="callback_client_email" name="callback_client_email" placeholder="E-mail">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <textarea id="callback_client_text" name="callback_client_text" placeholder="Введите Ваш вопрос/комментарий" style="resize: none; height: 70px; margin: 0 0 10px 0;"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls callback_submit">
                        <input type="submit" id="click_to_send" class="btn btn-primary btn-big pull-right" value="Отправить">
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

    <div id="after_send_callback">
        <span id="result_callback"></span>
    </div>
</div>