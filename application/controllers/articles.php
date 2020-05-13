<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Articles extends CI_Controller {


    function index()
    {

        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();
        $data['articles'] = $this->client_shop_model->getArticles();

        $data['template_content'] = 'articles';

        $this->load->view('template/template_information', $data);

    }

    function article()
    {

        $url_segment = $this->uri->segment(2);
        $data['parent_category_list'] = $this->client_shop_model->getParentCategoryList();
        $data['sub_category_list'] = $this->client_shop_model->getSubCategoryList();

        $data['template_content'] = 'article_current';
        $article = $this->client_shop_model->getArticle($url_segment);
        if ($article==null)
        {
            redirect('page_not_found');
            return;
        }
        $data['article'] = $article;
        $data['seo_title'] = $article->head_title;
        $data['seo_desc'] = $article->seo_desc;
        $data['seo_tags'] = $article->seo_tags;


            $data['articles'] = $this->client_shop_model->getNextArticles($article->id, 3);
        $this->load->view('template/template_information', $data);

    }

}