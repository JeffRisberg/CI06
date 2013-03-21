<?php
/**
 * Adds layout support :: Similar to RoR <%= yield =>
 * '{yield}' will be replaced with all output generated by the controller/view.
 * 
 */
class Yield {
    function doYield() {        
        global $OUT;

        $CI =& get_instance();
        $view = $output = $CI->output->get_output();
        $default = APPPATH.'views/layouts/default.php';     
        $layout = (isset($CI->layout))?$CI->layout:'default';
        
        if ($layout !== false){
            $layout .= (!preg_match('/(.+).php$/', $layout))?'.php':'';
            $requested = APPPATH.'views/layouts/' . $layout;
            if (file_exists($requested)){
                $layout_output = $CI->load->file($requested, true);
                $view = str_replace("{yield}", $output, $layout_output);
            }
        }

        $OUT->_display($view);
    }
}

?>