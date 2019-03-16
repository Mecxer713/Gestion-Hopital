<?php
/**
 * Created by PhpStorm.
 * User: mecxer
 * Date: 2/11/18
 * Time: 1:48 PM
 */

if(!function_exists('e'))
{
    function e($string)
    {
        if($string)
            return htmlspecialchars($string);
    }
}

if(!function_exists('not_empty'))
{
    function not_empty($fields =[])
    {
        if(count($fields)!=0)
        {
            foreach ($fields as $field)
            {
                if(empty($_POST[$field]) || trim($_POST[$field])==false)
                {
                    return false;
                }
            }
            return true;
        }
    }
}

if(!function_exists('save_input_data'))
{
    function save_input_data()
    {
        foreach ($_POST as $key => $value)
        {
            if(strpos($key,'pwd')===false)
            {
                $_SESSION['input'][$key]=$value;
            }

        }
    }

}

if (!function_exists('get_input'))
{
    function get_input($key)
    {
        return !empty($_SESSION['input'][$key])
            ?e($_SESSION['input'][$key]):null;
    }
}
if (!function_exists('redirect'))
{
    function redirect($page)
    {
        header('Location'. $page);
        exit();
    }
}

if (!function_exists('clear_input_data'))
{
    function clear_input_data()
    {
        if (isset($_SESSION['input']))
                $_SESSION['input']=[];
    }
}



if(!function_exists('set_active'))
{
    function set_active($path)
    {
        $temp=explode('=',$_SERVER['QUERY_STRING'],2);
        $temp1=explode('&',array_pop($temp));
        $p= array_shift($temp1);
        if($p==$path)
        {
            return "active";
        }

    }
}

if(!function_exists('verifyPhone'))
{
   function verifyPhone($telephone){
    $error=false;
    $validity=preg_match('#(0)(81|82|84|85|89|97|99|90)([0-9]{7})$#',$telephone);
    if($validity>0){
        $error=true;
    }
    return $error;
   }


}

