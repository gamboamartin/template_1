<?php
namespace gamboamartin\template_1;
use config\generales;
use gamboamartin\errores\errores;

class html extends \gamboamartin\template\html {


    /**
     * Genera un boton basico con estilo boostrap
     * @param string $etiqueta Etiqueta del boton
     * @return string|array
     * @version 0.98.20
     */
    public function button(string $etiqueta): string|array
    {
        $etiqueta = trim($etiqueta);
        if($etiqueta === ''){
            return $this->error->error(mensaje: 'Error etiqueta esta vacia', data: $etiqueta);
        }
        return "<button type='button' class='btn btn-info col-sm-12'>$etiqueta</button>";
    }

    /**
     * Funcion que genera un boton de tipo link con href
     * @param string $accion Accion a ejecutar
     * @param string $etiqueta Etiqueta de boton
     * @param int $registro_id Registro a mandar transaccion
     * @param string $seccion Seccion a ejecutar
     * @param string $style Estilo del boton info,danger,warning etc
     * @param array $params Parametros extra para incrustar por get
     * @return string|array
     * @version 0.32.3
     */
    public function button_href(string $accion, string $etiqueta, int $registro_id, string $seccion,
                                string $style, array $params = array()): string|array
    {

        $session_id = (new generales())->session_id;

        if($session_id === ''){
            return $this->error->error(mensaje: 'Error la $session_id esta vacia', data: $session_id);
        }
        $html = parent::button_href(accion: $accion,etiqueta:  $etiqueta,registro_id:  $registro_id,
            seccion:  $seccion, style: $style, params: $params);
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

    /** Genera un input de tipo email

     * @param bool $disabled Si disabled retorna text disabled
     * @param string $id_css Identificador de tipo css
     * @param string $name Nombre del input
     * @param string $place_holder Contenido a mostrar previo a la captura del input
     * @param bool $required Si required aplica required en html
     * @param mixed $value Valor de input
     * @return array|string
     */
    public function email(bool $disabled, string $id_css, string $name, string $place_holder,
                          bool $required, mixed $value): array|string
    {
        $email = parent::email(disabled: $disabled,id_css:  $id_css,name:  $name,
            place_holder: $place_holder,required:  $required,value:  $value); // TODO: Change the autogenerated stub
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar html', data: $email);
        }
        return str_replace('|class|', "class='form-control'", $email);
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

    public function monto(bool $disabled, string $id_css, string $name, string $place_holder, bool $required,
                          mixed $value): string|array
    {

        $html = parent::monto(disabled:$disabled,id_css:  $id_css,name:  $name,place_holder:  $place_holder,
            required:  $required,value:  $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar html', data: $html);
        }

        return str_replace('|class|', "class='form-control'", $html);
    }


    /**
     * Genera um input text basado en los parametros enviados
     * @param bool $disabled Si disabled retorna text disabled
     * @param string $id_css Identificador css
     * @param string $name Name input html
     * @param string $place_holder Muestra elemento en input
     * @param bool $required indica si es requerido o no
     * @param mixed $value Valor en caso de que exista
     * @param string $regex Integra un  regex a pattern
     * @param string $title Integra un  title
     * @return string|array Html en forma de input text
     * @version 0.15.1
     */
    public function text(bool $disabled, string $id_css, string $name, string $place_holder, bool $required,
                         mixed $value, string $regex = '', string $title = ''): string|array
    {

        $html = parent::text(disabled:$disabled,id_css:  $id_css,name:  $name,place_holder:  $place_holder,
            required:  $required,value:  $value, regex: $regex, title: $title);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar html', data: $html);
        }

        return str_replace('|class|', "class='form-control'", $html);
    }

}
