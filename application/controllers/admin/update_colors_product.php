<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Update_colors_product extends CI_Controller {



    function Update_colors_product()
    {
        parent::__construct();
    }

    function index()
    {
        if($this->session->userdata('logged_in') == TRUE)
        {
            $id = trim(xss_clean($this->input->post('id')));
            $data = $this->construct_editor_data($id);
            $data['main_content'] = 'update_colors_product';
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
            $data = $this->construct_editor_data($id);
            $prod_path = $_SERVER['DOCUMENT_ROOT']."/public/img/catalog_imgs/pages_img/".$data['category_id']."/colors/";
            foreach ( $data['product_colors']  as $color)
            {

                if (isset($_FILES['prod_color'.$color->id]) && $_FILES['prod_color'.$color->id]['error']==0)
                {
                    $_FILES['prod_color'.$color->id]['name']='img_id_'.$id.'_'.$color->id.'_big.png';
                }
            }
            if (!is_dir($prod_path))
            {
                 mkdir($prod_path, 0775);
            }

            $config['upload_path'] = $prod_path;
            $config['allowed_types'] = 'png';
            $config['remove_spaces'] = TRUE;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            foreach ( $data['product_colors']  as $color)
            {
                if (isset($_FILES['prod_color'.$color->id]) && $_FILES['prod_color'.$color->id]['error']==0)
                {
                    $this->upload->do_upload('prod_color'.$color->id);
                    chmod ($prod_path.$_FILES['prod_color'.$color->id]['name'], 0666);
                }
            }

            $data['main_content'] = 'update_colors_product';
            $this->load->view('admin/includes/admin_template', $data);


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


        $productHref = $this->getProductRoutes($edit_list[0]->product_name, $cat_id);

        $data['id'] = $id;
        $data['product_colors'] = $this->db_admin_model->getColorsListByArray(explode(",", $colorsArray[0]->color_array));
        $data['category_id'] = $cat_id;
        $data['product_name'] = $edit_list[0]->product_name;
        $data['product_href'] = $productHref;
        return $data;
    }


}


