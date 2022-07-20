<?php
namespace html;
use config\generales;
use gamboamartin\errores\errores;
use gamboamartin\validacion\validacion;
use stdClass;

class nav{
    private errores $error;
    public function __construct(){
        $this->error = new errores();
    }

    /**
     * Genera un li para menu principal
     * @version 0.11.0
     * @param stdClass $links Objeto con link para frontend
     * @param string $seccion Seccion en ejecucion
     * @return array|string
     */
    private function li_menu_principal_lista(stdClass $links, string $seccion): array|string
    {
        $valida = $this->valida_links(links: $links,seccion: $seccion);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar datos', data: $valida);
        }

        $a = $this->link_menu_principal_lista(links:$links, seccion: $seccion);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar liga', data: $a);
        }

        return "<li class='nav-item'>$a</li>";
    }

    /**
     * Genera un link tipo a para menu
     * @version v0.11.0
     * @param stdClass $links Objeto con link para frontend
     * @param string $seccion Seccion en ejecucion
     * @return string|array
     */
    private function link_menu_principal_lista(stdClass $links, string $seccion): string|array
    {

        $valida = $this->valida_links(links: $links,seccion: $seccion);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar datos', data: $valida);
        }

        $liga = $links->$seccion->lista;
        $title_seccion = str_replace('_', ' ', $seccion);
        $title_seccion = ucwords($title_seccion);
        return "<a class='nav-link' href='$liga' role='button'>$title_seccion</a>";
    }

    /**
     * Genera las lista de menu principal
     * @version 0.11.0
     * @param stdClass $links Objeto con link para frontend
     * @return array|string
     */
    public function lis_menu_principal(stdClass $links): array|string
    {
        $secciones = (new generales())->secciones;
        $lis = '';
        foreach($secciones as $seccion){

            $valida = $this->valida_links(links: $links,seccion: $seccion);
            if(errores::$error){
                return $this->error->error(mensaje: 'Error al validar datos', data: $valida);
            }

            $li = $this->li_menu_principal_lista(links: $links,seccion: $seccion);
            if(errores::$error){
                return $this->error->error(mensaje: 'Error al generar li', data: $li);
            }
            $lis.=$li;
        }
        return $lis;

    }

    /**
     * Valida la entrada de links para la salida de un menu
     * @version 0.11.0
     * @param stdClass $links Objeto con link para frontend
     * @param string $seccion Seccion en ejecucion
     * @return bool|array
     */
    private function valida_links(stdClass $links, string $seccion): bool|array
    {
        $seccion = trim($seccion);
        if($seccion === ''){
            return $this->error->error(mensaje: 'Error la seccion esta vacia', data: $seccion);
        }

        $keys = array($seccion);
        $valida = (new validacion())->valida_existencia_keys(keys: $keys,registro:  $links);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar links', data: $valida);
        }

        $keys = array('lista');
        $valida = (new validacion())->valida_existencia_keys(keys: $keys,registro:  $links->$seccion);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar links->'.$seccion, data: $valida);
        }

        return true;
    }

}
