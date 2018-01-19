<?php
class Principal {

    public function Conectar() {
        $servidor = "localhost";
        $user = "root";
        $password = "";

        $link = mysql_connect($servidor, $user, $password);

        if (!$link)
            die("Tenemos problemas, regrese en unos minutos: " . mysql_error());

        mysql_query("SET NAMES 'utf8'");

        $bd = "minigaleria";

        if (!mysql_select_db($bd))
            die("Tenemos problemas, regrese en unos minutos: " . mysql_error());

        return $link;
    }

    //*****************************************************************************
    public function comillas_inteligentes($valor) {
        // Retirar las barras
        if (get_magic_quotes_gpc()) {
            $valor = stripslashes($valor);
        }

        // Colocar comillas si no es entero
        if (!is_numeric($valor)) {
            $valor = "'" . mysql_real_escape_string($valor) . "'";
        }
        return $valor;
    }

    //*****************************************************************************
    // Obtengo los textos limpios para usarlos como url
    public static function limpiaUrl($entra) {
        $traduce = array('á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u', 'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U',
            'ñ' => 'n', 'Ñ' => 'N',
            'ä' => 'a', 'ë' => 'e', 'ï' => 'i', 'ö' => 'o', 'ü' => 'u', 'Ä' => 'A', 'Ë' => 'E', 'Ï' => 'I', 'Ö' => 'O', 'Ü' => 'U');
        $sale = strtr($entra, $traduce);

        $texto = str_replace(" ", "-", $sale);

        return $texto;
    }

}

?>
