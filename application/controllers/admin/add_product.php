<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Add_product extends CI_Controller {

    function Add_product()
    {
        parent::__construct();
    }

    function index()
    {

        if($this->session->userdata('logged_in') == TRUE)
        {
            $config_question = array(
                array(
                    'field'   => 'product_name',
                    'label'   => 'Наименование продукта',
                    'rules'   => 'required'
                ),
                array(
                    'field'   => 'description',
                    'label'   => 'Описание продукта',
                    'rules'   => 'required'
                ),
                array(
                    'field'   => 'search_tags',
                    'label'   => 'Тэги для поиска',
                    'rules'   => 'required'
                ),
                array(
                    'field'   => 'category',
                    'label'   => 'Выбираем категорию продукта',
                    'rules'   => 'required'
                )
            );

            $this->form_validation->set_rules($config_question);

            $this->form_validation->set_error_delimiters('<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">', '</div>');

            $product_colors = array();
            $color_list = $this->db_admin_model->getColorsList();

            foreach ($color_list as $color)
            {
                if (isset($_REQUEST['color'.$color->id]) && $_REQUEST['color'.$color->id]=='on')
                {
                    array_push($product_colors, $color->id);
                }
            }
            $color_array = implode(',',$product_colors);

            $product_name_specs = array();
            $product_specs = array();
            for ($i=0; $i < trim(xss_clean($this->input->post('maxSpecCnt'))); $i++){
                if (isset($_REQUEST['name_specs_'.$i]))
                {
                    array_push($product_name_specs, trim(xss_clean($this->input->post('name_specs_'.$i))));
                    array_push($product_specs, trim(xss_clean($this->input->post('specs_'.$i))));
                }
            }
            $name_specs_array = implode(',',$product_name_specs);
            $specs_array = implode(',',$product_specs);


            $shop_specs = array();
            for ($i=0; $i < trim(xss_clean($this->input->post('maxNomencCnt'))); $i++){
                if (isset($_REQUEST['nomenc_'.$i]))
                {
                    array_push($shop_specs, trim(xss_clean($this->input->post('nomenc_'.$i))));
                }
            }



            $custom_validation = TRUE;
            if (isset($_REQUEST['hidden_mark']))
            {
                $data['custom_error_list'] ="";
                if ($name_specs_array=="" )
                {
                    $custom_validation = FALSE;
                    $data['custom_error_list'] .= '<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">Надо добавить хотя бы одну спецификацию</div>';
                }
                if ($color_array=="")
                {
                    $custom_validation = FALSE;
                    $data['custom_error_list'] .= '<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">Надо выбрать хотя бы один цвет</div>';
                }
            }

            if(($this->form_validation->run() == FALSE) || ($custom_validation == FALSE))
            {

                $data['view'] = $this->db_admin_model->getCatalogCategoryName();
                $data['category'] = $this->db_admin_model->getCategoryData();
                $data['product_colors'] = $product_colors;
                $data['name_specs_list'] = $product_name_specs;
                $data['specs_list'] = $product_specs;
                $data['shop_specs_list'] = $shop_specs;

                $data['colors_list'] = $color_list;
                $data['category_id'] = trim(xss_clean($this->input->post('category')));
                $data['products'] = $this->db_admin_model->getLastProduct();
                $data['main_content'] = 'add_product';

                $this->load->view('admin/includes/admin_template', $data);

            }
            else
            {
                $cat_id = $this->input->post('category');

                $prod_path = $_SERVER['DOCUMENT_ROOT']."/public/img/catalog_imgs/pages_img/".$cat_id."/";

                $config['upload_path'] = $prod_path;
                $config['allowed_types'] = 'png';
                $config['remove_spaces'] = TRUE;
                $config['overwrite'] = TRUE;

                $prod_foto = "prod_foto";
                $big_prod_foto = "big_prod_foto";
                $box_prod_foto = "box_prod_foto";
                $scheme_prod_foto = "scheme_prod_foto";
                $komplekt_prod_foto = "komplekt_prod_foto";

                $last_products = $this->db_admin_model->getLastProduct();
                $new_prod_id = $last_products[0]->id+1;
                $_FILES[$prod_foto]['name']='img_id_'.$new_prod_id.'.png';
                $_FILES[$big_prod_foto]['name']='img_id_'.$new_prod_id.'_big.png';
                $_FILES[$box_prod_foto]['name']='img_id_'.$new_prod_id.'_box.png';
                $_FILES[$scheme_prod_foto]['name']='img_id_'.$new_prod_id.'_scheme.png';
                $_FILES[$komplekt_prod_foto]['name']='img_id_'.$new_prod_id.'_komplekt.png';


                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                $this->upload->do_upload($prod_foto);
                $this->upload->do_upload($big_prod_foto);
                $this->upload->do_upload($box_prod_foto);
                $this->upload->do_upload($scheme_prod_foto);
                $this->upload->do_upload($komplekt_prod_foto);

                chmod ($prod_path.$_FILES[$prod_foto]['name'], 0666);
                chmod ($prod_path.$_FILES[$big_prod_foto]['name'], 0666);
                chmod ($prod_path.$_FILES[$box_prod_foto]['name'], 0666);
                chmod ($prod_path.$_FILES[$scheme_prod_foto]['name'], 0666);
                chmod ($prod_path.$_FILES[$komplekt_prod_foto]['name'], 0666);

                $product_name = trim(xss_clean($this->input->post('product_name')));
                $description = trim(xss_clean($this->input->post('description')));
                $search_tags = trim(xss_clean($this->input->post('search_tags')));
                $category = $cat_id;


                $translit=$this->db_admin_model->translitIt($product_name);

                $prod_send_data = array(
                    'category_id' => $category,
                    'product_name' => $product_name,
                    'product_short_name' => $product_name,
                    'description' => $description,
                    'search_tags' => $search_tags,
                    'translit' => $translit,
                    'name_specs_array' => $name_specs_array,
                    'specs_array' => $specs_array,
                    'shop_specs' => $shop_specs,
                    'color_array' => $color_array
                );
                $this->add_new($prod_send_data);
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


    function  add_new($send_new)
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $this->db_admin_model->AddProduct($send_new);
            redirect($_SERVER['REQUEST_URI']);
        }
        else
        {
            $data['main_content'] = 'loginin';

            $this->load->view('admin/includes/admin_template', $data);
        }

    }


}


