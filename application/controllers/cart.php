<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cart extends CI_Controller {

    function index()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'cart';

        $this->load->view('template/template_cart', $data);

    }

    function cart_get_data_ajax()
    {

        $product_id = $this->input->post('product_id');
        $shop_product_color = $this->input->post('shop_product_color');
        $shop_product_spec = $this->input->post('shop_product_spec');

        $get_price = array(
            'product_id' => $product_id,
            'shop_product_color' => $shop_product_color,
            'shop_product_spec' => $shop_product_spec
        );

        $shop_product_array = $this->client_shop_model->getShopProductPrice($get_price);

        echo json_encode($shop_product_array);

    }

    function add_to_cart()
    {

        $shop_product_id = $this->input->post('shop_product_id');
        $shop_product_price = $this->input->post('product_price');
        $shop_product_weight = $this->input->post('product_weight');
        $product_id = $this->input->post('product_id');
        $product_name = $this->input->post('product_title');
        $shop_product_count = $this->input->post('product_qty_val');
        $shop_product_color = $this->input->post('product_color_name');
        $shop_product_spec = $this->input->post('product_spec_name');
        $product_url = $this->input->post('product_url');
        $collate_status = $this->input->post('collate_status');
        $bookmarks_status = $this->input->post('bookmarks_status');

        $item_data = array
        (
            'id' => $shop_product_id,
            'name' => $product_name,
            'quantity' => $shop_product_count,
            'price' => $shop_product_price,
            'weight' => $shop_product_weight,
            'options' => array(
                'product_id' => $product_id,
                'shop_product_color' => $shop_product_color,
                'shop_product_spec' => $shop_product_spec,
                'product_url' => $product_url,
                'collate_status' => $collate_status,
                'bookmarks_status' => $bookmarks_status,
            )
        );

        $this->flexi_cart->insert_items($item_data);

        $cart_count = $this->update_cart_count_ajax();
        $cart_summary = $this->update_cart_price_ajax();

        $sendback_data = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_count' => $shop_product_count,
            'product_price' => $shop_product_price,
            'product_color_name' => $shop_product_color,
            'product_spec_name' => $shop_product_spec,
            'product_url' => $product_url,
            'cart_count' => $cart_count,
            'cart_summary' => $cart_summary
        );

        echo json_encode($sendback_data);

    }

    function update_cart_count_ajax()
    {
        $cart_item_count = $this->flexi_cart->cart_summary();

        return $cart_item_count['total_items'];

    }

    function update_cart_price_ajax()
    {
        $cart_item_count = $this->flexi_cart->cart_summary();

        $cart_summary = $cart_item_count['total'];
        $cart_summary = substr($cart_summary, 0, -3);
        $cart_summary = str_replace("&nbsp;", "", $cart_summary);
        $cart_summary = str_replace(",", "", $cart_summary);

        return $cart_summary;
    }

    function send_from_cart()
    {

        $datedo = "%Y%m%d%H%i%s";
        $timedo = time();
        $datetimedo = mdate($datedo, $timedo);

        $cli_id = mt_rand(10000, 20000);
        $client_id = $cli_id;


        $config_question = array(
            array(
                'field'   => 'client_name',
                'label'   => 'Ваше имя',
                'rules'   => 'trim|strip_tags|required|xss_clean'
            ),
            array(
                'field'   => 'client_phone',
                'label'   => 'Телефон',
                'rules'   => 'trim|strip_tags|required|xss_clean'
            ),
            array(
                'field'   => 'client_email',
                'label'   => 'E-mail',
                'rules'   => 'trim|strip_tags|required|xss_clean'
            ),
            array(
                'field'   => 'client_addr',
                'label'   => 'Адрес',
                'rules'   => 'trim|strip_tags|required|xss_clean'
            )
        );

        $this->form_validation->set_rules($config_question);

        $this->form_validation->set_error_delimiters('<div class="email_question_error" style="margin: 0; padding: 0; color: red; font-size: 8pt;">', '</div>');

        if($this->form_validation->run() == FALSE)
        {

            $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
            $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

            $data['template_content'] = 'cart';

            $this->load->view('template/template', $data);

        }
        else
        {
            $client_name = xss_clean($this->input->post('client_name'));
            $client_secondname = xss_clean($this->input->post('client_secondname'));
            $client_phone = xss_clean($this->input->post('client_phone'));
            $client_email = xss_clean($this->input->post('client_email'));
            $client_addr = xss_clean($this->input->post('client_addr'));
            $client_comment = xss_clean($this->input->post('client_comment'));

            $cart_total = $this->flexi_cart->total();

            $cart_total = str_replace("&nbsp;", '',str_replace(",","",substr($cart_total, 0, -3)));

            $datestring = "%Y-%m-%d %H-%i-%s";
            $time = time();

            $datetime = mdate($datestring, $time);

            $client_data_array = array(
                'client_id' => $client_id,
                'client_name' => $client_name." ".$client_secondname,
                'client_phone' => $client_phone,
                'client_email' => $client_email,
                'client_addr' => $client_addr,
                'client_comment' => $client_comment,
                'cart_total' => $cart_total,
                'datetime' => $datetime,
                'client_order' => ''
            );

            $cart_items = $this->flexi_cart->cart_items();

            $cart_total_weight = str_replace(",","",$this->flexi_cart->total_weight());

            $cart_rowid = array_keys($cart_items);

            $cart_rowid_count = count($cart_rowid);

            $client_order_array = array();

            for($i=0; $i<$cart_rowid_count; $i++)
            {


                $shop_product_id = $cart_items[$cart_rowid[$i]]['id'];
                $product_name= $cart_items[$cart_rowid[$i]]['name'];

                $shop_product_count = $cart_items[$cart_rowid[$i]]['quantity'];
                $shop_product_price = $cart_items[$cart_rowid[$i]]['price'];
                $shop_product_weight = $cart_items[$cart_rowid[$i]]['weight'];

                $shop_product_price = str_replace("&nbsp;", '',str_replace(",","",substr($shop_product_price, 0, -3)));

                $total_price = $cart_items[$cart_rowid[$i]]['price_total'];

                $total_price = str_replace("&nbsp;", '',str_replace(",","",substr($total_price, 0, -3)));

                $product_id = $cart_items[$cart_rowid[$i]]['options']['product_id'];
                $product_url = $cart_items[$cart_rowid[$i]]['options']['product_url'];
                $shop_product_color = $cart_items[$cart_rowid[$i]]['options']['shop_product_color'];
                $shop_product_spec = $cart_items[$cart_rowid[$i]]['options']['shop_product_spec'];


                $client_cart_items = array(
                    'shop_product_id' => $shop_product_id,
                    'product_name' => $product_name,
                    'product_id' => $product_id,
                    'shop_product_count' => $shop_product_count,
                    'shop_product_price' => $shop_product_price,
                    'shop_product_total_price' => $total_price,
                    'product_url' => $product_url,
                    'shop_product_color' => $shop_product_color,
                    'shop_product_spec' => $shop_product_spec,
                    'shop_product_weight' => $shop_product_weight,
                    'cart_total_weight' => $cart_total_weight,
                    'datetime' => $datetime
                );

                $client_cart_items = (object) $client_cart_items;

                array_push($client_order_array, $client_cart_items);

            }

            $client_order = json_encode($client_order_array);

            $client_data_array['client_order'] = $client_order;

            $this->client_shop_model->insertClientCartLog($client_data_array);


            /*send email*/

            $client_email_body = array();
            $moder_email_body = array();

            foreach($client_order_array as $email_body)
            {

                $str = '
                <tr>
                <td style="text-align: left;">'.$email_body->product_name.' '.$email_body->shop_product_color.' '.$email_body->shop_product_spec.'</td>
                <td style="text-align: center;">'.$email_body->shop_product_count.'</td>
                <td style="text-align: center;">'.str_replace(",","",$email_body->shop_product_price).'</td>
                <td style="text-align: center;">'.str_replace(",","",$email_body->shop_product_total_price).'</td>
                <tr>
                ';

                array_push($client_email_body, $str);

            }

            $client_email_body = implode('', $client_email_body);

            $client_send_mail = '
            <html>
            <body>

            <h3>Ваш заказ в Интернет-магазине детской одежды "Elzy.ru"</h3>
            <br>
            <h3>Номер заказа № '.$client_id.'</h3>

            <table border="1">

            <tr>
            <td style="text-align: left;">Наименование товара</td>
            <td style="text-align: center;">Количество<br>шт.</td>
            <td style="text-align: center;">Стоимость<br>в рублях</td>
            <td style="text-align: center;">Полная сумма<br>в рублях</td>
            </tr>'.$client_email_body.'
            <tr>
            <td colspan="3" style="text-align: left;"><strong>Общая сумма в рублях</strong></td>
            <td style="text-align: center;">'.$cart_total.'</td>
            </tr>

            </table>
            <br>
            <p style="color: red; font-size: 8pt; line-height: 10px; margin: 5px 0 0 0;">*В общей сумме заказа не указана стоимость доставки. Для уточнения условий доставки вашего заказа перейдите в раздел <a href="'.base_url().'delivery" target="_blank" style="cursor: pointer;">"Доставка"</a> или свяжитесь с менеджером по телефону <span class="zamki_simple_phone">8 (495) 364-72-44</span>.</p>

            </body>
            </html>
            ';

            foreach($client_order_array as $email_body)
            {

                $str = '
                <tr>
                <td style="text-align: left;">'.$email_body->product_name.' '.$email_body->shop_product_color.' '.$email_body->shop_product_spec.'</td>
                <td style="text-align: center;">'.str_replace(",","",$email_body->shop_product_weight).'</td>
                <td style="text-align: center;">'.$email_body->shop_product_count.'</td>
                <td style="text-align: center;">'.str_replace(",","",$email_body->shop_product_price).'</td>
                <td style="text-align: center;">'.str_replace(",","",$email_body->shop_product_total_price).'</td>
                <tr>
                ';

                array_push($moder_email_body, $str);

            }
            $return_ya_goods_body = array();
            $i=0;
            foreach($client_order_array as $cl_items)
            {
                $i++;
                $add = ",";
                if ($i== count($client_order_array))
                {
                    $add="";
                }
                $str =  '
                {
                  id: "'.$cl_items->shop_product_id.'",
                  s_name: "'.$cl_items->product_name.'",
                  color: "'.$cl_items->shop_product_color.'",
                  spec: "'.$cl_items->shop_product_spec.'",
                  name: "'.$cl_items->product_name.' ('.$cl_items->shop_product_color.') ('.$cl_items->shop_product_spec.')",
                  price: '.$cl_items->shop_product_price.',
                  total_weight: '.($cl_items->shop_product_weight * $cl_items->shop_product_count).',
                  quantity: '.$cl_items->shop_product_count.'
                }'.$add.PHP_EOL;



                array_push($return_ya_goods_body, $str);
            }

            $ya_goods_body = implode('', $return_ya_goods_body);

            $yaParams = '
<script type="text/javascript">
var yaParams = {
  order_id: "'.$client_id.'",
  order_price: '.$cart_total.',
  order_total_weight: '.$cart_total_weight.',
  currency: "RUR",
  exchange_rate: 1,
  goods:
     [
'.$ya_goods_body.'
      ]
};
</script>';

            $moder_email_body = implode('', $moder_email_body);

            $moder_send_mail = '
            <html>
            <body>

            <h3>Новый заказ в Интернет-магазине от '.$client_name." ".$client_secondname.'</h3>
            <br>
            <h3>Номер заказа № '.$client_id.'</h3>
            <h3>Клиент: '.$client_name." ".$client_secondname.'</h3>
            <h3>Телефон: '.$client_phone.'</h3>
            <h3>Адрес: '.$client_addr.'</h3>
            <h3>Почта: '.$client_email.'</h3>

            <table border="1">

            <tr>
            <td style="text-align: left;">Наименование товара</td>
            <td style="text-align: center;">Вес<br>в граммах</td>
            <td style="text-align: center;">Количество<br>шт.</td>
            <td style="text-align: center;">Стоимость<br>в рублях</td>
            <td style="text-align: center;">Полная сумма<br>в рублях</td>
            </tr>'.$moder_email_body.'
            <tr>
            <td colspan="4" style="text-align: left;"><strong>Общий вес в граммах</strong></td>
            <td style="text-align: center;">'.$cart_total_weight.' г.</td>
            </tr>
            <tr>
            <td colspan="4" style="text-align: left;"><strong>Общая сумма в рублях</strong></td>
            <td style="text-align: center;">'.$cart_total.' руб.</td>
            </tr>

            </table>
            <br>
            <h3>Комментарий к заказу: '.$client_comment.' </h3>
            </body>
            </html>
            ';


            $this->email->from('elzy@gmail.com', 'Интернет-магазин детской одежды "Elzy.ru"');
            $this->email->to($client_email);
            $this->email->subject('Ваш заказ в Интернет-магазине детской одежды "Elzy.ru"');
            $this->email->message($client_send_mail);
            $this->email->send();


            $this->email->from('elzy@gmail.com', 'Интернет-магазин детской одежды "Elzy.ru"');
            $this->email->to('elzy@gmail.com');
            $this->email->subject('Новый заказ в Интернет-магазине от '.$client_name." ".$client_secondname);
            $this->email->message($moder_send_mail);
            $this->email->send();

            $this->flexi_cart->destroy_cart();

            $this->session->set_userdata('order_send', 1);
            $this->session->set_userdata('order_id', $client_id);
            $this->session->set_userdata('yaparams', $yaParams);
            redirect('cart');
        }
    }

    function destroy_cart()
    {
        $this->flexi_cart->destroy_cart();

        redirect('cart');

    }

    function update_item_cart()
    {

        $row_id = $this->input->post('row_id');
        $qty = $this->input->post('qty');

        $item_data = array(
            'row_id' => $row_id,
            'quantity' => $qty
        );

        $this->flexi_cart->update_cart($item_data);

        $sendback_data = array(
            'success_data' => 1
        );

        echo json_encode($sendback_data);

    }

    function delete_item_cart()
    {

        $row_id = $this->input->post('row_id');
        $qty = 0;

        $item_data = array(
            'row_id' => $row_id,
            'quantity' => $qty
        );

        $this->flexi_cart->update_cart($item_data);

        $sendback_data = array(
            'success_data' => 1
        );

        echo json_encode($sendback_data);

    }

    function cart_order()
    {
        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'cart_order';

        $this->load->view('template/template', $data);
    }

    function modal_order()
    {
        $this->load->view('modal_order');
    }

    function order_form()
    {
        $this->load->view('order_form');
    }

    function callback_form()
    {
        $this->load->view('callback_form');
    }


    function test_sphinx()
    {

        function value_sort($a, $b)
        {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        }

        $keywords = xss_clean($this->input->post('search_query'));

        $this->sphinxsearch->setMatchMode(SPH_MATCH_PHRASE);
        $this->sphinxsearch->setSortMode(SPH_SORT_RELEVANCE);

        $products_result = $this->sphinxsearch->query($keywords, 'zamkirf');

        if($products_result['total'] >= 1)
        {
            $products_result = array_keys($products_result["matches"]);

            uasort($products_result, "value_sort");


            $data['products_result'] =  $this->client_shop_model->getProductByIdForSearch($products_result);


        }
        else
        {
            $data['products_result'] = 0;
        }


        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['keywords'] = $keywords;

        $data['template_content'] = 'search';

        $this->load->view('template/template_cart', $data);

    }

    function get_products_autocomplete()
    {

        $products_auto_complete = $this->client_shop_model->getProductsAutoCompleteList();

        $products_names = array();

        foreach($products_auto_complete as $product)
        {
            $value_arr = array(
                'value' => $product->product_name
            );

            array_push($products_names, $value_arr);
        }

        echo json_encode($products_names);

    }

    function set_user_product_view()
    {
        $datestring = "%Y-%m-%d %H-%i-%s";
        $time = time();

        $datetime = mdate($datestring, $time);

        $user_product_view_data = array(
            'product_id' => xss_clean($this->input->post('product_id')),
            'product_name' => xss_clean($this->input->post('product_name')),
            'product_price' => xss_clean($this->input->post('product_price')),
            'product_url' => xss_clean($this->input->post('product_url')),
            'product_card_name' => xss_clean($this->input->post('product_card_name')),
            'product_model_name' => xss_clean($this->input->post('product_model_name')),
            'user_session_id' => xss_clean($this->input->post('user_session_id')),
            'datetime' => $datetime
        );

        $send_data = $this->client_shop_model->setUserProductView($user_product_view_data);

        $sess_id = $this->input->post('user_session_id');

        if($send_data == true)
        {

            $answer_data = array(
                'user_session_id' => $sess_id
            );

            echo json_encode($answer_data);
        }

    }

    function set_product_bookmark()
    {
        $datestring = "%Y-%m-%d %H-%i-%s";
        $time = time();

        $datetime = mdate($datestring, $time);

        $user_product_view_data = array(
            'product_id' => xss_clean($this->input->post('product_id')),
            'product_name' => xss_clean($this->input->post('product_name')),
            'product_price' => xss_clean($this->input->post('product_price')),
            'product_url' => xss_clean($this->input->post('product_url')),
            'product_card_name' => xss_clean($this->input->post('product_card_name')),
            'product_model_name' => xss_clean($this->input->post('product_model_name')),
            'user_session_id' => xss_clean($this->input->post('user_session_id')),
            'datetime' => $datetime
        );

        $send_data = $this->client_shop_model->setProductBookmark($user_product_view_data);

        $sess_id = xss_clean($this->input->post('user_session_id'));

        if($send_data == true)
        {

            $answer_data = array(
                'user_session_id' => $sess_id
            );

            echo json_encode($answer_data);
        }

    }

    function set_product_collate()
    {
        $datestring = "%Y-%m-%d %H-%i-%s";
        $time = time();

        $datetime = mdate($datestring, $time);

        $collate_product_data = array(
            'product_id' => xss_clean($this->input->post('product_id')),
            'product_name' => xss_clean($this->input->post('product_name')),
            'product_price' => xss_clean($this->input->post('product_price')),
            'product_url' => xss_clean($this->input->post('product_url')),
            'product_card_name' => xss_clean($this->input->post('product_card_name')),
            'product_model_name' => xss_clean($this->input->post('product_model_name')),
            'user_session_id' => xss_clean($this->input->post('user_session_id')),
            'product_spec_names' => xss_clean($this->input->post('product_spec_names')),
            'product_spec_values' => xss_clean($this->input->post('product_spec_values')),
            'datetime' => $datetime
        );

        $send_data = $this->client_shop_model->setCollateProduct($collate_product_data);

        $sess_id = xss_clean($this->input->post('user_session_id'));

        if($send_data == true)
        {

            $answer_data = array(
                'user_session_id' => $sess_id
            );

            echo json_encode($answer_data);
        }

    }

    function get_user_product_view()
    {


        $user_session_id = xss_clean($this->input->post('user_session_id'));

        $send_data = $this->client_shop_model->getUserProductView($user_session_id);

        $user_products_view = array();

        foreach($send_data as $senddata)
        {
            $value_arr = array(
                'product_id' => $senddata->product_id,
                'product_name' => $senddata->product_name,
                'product_price' => $senddata->product_price,
                'product_url' => $senddata->product_url,
                'product_card_name' => $senddata->product_card_name,
                'product_model_name' => $senddata->product_model_name,
                'user_session_id' => $senddata->user_session_id
            );

            $value_arr = implode("::" ,$value_arr);

            array_push($user_products_view, $value_arr);
        }

        $user_products_view = array_unique($user_products_view);
        $user_products_view = array_values($user_products_view);

        $user_array_send = array();

        for($i=0; $i<count($user_products_view); $i++)
        {

            $tmp_str = $user_products_view[$i];
            $tmp_str = explode("::", $tmp_str);

            array_push($user_array_send, $tmp_str);

        }

        $user_view_products = array();

        foreach($user_array_send as $uas)
        {
            $tmp_array = array(
                'product_id' => $uas[0],
                'product_name' => $uas[1],
                'product_price' => $uas[2],
                'product_url' => $uas[3],
                'product_card_name' => $uas[4],
                'product_model_name' => $uas[5],
                'user_session_id' => $uas[6],
                'user_view_products_count' => count($user_array_send)
            );

            array_push($user_view_products, $tmp_array);

        }

        echo json_encode($user_view_products);

    }

    function get_product_bookmark()
    {


        $user_session_id = xss_clean($this->input->post('user_session_id'));

        $send_data = $this->client_shop_model->getProductBookmarks($user_session_id);

        $user_products_view = array();

        foreach($send_data as $senddata)
        {
            $value_arr = array(
                'product_id' => $senddata->product_id,
                'product_name' => $senddata->product_name,
                'product_price' => $senddata->product_price,
                'product_url' => $senddata->product_url,
                'product_card_name' => $senddata->product_card_name,
                'product_model_name' => $senddata->product_model_name,
                'user_session_id' => $senddata->user_session_id
            );

            $value_arr = implode("::" ,$value_arr);

            array_push($user_products_view, $value_arr);
        }

        $user_products_view = array_unique($user_products_view);
        $user_products_view = array_values($user_products_view);

        $user_array_send = array();

        for($i=0; $i<count($user_products_view); $i++)
        {

            $tmp_str = $user_products_view[$i];
            $tmp_str = explode("::", $tmp_str);

            array_push($user_array_send, $tmp_str);

        }

        $user_view_products = array();

        foreach($user_array_send as $uas)
        {
            $tmp_array = array(
                'product_id' => $uas[0],
                'product_name' => $uas[1],
                'product_price' => $uas[2],
                'product_url' => $uas[3],
                'product_card_name' => $uas[4],
                'product_model_name' => $uas[5],
                'user_session_id' => $uas[6],
                'user_bookmarks_count' => count($user_array_send)
            );

            array_push($user_view_products, $tmp_array);

        }

        echo json_encode($user_view_products);

    }

    function get_collate_data()
    {

        $user_session_id = xss_clean($this->input->post('user_session_id'));

        $get_data = $this->client_shop_model->getCollateData($user_session_id);

        $collate_data = array();

        foreach($get_data as $getdata)
        {
            $value_arr = array(
                'product_id' => $getdata->product_id,
                'product_name' => $getdata->product_name,
                'product_price' => $getdata->product_price,
                'product_url' => $getdata->product_url,
                'product_card_name' => $getdata->product_card_name,
                'product_model_name' => $getdata->product_model_name,
                'product_spec_names' => $getdata->product_spec_names,
                'product_spec_values' => $getdata->product_spec_values,
                'user_session_id' => $getdata->user_session_id
            );

            $value_arr = implode("::" ,$value_arr);

            array_push($collate_data, $value_arr);
        }

        $collate_data = array_unique($collate_data);
        $collate_data = array_values($collate_data);


        $collate_array_send = array();

        for($i=0; $i<count($collate_data); $i++)
        {

            $tmp_str = $collate_data[$i];
            $tmp_str = explode("::", $tmp_str);

            array_push($collate_array_send, $tmp_str);

        }

        $collate_send_data = array();

        foreach($collate_array_send as $cas)
        {
            $tmp_array = array(
                'product_id' => $cas[0],
                'product_name' => $cas[1],
                'product_price' => $cas[2],
                'product_url' => $cas[3],
                'product_card_name' => $cas[4],
                'product_model_name' => $cas[5],
                'user_session_id' => $cas[8],
                'user_collate_products_count' => count($collate_array_send)
            );

            array_push($collate_send_data, $tmp_array);

        }

        echo json_encode($collate_send_data);


    }

    function collate_view()
    {

        $user_session_id = $this->session->userdata('session_id');

        $get_data = $this->client_shop_model->getCollateData($user_session_id);

        foreach($get_data as $collate_data)
        {

            $product_id = $collate_data->product_id;

            $sale_status = $this->client_shop_model->getSaleStatusById($product_id);
            $new_status = $this->client_shop_model->getNewStatusById($product_id);

            $sale_status = $sale_status[0]->product_sale;
            $new_status = $new_status[0]->product_new;

            if($sale_status == 1)
            {
                $collate_data->sale_status = 1;
            }
            else
            {
                $collate_data->sale_status = 0;
            }

            if($new_status == 1)
            {
                $collate_data->new_status = 1;
            }
            else
            {
                $collate_data->new_status = 0;
            }

        }

        $data['collate_data'] = $get_data;

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'collate';

        $this->load->view('template/template_cart', $data);
    }

}