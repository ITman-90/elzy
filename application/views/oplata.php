<div class="container container_override main_content_container_background">

    <div id="oplata_row" class="row override_margin-left delivery_row_wrap">

        <div class="span3 override_margin-left information_left_menu_wrap">

            <p class="information_left_menu_title">Информация</p>

            <?php

            $this->load->view('template/template_information_menu');

            ?>

        </div>

        <div class="span8 information_news_wrap">

            <div class="row override_margin-left breadcrumbs_block_wrap">

                <ul class="breadcrumbs_block inline">
                    <li><a href="http://elzy.ru/" class="inactive_breadcrumb">Главная</a> <span class="divider_breadcrumb">»</span></li>
                    <li class="active_breadcrumb">Оплата</li>
                </ul>

            </div>

            <div class="row override_margin-left information_news_list">

                <div class="row override_margin-left information_news_title_wrap">

                    <p class="information_news_title">Cпособы оплаты товара и стоимость</p>

                </div>


                <div class="row override_margin-left information_delivery_block_wrap">


                    <p class="information_delivery_sub_title">Оплата Товара</p><br>
                    <p><strong>Способы оплаты Товара:</strong></p>
                    <p><span style="font-family: PTSansBold, sans-serif; color: #02709b;">1.</span>  Физическое лицо может оплатить Заказ наличными денежными средствами при получении через курьера, либо банковской картой (при помощи переносного терминала).<br><br>
                        <span style="font-family: PTSansBold, sans-serif; color: #02709b;">2.</span>  Все другие категории Покупателей (индивидуальные предприниматели и юридические лица) оплачивают Заказ по выставленному Продавцом счету путем перечисления безналичных денежных средств, при условиях 100% предоплаты.</p>
						<p>Подробнее о <a href="http://elzy.ru/delivery">доставке здесь</a>.</p><br>

                    <p><strong>Особенности оплаты Заказа банковскими картами</strong></p>
                    <p><span style="font-family: PTSansBold, sans-serif; color: #02709b;">1.</span>  В соответствии с положением ЦБ РФ "Об эмиссии банковских карт и об операциях, совершаемых с использованием платежных карт" от 24.12.2004 №266-П операции по банковским картам совершаются держателем карты либо уполномоченным им лицом.<br><br>
                        <span style="font-family: PTSansBold, sans-serif; color: #02709b;">2.</span>  Авторизация операций по банковским картам осуществляется банком. Если у банка есть основания полагать, что операция носит мошеннический характер, то банк вправе отказать в осуществлении данной операции. Мошеннические операции с банковскими картами попадают под действие статьи 159 УК РФ.<br><br>
                        <span style="font-family: PTSansBold, sans-serif; color: #02709b;">3.</span>  Во избежание случаев различного рода неправомерного использования банковских карт при оплате, все Заказы, оформленные на Сайте и предоплаченные банковской картой, проверяются Продавцом. Согласно Правилам международных платежных систем в целях проверки личности владельца и его правомочности на использование карты Покупатель, оформивший такой заказ, обязан по запросу, поступившему от сотрудника Продавца, предоставить копию двух страниц паспорта владельца банковской карты - разворота с фотографией, а также копию банковской карты с обеих сторон (номер карты нужно закрыть, кроме последних четырех цифр). Продавец оставляет за собой право без объяснения причины аннулировать Заказ, в том числе в случае непредставления указанных документов Покупателем (по факсу или по электронной почте в виде сканированных копий) в течение 14 дней с даты оформления Заказа или наличия сомнений в их подлинности. Стоимость Заказа возвращается на карту владельца.</p>
						
                    <br>
                    <p class="information_delivery_sub_title">Стоимость Товара</p><br>
                    <p><span style="font-family: PTSansBold, sans-serif; color: #02709b;">1.</span>  Цена Товара на сайте может быть изменена Продавцом в одностороннем порядке (акции, скидки итд.). При этом цена на уже заказанный Покупателем Товар изменению не подлежит.<br><br>
                        <span style="font-family: PTSansBold, sans-serif; color: #02709b;">2.</span>  Цена Товара, указанная на Сайте, не включает в себя стоимость доставки. Стоимость доставки рассчитывается индивидуально по каждому Заказу, исходя из веса Заказа, адреса доставки, и личных пожеланий Покупателя относительно сроков и времени доставки.<br><br>
                        <span style="font-family: PTSansBold, sans-serif; color: #02709b;">3.</span>  При предоплате Товаров Заказ принимается в обработку только после зачисления денежных средств Покупателя на расчетный счет Продавца.<br><br>
                        <span style="font-family: PTSansBold, sans-serif; color: #02709b;">4.</span>  Продавец вправе предоставлять Покупателю скидки на Товар и устанавливать программу бонусов. Виды скидок, порядок и условия начисления указываются на Сайте согласно появлению информации о скидках.<br><br>
                        <span style="font-family: PTSansBold, sans-serif; color: #02709b;">5.</span>  Продавец вправе устанавливать скидки в целях продвижения того либо иного способа оплаты или доставки Товара.</p>


                </div>

                <?php

                $this->load->view('send_ask_form');

                ?>

                <br>
                <br>

            </div>

        </div>

    </div>

</div>