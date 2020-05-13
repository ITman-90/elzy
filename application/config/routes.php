<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'def_index';
$route['404_override'] = 'def_index/page_not_found';

$route['unsert_col'] = 'def_index/unsert_col';

$route['market.xml'] = "market";

$route['admin'] = 'admin/admin_main';

$route['catalog'] = 'def_index';

$route['search'] = 'cart/test_sphinx';

$route['catalog/(:any)/(:any)/(:any)'] = 'catalog/product_layout';
$route['catalog/(:any)/(:any)'] = 'catalog/sub_category';
$route['catalog/(:any)'] = 'catalog/parent_category';

$route['catalog/captcha_update'] = 'catalog/captcha_update';
$route['catalog/get_related_products'] = 'catalog/get_related_products';
$route['catalog/send_review'] = 'catalog/send_review';


$route['delivery'] = 'def_index/delivery';
/*$route['contacts'] = 'def_index/contacts';*/
$route['company'] = 'def_index/company';
$route['oplata'] = 'def_index/oplata';
/*$route['callback'] = 'def_index/callback';*/
/*$route['send_ask'] = 'def_index/send_ask';*/

$route['news/(:any)'] = 'news/news_page';
/*$route['articles/(:any)'] = 'articles/article';*/

$route['collate'] = 'cart/collate_view';

//$route['ajax_get_subcategory'] = 'def_index/ajax_get_subcategory';
/* End of file routes.php */
/* Location: ./application/config/routes.php */