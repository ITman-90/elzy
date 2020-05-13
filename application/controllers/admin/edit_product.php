<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Edit_product extends CI_Controller {



    function Edit_product()
    {
        parent::__construct();
    }

    function index()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $id = $this->input->post('id');
            $data = $this->construct_editor_data($id);
            $data['main_content'] = 'edit_product';
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







            $id = trim(xss_clean($this->input->post('id')));
            $cat_id = $this->input->post('category');
            $product_name = trim(xss_clean($this->input->post('product_name')));
            $description = trim(xss_clean($this->input->post('description')));
            $search_tags = trim(xss_clean($this->input->post('search_tags')));
            $sort_id = trim(xss_clean($this->input->post('sort_id')));
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

            $shopId_specs = array();
            $shop_specs = array();
            for ($i=0; $i < trim(xss_clean($this->input->post('maxNomencCnt'))); $i++){
                if (isset($_REQUEST['nomenc_'.$i]))
                {
                    array_push($shopId_specs, trim(xss_clean($this->input->post('nomencId_'.$i))));
                    array_push($shop_specs, trim(xss_clean($this->input->post('nomenc_'.$i))));
                }
            }



            $category = trim(xss_clean($cat_id));

            $custom_validation = TRUE;
            $data['custom_error_list'] ="";
            if ($name_specs_array=="")
            {
                $custom_validation = FALSE;
                $data['custom_error_list'] .= '<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">Надо добавить хотя бы одну спецификацию</div>';
            }
            if ($color_array=="")
            {
                $custom_validation = FALSE;
                $data['custom_error_list'] .= '<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">Надо выбрать хотя бы один цвет</div>';
            }


            $this->form_validation->set_rules($config_question);

            $this->form_validation->set_error_delimiters('<div style="margin: 0; padding: 0; color: red; font-size: 8pt;">', '</div>');


            if(($this->form_validation->run() == FALSE) || ($custom_validation == FALSE))
            {
                $data['id'] = $id;
                $data['view'] = $this->db_admin_model->getCatalogCategoryName();
                $data['category'] = $this->db_admin_model->getCategoryData();
                $data['product_colors'] = $product_colors;
                $data['name_specs_list'] =$product_name_specs;
                $data['specs_list'] = $product_specs;
                $data['shopId_specs_list'] = $shopId_specs;
                $data['shop_specs_list'] = $shop_specs;
                $data['colors_list'] = $color_list;
                $data['category_id'] = $category;
                $data['product_name'] = $product_name;
                $data['sort_id'] = $sort_id;
                $data['description'] = $description;
                $data['search_tags'] = $search_tags;


                $data['main_content'] = 'edit_product';
                $this->load->view('admin/includes/admin_template', $data);



            }
            else
            {

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

                $_FILES[$prod_foto]['name']='img_id_'.$id.'.png';
                $_FILES[$big_prod_foto]['name']='img_id_'.$id.'_big.png';
                $_FILES[$box_prod_foto]['name']='img_id_'.$id.'_box.png';
                $_FILES[$scheme_prod_foto]['name']='img_id_'.$id.'_scheme.png';
                $_FILES[$komplekt_prod_foto]['name']='img_id_'.$id.'_komplekt.png';


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


                $translit=$this->db_admin_model->translitIt($product_name);

                $product_data = array(
                    'id' => $id,
                    'product_name' => $product_name,
                    'product_short_name' => $product_name,
                    'sort_id' => $sort_id,
                    'description' => $description,
                    'search_tags' =>  $search_tags,
                    'translit' =>  $translit,
                    'category' => $category,
                    'name_specs_array' => $name_specs_array,
                    'specs_array' => $specs_array,
                    'shop_specs' => $shop_specs,
                    'shopId_specs' => $shopId_specs,
                    'color_array' => $color_array
                );
                $this->db_admin_model->updateProductById($product_data, $id);

                $data = $this->construct_editor_data($id);
                $data['main_content'] = 'edit_product';
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
    public function construct_editor_data($id)
    {
        $edit_list = $this->db_admin_model->getProductbyId($id);
        $cat_id = $edit_list[0]->category_id;
        $linksColorsId = $this->db_admin_model->getLinksColorsIdByProdId($id);
        $colorsArray = $this->db_admin_model->getColorsArrayIdByLinkId($linksColorsId);
        if (count($colorsArray)==0)
        {
            $colorsArray = $this->db_admin_model->getColorsArrayIdByProdId($id);
        }
        $linksSpecsId = $this->db_admin_model->getLinksSpecsIdByProdId($id);
        $specsArray = $this->db_admin_model->getSpecsArrayIdByLinkId($linksSpecsId);
        if  (count($specsArray)==0)
        {
            $specsArray = $this->db_admin_model->getSpecsArrayIdByProdId($id);
        }
        $shop_specs_pair_list = $this->db_admin_model->getNomencListByArray( explode(",", $specsArray[0]->shop_specs_array));
        $shop_specs_list = array();
        $shopId_specs_list = array();
        foreach ($shop_specs_pair_list as $row)
        {
            array_push($shop_specs_list, $row->spec_name);
            array_push($shopId_specs_list, $row->id);
        }

        $productHref = $this->getProductRoutes($edit_list[0]->product_name, $cat_id);

        $data['id'] = $id;
        $data['view'] = $this->db_admin_model->getCatalogCategoryName();
        $data['category'] = $this->db_admin_model->getCategoryData();
        $data['colors_list'] = $this->db_admin_model->getColorsList();
        $data['product_colors'] = explode(",", $colorsArray[0]->color_array);
        $data['name_specs_list'] =explode(",",  $specsArray[0]->name_specs_array);
        $data['specs_list'] = explode(",", $specsArray[0]->specs_array);

        $data['shopId_specs_list'] = $shopId_specs_list;
        $data['shop_specs_list'] = $shop_specs_list;


        $data['category_id'] = $cat_id;
        $data['product_name'] = htmlspecialchars($edit_list[0]->product_name);
        $data['description'] = $edit_list[0]->description;
        $data['search_tags'] = $edit_list[0]->search_tags;
        $data['sort_id'] = $edit_list[0]->sort_id;
        $data['product_href'] = $productHref;
        return $data;
    }


}


