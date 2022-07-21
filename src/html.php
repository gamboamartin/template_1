<?php
namespace gamboamartin\template_1;
use gamboamartin\errores\errores;

class html extends \gamboamartin\template\html {


    /**
     * Genera un alert de tipo warning
     * @version 1.17.1
     * @param string $mensaje Mensaje a mostrar en el warning
     * @return string|array
     */
    public function alert_warning(string $mensaje): string|array
    {
        $mensaje = trim($mensaje);
        if($mensaje === ''){
            return $this->error->error(mensaje: 'Error mensaje esta vacio', data: $mensaje);
        }
        return "<div class='alert alert-warning' role='alert' ><strong>Advertencia!</strong> $mensaje.</div>";
    }

    public function button(string $etiqueta): string
    {
        return "<button type='button' class='btn btn-info col-sm-12'>$etiqueta</button>";
    }

    /**
     * Funcion que genera un boton de tipo link con href
     * @version 0.32.3
     * @param string $accion Accion a ejecutar
     * @param string $etiqueta Etiqueta de boton
     * @param int $registro_id Registro a mandar transaccion
     * @param string $seccion Seccion a ejecutar
     * @param string $style Estilo del boton info,danger,warning etc
     * @return string|array
     */
    public function button_href(string $accion, string $etiqueta, int $registro_id, string $seccion,
                                string $style): string|array
    {

        $html = parent::button_href(accion: $accion,etiqueta:  $etiqueta,registro_id:  $registro_id,
            seccion:  $seccion, style: $style);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar boton', data: $html);
        }

        return str_replace(array('|role|', '|class|'), array("role='button'", "class='btn btn-$style col-sm-12'"), $html);
    }



    public function div_group(int $cols, string $html): string|array
    {
        $html_r = parent::div_group(cols: $cols,html:  $html);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar div', data: $html_r);
        }

        return str_replace(array('|class|'), array("class='control-group col-sm-$cols'"), $html_r);
    }

    public function div_label(string $html, string $label): string
    {
        $html = parent::div_label(html: $html,label:  $label);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar div', data: $html);
        }
        
        return str_replace('|class|', "class='controls'", $html);

    }



    public function fecha(bool $disabled, string $id_css, string $name, string $place_holder, bool $required,
                         mixed $value): string|array
    {

        $html = parent::fecha(disabled:$disabled,id_css:  $id_css,name:  $name,place_holder:  $place_holder,
            required:  $required,value:  $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar html', data: $html);
        }

        return str_replace('|class|', "class='form-control'", $html);
    }







    /**
     * Genera un label html
     * @version 0.10.0
     * @param string $id_css id de css
     * @param string $place_holder Etiqueta a mostrar
     * @return string|array string Salida html de label
     */
    public function label(string $id_css, string $place_holder): string|array
    {
        $r_label = parent::label(id_css:$id_css,place_holder:  $place_holder);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar label', data: $r_label);
        }

        return "<label class='control-label' for='$id_css'>$place_holder</label>";
    }


    /**
     * Genera um input text basado en los parametros enviados
     * @param bool $disabled Si disabled retorna text disabled
     * @param string $id_css Identificador css
     * @param string $name Name input html
     * @param string $place_holder Muestra elemento en input
     * @param bool $required indica si es requerido o no
     * @param mixed $value Valor en caso de que exista
     * @return string|array Html en forma de input text
     * @version 0.15.1
     */
    public function text(bool $disabled, string $id_css, string $name, string $place_holder, bool $required,
                         mixed $value): string|array
    {

        $html = parent::text(disabled:$disabled,id_css:  $id_css,name:  $name,place_holder:  $place_holder,
            required:  $required,value:  $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar html', data: $html);
        }

        return str_replace('|class|', "class='form-control'", $html);
    }

}
