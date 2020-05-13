<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter HooksKit from Aksenov A.K.
 *
 * This class contains methods for my projects
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Methods kit
 * @author		Aksenov Anton [maximum_satan]
 * @link		http://ru.linkedin.com/pub/anton-aksenov/63/703/267
 */
class HooksKit {
    /**
     * Constructor
     *
     * Get instance for Database Lib
     *
     * @access	public
     */

    function HooksKit()
    {
        $this->CI =& get_instance();
    }

    /**
     * English2Russian transliteration string
     *
     * @access	public
     * @param	string
     * @return	string	transliteration string
     */
    function translitRu($str)
    {
        $tr = array(
            "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
            "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
            "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
            "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
            "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
            "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
            "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
            "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
            " "=>"_",","=>"","/"=>"_","№"=>"n","."=>"","-"=>"_",
            "("=>"",")"=>"","'"=>"","\"" =>"","="=>"","»"=>"","«"=>""
        );

        return strtr($str,$tr);
    }

}

// END User Class
