<?php
namespace html;
use base\frontend\params_inputs;
use config\generales;
use gamboamartin\errores\errores;

class html{
    private errores $error;
    public function __construct(){
        $this->error = new errores();
    }

    /**
     * Genera un alert html boostrap con un mensaje incluido
     * @version 0.11.0
     * @param string $mensaje Mensaje a mostrar
     * @return string|array Resultado en un html
     */
    public function alert_success(string $mensaje): string|array
    {
        $mensaje = trim($mensaje);
        if($mensaje === ''){
            return $this->error->error(mensaje: 'Error mensaje esta vacio', data: $mensaje);
        }
        return "<div class='alert alert-success' role='alert' ><strong>Muy bien!</strong> $mensaje.</div>";
    }

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

        $seccion = trim($seccion);
        if($seccion === ''){
            return $this->error->error(mensaje: 'Error la $seccion esta vacia', data: $seccion);
        }
        $accion = trim($accion);
        if($accion === ''){
            return $this->error->error(mensaje: 'Error la $accion esta vacia', data: $accion);
        }
        $style = trim($style);
        if($style === ''){
            return $this->error->error(mensaje: 'Error la $style esta vacia', data: $style);
        }
        $etiqueta = trim($etiqueta);
        if($etiqueta === ''){
            return $this->error->error(mensaje: 'Error la $etiqueta esta vacia', data: $etiqueta);
        }
        $session_id = (new generales())->session_id;

        if($session_id === ''){
            return $this->error->error(mensaje: 'Error la $session_id esta vacia', data: $session_id);
        }

        $link = "index.php?seccion=$seccion&accion=$accion&registro_id=$registro_id&session_id=$session_id";
        return "<a role='button' href='$link' class='btn btn-$style col-sm-12'>$etiqueta</a>";
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
        $id_css = trim($id_css);
        if($id_css === ''){
            return $this->error->error(mensaje: 'Error $id_css debe tener info', data: $id_css);
        }
        $place_holder = trim($place_holder);
        if($place_holder === ''){
            return $this->error->error(mensaje: 'Error $place_holder debe tener info', data: $place_holder);
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

        $name = trim($name);
        if($name === ''){
            return $this->error->error(mensaje: 'Error name es necesario', data: $name);
        }
        $id_css = trim($id_css);
        if($id_css === ''){
            return $this->error->error(mensaje: 'Error $id_css es necesario', data: $id_css);
        }
        $place_holder = trim($place_holder);
        if($place_holder === ''){
            return $this->error->error(mensaje: 'Error $place_holder es necesario', data: $place_holder);
        }

        $disabled_html = (new params_inputs())->disabled_html(disabled:$disabled);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar $disabled_html', data: $disabled_html);
        }

        $required_html = (new params_inputs())->required_html(required: $required);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar $required_html', data: $required_html);
        }

        $html = "<input type='text' name='$name' value='$value' class='form-control' $disabled_html $required_html ";
        $html.= "id='$id_css' placeholder='$place_holder' />";
        return $html;
    }


}
