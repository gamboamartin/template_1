<?php
namespace gamboamartin\template_1;
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
     * @param stdClass $links Objeto con link para frontend
     * @param string $seccion Seccion en ejecucion
     * @param string $title_seccion
     * @return array|string
     * @version 0.11.0
     */
    private function li_menu_principal_lista(stdClass $links, string $seccion, string $title_seccion): array|string
    {
        $valida = $this->valida_links(links: $links,seccion: $seccion);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar datos', data: $valida);
        }
        $title_seccion = trim($title_seccion);
        if($title_seccion === ''){
            return $this->error->error(mensaje: 'Error title_seccion esta vacio', data: $title_seccion);
        }

        $a = $this->link_menu_principal_lista(links:$links, seccion: $seccion, title_seccion: $title_seccion);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar liga', data: $a);
        }

        return "<li class='nav-item'>$a</li>";
    }

    /**
     * Genera un link tipo a para menu
     * @param stdClass $links Objeto con link para frontend
     * @param string $seccion Seccion en ejecucion
     * @param string $title_seccion
     * @return string|array
     * @version v0.11.0
     */
    private function link_menu_principal_lista(stdClass $links, string $seccion, string $title_seccion): string|array
    {

        $valida = $this->valida_links(links: $links,seccion: $seccion);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar datos', data: $valida);
        }
        $title_seccion = trim($title_seccion);
        if($title_seccion === ''){
            return $this->error->error(mensaje: 'Error title_seccion esta vacio', data: $title_seccion);
        }

        $liga = $links->$seccion->lista;
        $title_seccion = str_replace('_', ' ', $title_seccion);
        $title_seccion = ucwords($title_seccion);
        return "<a class='nav-link' href='$liga' role='button'>$title_seccion</a>";
    }

    /**
     * Genera las lista de menu principal
     * @param stdClass $links Objeto con link para frontend
     * @param array $secciones
     * @return array|string
     * @version 0.11.0
     */
    public function lis_menu_principal(stdClass $links, array $secciones): array|string
    {

        $lis = '';
        foreach($secciones as $seccion){

            if(!is_array($seccion)){
                return $this->error->error(mensaje: 'Error seccion debe ser un array', data: $seccion);
            }

            $valida = $this->valida_links(links: $links,seccion: $seccion['adm_seccion_descripcion']);
            if(errores::$error){
                return $this->error->error(mensaje: 'Error al validar datos', data: $valida);
            }

            $etiqueta_menu = $seccion['adm_seccion_descripcion'];
            if(isset($seccion['adm_seccion_etiqueta_label'])){
                if(trim($seccion['adm_seccion_etiqueta_label']) !==''){
                    $etiqueta_menu = $seccion['adm_seccion_etiqueta_label'];
                }
            }

            $li = $this->li_menu_principal_lista(links: $links,seccion: $seccion['adm_seccion_descripcion'],
                title_seccion: $etiqueta_menu);
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

        if(!isset($links->$seccion)) {
            $links->$seccion = new stdClass();
        }
        if(!isset($links->$seccion->lista)) {
            $links->$seccion->lista = '';
        }

        return true;
    }

}
