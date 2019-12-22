<?php
/**
 * Created by PhpStorm.
 * User: Jesus Enmanuel
 * Date: 26/08/2018
 * Time: 11:17
 */

if( ! function_exists('display_error')){
	function display_error($errors)
	{
		return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="opacity-message">Errores de Validación</h4>
                    <ol>'.$errors.'</ol>
                </div>';
	}
}

if( ! function_exists('display_import')){
    function display_import($response)
    {
        return '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading"><i class="fa fa-cloud-upload"></i> Importación de Clientes!!</h4>
                    <p class="mb-0">Importados : <strong>'.$response["success"].'</strong></p>
                    <p class="mb-0">No Importados : <strong>'.$response["warinng"].'</strong> (ya estan registrados en el sistema).</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
}

if( ! function_exists('generate_code')){
    function generate_code($long) {
        $key = '';
        $pattern = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($pattern)-1;
        for($i=0;$i < $long;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
    }
}
