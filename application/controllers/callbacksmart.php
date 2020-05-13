<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Callbacksmart extends CI_Controller
{
    function index()
    {
        SetCookie("was_popup","1", time()+864000, "/", "elzy.ru");//на 10 дней
        $page_sec = $this->input->post('page_sec');
        $stamp = $this->input->cookie('start_session');
        if (empty($stamp) || $stamp<=0) $stamp = time()-$page_sec;
        $time_str = $this->timeDifference($stamp);
        $html = '<div class="row override_margin-left">

            <div class="row override_margin-left">

                    <p style="font-size: 22pt; color: #222222; padding: 0; margin: 0 0 10px 0;  line-height: 36px;" id="submit_callbacksmart_info">Bы были у нас на сайте '.$time_str.'.<br>Вы нашли то, что искали?</p>

                    <div class="pull-right" id="close_callbacksmart_btn">
                        <img src="'.base_url().'public/img/index_page/close_modal.png" style="position: absolute; top: 5px; right: 5px; cursor: pointer;">
                    </div>
<input class="submit_callbacksmart_btn" id="submit_callbacksmart_yes" value="Да!" type="submit">
<input class="submit_callbacksmart_btn" id="submit_callbacksmart_no" value="Нет" type="submit">
<input style="display: none;" id="submit_callbacksmart_phone" placeholder="Введите ваш телефон" type="text" maxlength
="18">
<input class="submit_callbacksmart_btn" style="display: none;" id="submit_callbacksmart_call" value="Жду звонка!" type="submit">
<div style="display: none;" id="submit_callbacksmart_timer">00:89,9</div>
<p style="font-size: 12pt; color: #222222; padding: 0; margin: 20px 0 0 0;  line-height: 22px;" id="submit_callbacksmart_dopinfo">Мы искренне ценим вас. Нам важно ваше мнение, чтобы стать лучше.</p>

            </div>

</div>
';


        $hour = date("G")-9;
        if ($hour<0) $hour = 0;
        $data_array = array(
            'html' => $html,
            'calls' => 3+$hour
        );

        echo json_encode($data_array);

    }

    function send_number()
    {
        $client_number = $this->input->post('client_number');
        if (strlen($client_number)>10) $client_number = substr($client_number, 1, 10);
        $client_number = "+7 (".substr($client_number, 0, 3).") ".substr($client_number, 3, 3)."-".substr($client_number, 6, 2)."-".substr($client_number, 8, 2);




        $callbackData = array(
            'client_name' => "",
            'client_phone' => $client_number,
            'client_text' => "Заказ срочного обратного звонка.",
            'client_email' => "",
            'datetime' =>  date("Y-m-d H:i:s")
        );

        $this->client_shop_model->insertCallback($callbackData);

        $this->email->from('zamki.rf@gmail.com', 'Интернет-магазин детской одежды "Elzy.ru');
        $this->email->to('elzy@gmail.com');
        $this->email->subject('Запрос срочного обратного звонка c Elzy.ru');
        $this->email->message('
            <html>
            <body>
            Запрос срочного обратного звонка с сайта Elzy.ru<br>
            Номер телефона для связи: <strong>'.$client_number.'</strong><br>
            Перезвоните!</body></html>');

        $message_text= 'Запрос срочного обратного звонка(90 сек.)! Номер телефона для связи: '.$client_number.'. Перезвоните! (Elzy.ru)".';

        //$this->client_shop_model->SendToIcq($message_text);
        $this->email->send();

    }

    function normalizeWords($number, $words) {
        $keisi = array (2, 0, 1, 1, 1, 2);
        return $number.' '.$words[ ($number%100 > 4 && $number %100 < 20) ? 2 : $keisi[min($number%10, 5)] ];
    }
    function timeDifference($stamp)
    {
        $check_time = time() - $stamp;

        $year = floor($check_time/31104000);
        $month = floor(($check_time%31104000)/2592000);
        $days = floor(($check_time%2592000)/86400);
        $hours = floor(($check_time%86400)/3600);
        $minutes = floor(($check_time%3600)/60);
        $seconds = $check_time%60;
        $result_array = array();
        $month_pasted = false;
        $days_pasted = false;
        $hours_pasted = false;
        $minutes_pasted = false;
        if($year > 0)
        {
            array_push($result_array, $str = $this->normalizeWords($year,array('год','года','лет')));
        }
        if($month > 0)
        {
            array_push($result_array, $this->normalizeWords($month,array('месяц','месяца','месяцев')));
            $month_pasted = true;
        }
        if($days > 0 && (count($result_array)==0 || (count($result_array)==1 && $month_pasted)))
        {
            array_push($result_array, $this->normalizeWords($days,array('день','дня','дней')));
            $days_pasted = true;
        }
        if($hours > 0 && (count($result_array)==0 || (count($result_array)==1 && $days_pasted)))
        {
            array_push($result_array, $this->normalizeWords($hours,array('час','часа','часов')));
            $hours_pasted = true;
        }
        if($minutes > 0 && (count($result_array)==0 || (count($result_array)==1 && $hours_pasted)))
        {
            array_push($result_array, $this->normalizeWords($minutes,array('минуту','минуты','минут')));
            $minutes_pasted = true;
        }
        if($seconds > 0 && (count($result_array)==0 || (count($result_array)==1 && $minutes_pasted))) {array_push($result_array, $this->normalizeWords($seconds,array('сек','сек','сек')));}
        $result = implode(" ", array_slice($result_array,0,2));
        return $result;
    }


}


