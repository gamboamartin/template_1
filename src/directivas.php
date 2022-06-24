<?php
namespace html;
use gamboamartin\errores\errores;
use stdClass;

class directivas{
    private html $html;
    private errores $error;
    public function __construct(){
        $this->html = new html();
        $this->error = new errores();
    }

    /**
     * @param string $accion Accion a ejecutar
     * @param string $etiqueta Etiqueta de boton
     * @param string $name Nombre para ser aplicado a for
     * @param string $place_holder Etiqueta a mostrar
     * @param int $registro_id Registro a mandar transaccion
     * @param string $seccion Seccion a ejecutar
     * @param string $style Estilo del boton info,danger,warning etc
     * @return array|string
     */
    private function button_href(string $accion, string $etiqueta, string $name, string $place_holder, int $registro_id,
                                 string $seccion, string $style): array|string
    {
        $label = $this->html->label(id_css: $name, place_holder: $place_holder);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar label', data: $label);
        }
        $html= $this->html->button_href(accion: $accion,etiqueta:  $etiqueta, registro_id: $registro_id,
            seccion:  $seccion, style: $style);

        return $label."<div class='controls'>$html</div>";

    }

    /**
     * Genera un boton de tipo link para transaccionar status
     * @param int $cols Columnas en formato css de 1 a 12
     * @param int $registro_id
     * @param string $seccion Seccion a ejecutar
     * @param string $status
     * @return array|string
     */
    public function button_href_status(int $cols, int $registro_id, string $seccion, string $status): array|string
    {
        $style = 'danger';
        if($status === 'activo'){
            $style = 'info';
        }
        $html = $this->button_href(accion: 'status',etiqueta: $status,name: 'status',
            place_holder: 'Status',registro_id: $registro_id,seccion: $seccion, style: $style);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar label', data: $html);
        }

        return "<div class='control-group col-sm-$cols'>$html</div>";
    }

    public function button_href_valida_persona_fisica(int $registro_id, string $valida_persona_fisica): array|string
    {

        $style = 'danger';
        if($valida_persona_fisica === 'activo'){
            $style = 'info';
        }

        $html = $this->button_href(accion: 'valida_persona_fisica',etiqueta: $valida_persona_fisica
            ,name: 'valida_persona_fisica', place_holder: 'Valida persona fisica',registro_id: $registro_id,
            seccion: 'cat_sat_tipo_persona', style: $style);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar label', data: $html);
        }
        return $html;
    }

    /**
     * @param stdClass $row_upd
     * @param bool $value_vacio
     * @return array|string
     */
    public function input_alias(stdClass $row_upd, bool $value_vacio): array|string
    {
        $html =$this->input_text_required(disable: false,name: 'alias',
            place_holder: 'Alias', row_upd: $row_upd, value_vacio: $value_vacio);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input', data: $html);
        }
        return "<div class='control-group col-sm-6'>$html</div>";
    }

    public function input_codigo(int $cols, stdClass $row_upd, bool $value_vacio): array|string
    {

        $html =$this->input_text_required(disable: false,name: 'codigo',place_holder: 'Codigo',row_upd: $row_upd,
            value_vacio: $value_vacio);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input', data: $html);
        }
        return "<div class='control-group col-sm-$cols'>$html</div>";
    }

    public function input_codigo_bis(int $cols, stdClass $row_upd, bool $value_vacio): array|string
    {
        $html =$this->input_text_required(disable: false,name: 'codigo_bis',
            place_holder: 'Codigo BIS', row_upd: $row_upd, value_vacio: $value_vacio);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input', data: $html);
        }

        return "<div class='control-group col-sm-$cols'>$html</div>";

    }

    public function input_descripcion(stdClass $row_upd, bool $value_vacio): array|string
    {
        $html =$this->input_text_required(disable: false,name: 'descripcion', place_holder: 'Descripcion',
            row_upd: $row_upd, value_vacio: $value_vacio);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input', data: $html);
        }
        return "<div class='control-group col-sm-12'>$html</div>";

    }

    public function input_descripcion_select(stdClass $row_upd, bool $value_vacio): array|string
    {
        $html =$this->input_text_required(disable: false,name: 'descripcion_select',
            place_holder: 'Descripcion Select', row_upd: $row_upd, value_vacio: $value_vacio);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input', data: $html);
        }
        return "<div class='control-group col-sm-6'>$html</div>";
    }

    public function input_id(int $cols, stdClass $row_upd, bool $value_vacio): array|string
    {
        $html =$this->input_text(disable: true,name: 'id',place_holder: 'ID',
            required: false, row_upd: $row_upd, value_vacio: $value_vacio);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar input', data: $html);
        }

        return "<div class='control-group col-sm-$cols'>$html</div>";
    }

    private function input_text(bool $disable, string $name, string $place_holder, bool $required, stdClass $row_upd,
                                bool $value_vacio): array|string
    {
        $label = $this->html->label(id_css: $name, place_holder: $place_holder);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar label', data: $label);
        }

        if($value_vacio){
            $row_upd = new stdClass();
            $row_upd->$name = '';
        }

        $html= $this->html->text(disabled:$disable, id_css: $name, name: $name, place_holder: $place_holder,
            required: $required, value: $row_upd->$name);

        return $label."<div class='controls'>$html</div>";

    }

    /**
     * @param stdClass $row_upd
     * @param bool $disable
     * @param string $name Usado para identificador css name input y place holder
     * @param string $place_holder
     * @param bool $value_vacio
     * @return array|string
     */
    private function input_text_required(bool $disable, string $name, string $place_holder, stdClass $row_upd,
                                         bool $value_vacio ): array|string
    {
        $label = $this->html->label(id_css: $name, place_holder: $place_holder);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar label', data: $label);
        }
        if($value_vacio){
            $row_upd = new stdClass();
            $row_upd->$name = '';
        }
        $html= $this->html->text(disabled:$disable, id_css: $name, name: $name, place_holder: $place_holder,
            required: true, value: $row_upd->$name);

        return $label."<div class='controls'>$html</div>";

    }



    /**
     * Genera un mensaje de exito
     * @param string $mensaje_exito
     * @return array|string
     * @version 0.13.0
     */
    public function mensaje_exito(string $mensaje_exito): array|string
    {
        $alert_exito = '';
        if($mensaje_exito!==''){
            $alert_exito = $this->html->alert_success(mensaje: $mensaje_exito);
            if(errores::$error){
                return $this->error->error(mensaje: 'Error al generar alerta', data: $alert_exito);
            }

        }
        return $alert_exito;
    }

    /**
     * Genera un mensaje de tipo warning
     * @param string $mensaje_warning
     * @return array|string
     * @version 0.19.1
     */
    public function mensaje_warning( string $mensaje_warning): array|string
    {
        $alert_warning = '';
        if($mensaje_warning!==''){
            $alert_warning = $this->html->alert_warning(mensaje: $mensaje_warning);
            if(errores::$error){
                return $this->error->error(mensaje: 'Error al generar alerta', data: $alert_warning);
            }
        }
        return $alert_warning;
    }
}
