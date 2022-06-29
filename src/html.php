<?php
namespace html;
use base\frontend\params_inputs;
use config\generales;
use gamboamartin\errores\errores;
use stdClass;

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

        $valida = $this->valida_input(accion: $accion,etiqueta:  $etiqueta, seccion: $seccion,style:  $style);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al validar datos', data: $valida);
        }

        $session_id = (new generales())->session_id;

        if($session_id === ''){
            return $this->error->error(mensaje: 'Error la $session_id esta vacia', data: $session_id);
        }

        $link = "index.php?seccion=$seccion&accion=$accion&registro_id=$registro_id&session_id=$session_id";
        return "<a role='button' href='$link' class='btn btn-$style col-sm-12'>$etiqueta</a>";
    }

    /**
     * Genera un div con un label dentro del div
     * @param int $cols Numero de columnas css
     * @param string $contenido Contenido a integrar dentro del div
     * @return string
     */
    private function div_control_group_cols(int $cols, string $contenido): string
    {
        $div_contenedor_ini = "<div class='control-group col-sm-$cols'>";
        $div_contenedor_fin = "</div>";

        return $div_contenedor_ini.$contenido.$div_contenedor_fin;
    }

    /**
     * @param int $cols Numero de columnas css
     * @param string $contenido
     * @param string $label
     * @param string $name
     * @return string
     */
    private function div_control_group_cols_label(int $cols, string $contenido, string $label, string $name): string
    {
        $label_html = $this->label(id_css:$name,place_holder: $label);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar label', data: $label_html);
        }

        $html = $this->div_control_group_cols(cols: $cols,contenido: $label_html.$contenido);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar contenedor', data: $html);
        }

        return $html;
    }

    private function div_controls(string $contenido): string
    {
        $div_controls_ini = "<div class='controls'>";
        $div_controls_fin = "</div>";

        return $div_controls_ini.$contenido.$div_controls_fin;
    }

    private function div_select(string $name, string $options_html): string
    {
        $select_in = "<select class='form-control selectpicker color-secondary $name' id='$name' name='$name' >";
        $select_fin = '</select>';
        return $select_in.$options_html.$select_fin;
    }

    /**
     * @param string $descripcion_select
     * @param mixed $id_selected Id o valor a comparar origen de la base de valor
     * @param string $options_html
     * @param mixed $value
     * @return array|string
     */
    private function integra_options_html(string $descripcion_select, mixed $id_selected, string $options_html,
                                          mixed $value): array|string
    {
        $option_html = $this->option_html(descripcion_select: $descripcion_select,id_selected: $id_selected,
            value: $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar option', data: $option_html);
        }

        $options_html.=$option_html;

        return $options_html;
    }

    /**
     * @param int $cols Numero de columnas css
     ** @param mixed $id_selected Id o valor a comparar origen de la base de valor
     * @param string $label
     * @param string $name
     * @param array $values
     * @return array|string
     */
    public function select(int $cols, int $id_selected, string $label,string $name, array $values): array|string
    {

        $options_html = $this->options(id_selected: $id_selected,values: $values);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar options', data: $options_html);
        }

        $select = $this->select_html(cols: $cols, label: $label,name: $name,options_html: $options_html);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar contenedor', data: $select);
        }

        return $select;

    }

    /**
     * @param int $cols Numero de columnas css
     * @param string $label
     * @param string $name
     * @param string $options_html
     * @return array|string
     */
    private function select_html(int $cols, string $label, string $name, string $options_html): array|string
    {
        $select = $this->div_select(name: $name,options_html: $options_html);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar contenedor', data: $select);
        }

        $select = $this->div_controls(contenido: $select);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar contenedor', data: $select);
        }

        $select = $this->div_control_group_cols_label(cols: $cols,contenido: $select,label: $label,name: $name);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar contenedor', data: $select);
        }
        return $select;
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
     * Genera un option para un select
     * @param string $descripcion descripcion del option
     * @param bool $selected Si selected se anexa selected a option
     * @param mixed $value Value del option
     * @return string|array
     * @version 0.44.5
     */
    PUBLIC function option(string $descripcion, bool $selected, int|string $value): string|array
    {
        $value = trim($value);
        if($value === ''){
            return $this->error->error(mensaje: 'Error value no puede venir vacio', data: $value);
        }
        $descripcion = trim($descripcion);
        if($descripcion === ''){
            return $this->error->error(mensaje: 'Error $descripcion no puede venir vacio', data: $descripcion);
        }
        $selected_html = '';
        if($selected){
            $selected_html = 'selected';
        }
        return "<option value='$value' $selected_html>$descripcion</option>";
    }

    /**
     * @param string $descripcion_select
     * @param mixed $id_selected Id o valor a comparar origen de la base de valor
     * @param mixed $value
     * @return array|string
     */
    private function option_html(string $descripcion_select, mixed $id_selected, mixed $value): array|string
    {
        $value = (int)$value;
        $selected = $this->selected(value: $value,id_selected: $id_selected);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al verificar selected', data: $selected);
        }

        $option_html = $this->option(descripcion: $descripcion_select,selected:  $selected, value: $value);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar option', data: $option_html);
        }
        return $option_html;
    }

    /**
     * @param mixed $id_selected Id o valor a comparar origen de la base de valor
     * @param array $values
     * @return array|string
     */
    private function options(mixed $id_selected, array $values): array|string
    {
        $options_html = $this->option(descripcion: 'Selecciona una opcion',selected:  false, value: -1);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar option', data: $options_html);
        }
        $options_html = $this->options_html_data(id_selected: $id_selected,options_html: $options_html,values: $values);
        if(errores::$error){
            return $this->error->error(mensaje: 'Error al generar options', data: $options_html);
        }
        return $options_html;
    }

    /**
     * @param mixed $id_selected Id o valor a comparar origen de la base de valor
     * @param string $options_html
     * @param array $values
     * @return array|string
     */
    private function options_html_data(mixed $id_selected, string $options_html, array $values): array|string
    {
        $options_html_ = $options_html;
        foreach ($values as $value=>$descripcion_select){

            $options_html_ = $this->integra_options_html(descripcion_select: $descripcion_select,
                id_selected: $id_selected,options_html: $options_html_,value: $value);
            if(errores::$error){
                return $this->error->error(mensaje: 'Error al generar option', data: $options_html_);
            }
        }
        return $options_html_;
    }

    /**
     * Verifica si el elemento debe ser selected o no
     * @param mixed $value valor del item del select
     * @param mixed $id_selected Id o valor a comparar origen de la base de valor
     * @return bool
     */
    private function selected(mixed $value, mixed $id_selected): bool
    {
        $selected = false;
        if((string)$value === (string)$id_selected){
            $selected = true;
        }
        return $selected;
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

    /**
     * Valida los datos de un input sean correctos
     * @version 0.36.5
     * @param string $accion Accion a verificar
     * @param string $etiqueta Etiqueta a mostrar en el input
     * @param string $seccion Seccion en ejecucion
     * @param string $style Estilo css
     * @return bool|array
     */
    public function valida_input(string $accion, string $etiqueta, string $seccion, string $style): bool|array
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
        return true;
    }


}
