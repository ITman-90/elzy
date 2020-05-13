<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Edit_price_product extends CI_Controller {



    function Edit_price_product()
    {
        parent::__construct();
    }

    function index()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $id = $this->input->post('id');
            $data = $this->construct_editor_data($id);
            $data['main_content'] = 'edit_price_product';
            $this->load->view('admin/includes/admin_template', $data);
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }
    }
    function getProductRoutes($product_name, $cat_id)
    {
        $tr_product_name =  $this->db_admin_model->translitIt($product_name);
        $categoryData = $this->db_admin_model->getCategoryById($cat_id);
        $tr_category_name =  $categoryData[0]->catalog_category_url_name;
        $tr_catalog_name =  $categoryData[0]->category_url_name;

        return base_url().'catalog/'.$tr_category_name.'/'.$tr_catalog_name.'/'.$tr_product_name;
    }

    function update()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {

            $id = trim(xss_clean($this->input->post('id')));
            $id_double = trim(xss_clean($this->input->post('id_double')));

            $custom_validation = TRUE;
            $custom_value_validation = TRUE;
            $custom_article_validation = TRUE;
            $custom_price_validation = TRUE;
            $custom_price_value_validation = TRUE;
            $data['custom_error_list'] ="";


            $price_item = array();
            $price_data = array();

            $custom_error_lines= array();
            for ($i=0; $i < trim(xss_clean($this->input->post('count'))); $i++)
            {
                if (isset($_REQUEST['id_'.$i]))
                {
                    array_push($product_name_specs, trim(xss_clean($this->input->post('name_specs_'.$i))));
                    array_push($product_specs, trim(xss_clean($this->input->post('specs_'.$i))));

                    unset($price_item);
                    $price_item["id"] = trim(xss_clean($this->input->post('id_'.$i)));
                    $price_item["color_name"] = trim(xss_clean($this->input->post('color_'.$i)));
                    $price_item["spec_name"] = trim(xss_clean($this->input->post('spec_'.$i)));
                    $price_item["color_id"] = trim(xss_clean($this->input->post('color_id_'.$i)));
                    $price_item["spec_id"] = trim(xss_clean($this->input->post('spec_id_'.$i)));
                    $price_item["value"] = trim(xss_clean($this->input->post('value_'.$i)));
                    $price_item["article"] = trim(xss_clean($this->input->post('article_'.$i)));
                    $price_item["price"] = trim(xss_clean($this->input->post('price_'.$i)));
                    if ($price_item["value"]=="")
                    {
                        $custom_value_validation=FALSE;
                        array_push($custom_error_lines, $i);
                    }
                    preg_match('/^([0-9]+)$/i', $price_item["article"],$matches);
                    if (count($matches)<=1)
                    {
                        $custom_article_validation=FALSE;
                        array_push($custom_error_lines, $i);
                    }
                    if ($price_item["price"]=="")
                    {
                        $custom_price_validation=FALSE;
                        array_push($custom_error_lines, $i);
                    }
                    else
                    {
                        preg_match('/^([0-9]+)(.[0-9]{1,2})?$/i', $price_item["price"],$matches);
                        if (count($matches)<=1)
                        {
                            $custom_price_value_validation=FALSE;
                            array_push($custom_error_lines, $i);
                        }
                        else if ($price_item["price"]<=0)
                        {
                            $custom_price_value_validation=FALSE;
                            array_push($custom_error_lines, $i);
                        }
                    }
                    array_push($price_data, $price_item);
                }
            }


            if ($custom_value_validation==FALSE)
            {
                $custom_validation = FALSE;
                $data['custom_error_list'] .= '<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">Все поля "Наименование" обязательны для заполнения!</div>';
            }

            if ($custom_article_validation==FALSE)
            {
                $custom_validation = FALSE;
                $data['custom_error_list'] .= '<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">Поле "Артикул" должно содержать положительное числовое значение!</div>';
            }

            if ($custom_price_validation==FALSE)
            {
                $custom_validation = FALSE;
                $data['custom_error_list'] .= '<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">Все поля "Цена" обязательны для заполнения!</div>';
            }
            if ($custom_price_value_validation==FALSE)
            {
                $custom_validation = FALSE;
                $data['custom_error_list'] .= '<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">Поле "Цена" должно содержать положительное числовое значение, дробная часть - до 2-х знаков, отделяется точкой ".", например "57.85".</div>';
            }

            if($custom_validation == FALSE)
            {

                $edit_list = $this->db_admin_model->getProductbyId($id);
                $cat_id = $edit_list[0]->category_id;
                $product_name = $edit_list[0]->product_name;
                $productHref = $this->getProductRoutes($product_name, $cat_id);


                $data['id'] = $id;
                $data['id_double'] = $id_double;
                $data['price_data'] = $price_data;
                $data['product_name'] = $product_name;
                $data['product_href'] = $productHref;
                $data['custom_error_lines'] = $custom_error_lines;


                $data['main_content'] = 'edit_price_product';
                $this->load->view('admin/includes/admin_template', $data);



            }
            else
            {

                $this->db_admin_model->updatePriceProduct($price_data, $id_double);
                $data = $this->construct_editor_data($id);
                $data['main_content'] = 'edit_price_product';
                $this->load->view('admin/includes/admin_template', $data);
            }
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }
    }

    function add_info($prod_send_data)
    {
        if($this->session->userdata('logged_in') == TRUE)
        {

            echo "<pre>";
            print_r($prod_send_data);
            echo "</pre>";


        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    private function construct_editor_data($id)
    {
        $id_double = $id;


        $edit_list = $this->db_admin_model->getProductbyId($id);
        $cat_id = $edit_list[0]->category_id;
        $product_name = $edit_list[0]->product_name;
        $productHref = $this->getProductRoutes($product_name, $cat_id);

        $linksSpecsId = $this->db_admin_model->getLinksSpecsIdByProdId($id);
        $specsArray = $this->db_admin_model->getSpecsArrayIdByLinkId($linksSpecsId);
        if  (count($specsArray)==0)
        {
            $specsArray = $this->db_admin_model->getSpecsArrayIdByProdId($id);
        }

        if (isset($specsArray[0]->double_prod_id))
        {
            $id_double = $specsArray[0]->double_prod_id;
            $linksSpecsId = $this->db_admin_model->getLinksSpecsIdByProdId($id_double);
            $specsArray = $this->db_admin_model->getSpecsArrayIdByLinkId($linksSpecsId);
            if  (count($specsArray)==0)
            {
                $specsArray = $this->db_admin_model->getSpecsArrayIdByProdId($id_double);
            }
        }

        $linksColorsId = $this->db_admin_model->getLinksColorsIdByProdId($id_double);
        $colorsArray = $this->db_admin_model->getColorsArrayIdByLinkId($linksColorsId);
        if (count($colorsArray)==0)
        {
            $colorsArray = $this->db_admin_model->getColorsArrayIdByProdId($id_double);
        }


        $shop_specs_pair_list = $this->db_admin_model->getNomencListByArray(explode(",", $specsArray[0]->shop_specs_array));
        $shop_specs_list = array();
        $shopId_specs_list = array();


        if (count($shop_specs_pair_list)>0)
        {
            foreach ($shop_specs_pair_list as $row)
            {
                array_push($shop_specs_list, $row->spec_name);
                array_push($shopId_specs_list, $row->id);
            }
        }
        else
        {
            array_push($shop_specs_list, "[Базовая]");
            array_push($shopId_specs_list, "0");
        }
        $shop_specs =  $this->db_admin_model->getShopSpecsByColorAndSpecsArray($id_double,explode(",", $colorsArray[0]->color_array),$shopId_specs_list);

        $shopId_list = array();
        foreach ($shop_specs as $shop_spec)
        {
            array_push($shopId_list, $shop_spec->id);
        }

        if (count($shopId_list)>0)
        {
        $shop = $this->db_admin_model->getShopListByArray($shopId_list);
        }


        $colors_list = $this->db_admin_model->getColorsDict();

        $product_colors = explode(",", $colorsArray[0]->color_array);


       $price_data =  $this->construct_price_data($product_colors, $shopId_specs_list, $shop_specs, $shop, $product_name, $colors_list, $shop_specs_list);



        $data['id'] = $id;
        $data['id_double'] = $id_double;
        $data['price_data'] = $price_data;
        $data['product_name'] = $product_name;
        $data['product_href'] = $productHref;
        return $data;
    }

    /**
     * @param $product_colors
     * @param $shopId_specs_list
     * @param $shop_specs
     * @param $shop
     * @param $product_name
     * @param $colors_list
     * @param $shop_specs_list
     * @return mixed
     */
    private function construct_price_data($product_colors, $shopId_specs_list, $shop_specs, $shop, $product_name, $colors_list, $shop_specs_list)
    {
        $price_item = array();
        $price_data = array();

        foreach ($product_colors as $color) {
            $cnt = 0;
            foreach ($shopId_specs_list as $shopId_specs) {
                $found = FALSE;
                foreach ($shop_specs as $shop_spec) {
                    if (($shop_spec->color == $color) && ($shop_spec->spec == $shopId_specs)) {
                        $row_id = $shop_spec->id;
                        $found = TRUE;
                        break;
                    }
                }

                if ($found) {
                    foreach ($shop as $item) {
                        if (($item->id == $row_id)) {
                            $price = $item->price;
                            $value = $item->value;
                            $article = $item->shop_id;
                            break;
                        }
                    }
                } else {
                    $row_id = "#";
                    $price = "0.00";
                    $article = "";
                    $value = $shopId_specs == 0 ? $product_name . ' (' . $colors_list[$color] . ')' : $product_name . ' (' . $colors_list[$color] . ') (' . $shop_specs_list[$cnt] . ')';
                }
                $color_name = $colors_list[$color].' ('.$color.')';
                unset($price_item);
                $price_item["id"] = $row_id;
                $price_item["color_name"] = $color_name;
                $price_item["color_id"] = $color;
                $price_item["spec_name"] = $shop_specs_list[$cnt];
                $price_item["spec_id"] = $shopId_specs;
                $price_item["value"] = htmlspecialchars($value);
                $price_item["article"] = $article;
                $price_item["price"] = $price;

                array_push($price_data, $price_item);


                $cnt++;
            }
        }
        return $price_data;
    }


}


