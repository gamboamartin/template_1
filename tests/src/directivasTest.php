<?php
namespace tests\controllers;

use gamboamartin\administrador\tests\base_test;
use gamboamartin\controllers\controlador_adm_seccion;
use gamboamartin\errores\errores;
use gamboamartin\template_1\directivas;
use gamboamartin\template_1\html;
use gamboamartin\test\liberator;
use gamboamartin\test\test;


use JetBrains\PhpStorm\NoReturn;
use JsonException;

use stdClass;


class directivasTest extends test {
    public errores $errores;
    private stdClass $paths_conf;
    public function __construct(?string $name = null)
    {
        parent::__construct($name);
        $this->errores = new errores();

        $this->paths_conf = new stdClass();
        $this->paths_conf->generales = '/var/www/html/cat_sat/config/generales.php';
        $this->paths_conf->database = '/var/www/html/cat_sat/config/database.php';
        $this->paths_conf->views = '/var/www/html/cat_sat/config/views.php';

    }



    /**
     */
    #[NoReturn] public function test_button_href_status(): void
    {
        errores::$error = false;
        $html_ = new html();
        $html = new directivas($html_);
        //$html = new liberator($html);
        $_GET['session_id'] = 1;
        $cols = 1;
        $registro_id = -1;
        $seccion = 'a';
        $status = 'a';


        $resultado = $html->button_href_status($cols, $registro_id, $seccion, $status);


        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='control-group col-sm-1'><label class='control-label' for='status'>Status</label><div class='controls'><a role='button' href='index.php?seccion=a&accion=status&registro_id=-1&session_id=1' class='btn btn-danger col-sm-12'>a</a></div></div>", $resultado);

        errores::$error = false;
    }

    #[NoReturn] public function test_button_href_valida_persona_fisica(): void
    {
        errores::$error = false;
        $_GET['session_id'] = 1;
        $html_ = new html();
        $html = new directivas($html_);

        $registro_id = -1;
        $valida_persona_fisica = true;
        $resultado = $html->button_href_valida_persona_fisica($registro_id, $valida_persona_fisica);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<label class='control-label' for='valida_persona_fisica'>Valida persona fisica</label><div class='controls'><a role='button' href='index.php?seccion=cat_sat_tipo_persona&accion=valida_persona_fisica&registro_id=-1&session_id=1' class='btn btn-danger col-sm-12'>1</a></div>", $resultado);
        errores::$error = false;

    }

    #[NoReturn] public function test_email_required(): void
    {
        errores::$error = false;
        $html_ = new html();
        $html = new directivas($html_);


        
        $disabled = true;
        $name = 'a';
        $place_holder = 'b';
        $value_vacio = false;
        $row_upd = new stdClass();
        $resultado = $html->email_required($disabled, $name, $place_holder, $row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<label class='control-label' for='a'>b</label><div class='controls'><input type='text' name='a' value='' class='form-control' disabled required id='a' placeholder='b' pattern='[^@\s]+@[^@\s]+[^.\s]' /></div>", $resultado);
        errores::$error = false;
    }


    /**
     * @throws JsonException
     */
    #[NoReturn] public function test_input_alias(): void
    {
        errores::$error = false;
        $html_ = new html();
        $html = new directivas($html_);
        //$html = new liberator($html);
        $_GET['session_id'] = 1;
        $value_vacio = false;
        $row_upd = new stdClass();


        $resultado = $html->input_alias($row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='control-group col-sm-6'><label class='control-label' for='alias'>Alias</label><div class='controls'><input type='text' name='alias' value='' class='form-control' required id='alias' placeholder='Alias' title='Alias' /></div></div>", $resultado);
        errores::$error = false;
    }

    /**
     */
    #[NoReturn] public function test_input_codigo(): void
    {
        errores::$error = false;
        $html_ = new html();
        $html = new directivas($html_);
        //$html = new liberator($html);
        $_GET['session_id'] = 1;
        $cols = 1;
        $row_upd = new stdClass();
        $value_vacio = false;


        $resultado = $html->input_codigo($cols, $row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='control-group col-sm-1'><label class='control-label' for='codigo'>Codigo</label><div class='controls'><input type='text' name='codigo' value='' class='form-control' required id='codigo' placeholder='Codigo' title='Codigo' /></div></div>", $resultado);

        errores::$error = false;
    }

    /**
     */
    #[NoReturn] public function test_input_codigo_bis(): void
    {
        errores::$error = false;
        $html_ = new html();
        $html = new directivas($html_);
        //$html = new liberator($html);
        $_GET['session_id'] = 1;
        $cols = 1;
        $row_upd = new stdClass();
        $value_vacio = false;


        $resultado = $html->input_codigo_bis($cols, $row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='control-group col-sm-1'><label class='control-label' for='codigo_bis'>Codigo BIS</label><div class='controls'><input type='text' name='codigo_bis' value='' class='form-control' required id='codigo_bis' placeholder='Codigo BIS' title='Codigo BIS' /></div></div>", $resultado);

        errores::$error = false;
    }

    /**
     * @throws JsonException
     */
    #[NoReturn] public function test_input_descripcion(): void
    {
        errores::$error = false;
        $html_ = new html();
        $html = new directivas($html_);

        $row_upd = new stdClass();
        $value_vacio = true;
        $resultado = $html->input_descripcion($row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='control-group col-sm-12'><label class='control-label' for='descripcion'>Descripcion</label><div class='controls'><input type='text' name='descripcion' value='' class='form-control' required id='descripcion' placeholder='Descripcion' title='Descripcion' /></div></div>", $resultado);

        errores::$error = false;
    }

    /**
     */
    #[NoReturn] public function test_input_descripcion_select(): void
    {
        errores::$error = false;
        $html_ = new html();
        $html = new directivas($html_);
        //$html = new liberator($html);
        $_GET['session_id'] = 1;

        $row_upd = new stdClass();
        $value_vacio = false;


        $resultado = $html->input_descripcion_select($row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='control-group col-sm-6'><label class='control-label' for='descripcion_select'>Descripcion Select</label><div class='controls'><input type='text' name='descripcion_select' value='' class='form-control' required id='descripcion_select' placeholder='Descripcion Select' title='Descripcion Select' /></div></div>", $resultado);

        errores::$error = false;
    }


    /**
     * @throws JsonException
     */
    #[NoReturn] public function test_input_text_required(): void
    {
        errores::$error = false;
        $html_ = new html();
        $html = new directivas($html_);
        $html = new liberator($html);

        $disable = false;
        $name = 'a';
        $place_holder = 'b';
        $row_upd = new stdClass();
        $value_vacio = false;
        $resultado = $html->input_text_required($disable, $name, $place_holder, $row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<label class='control-label' for='a'>b</label><div class='controls'><input type='text' name='a' value='' class='form-control' required id='a' placeholder='b' title='b' /></div>", $resultado);

        errores::$error = false;

        $disable = true;
        $name = 'a';
        $place_holder = 'b';
        $row_upd = new stdClass();
        $value_vacio = false;
        $resultado = $html->input_text_required($disable, $name, $place_holder, $row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<label class='control-label' for='a'>b</label><div class='controls'><input type='text' name='a' value='' class='form-control' disabled required id='a' placeholder='b' title='b' /></div>", $resultado);

        errores::$error = false;


    }



    /**
     */
    #[NoReturn] public function test_mensaje_exito(): void
    {
        errores::$error = false;


        $_SESSION['grupo_id'] = 2;
        $_SESSION['usuario_id'] = 2;

        $html_ = new html();
        $html = new directivas($html_);


        $alta = (new base_test())->alta_adm_accion(link: $this->link,adm_seccion_descripcion: 'adm_session',descripcion: 'login');
        if(errores::$error){
            print_r($alta);
            exit;
        }


        $controler = new controlador_adm_seccion(link: $this->link,paths_conf: $this->paths_conf);

        $resultado = $html->mensaje_exito($controler->mensaje_exito);


        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertStringContainsStringIgnoringCase("alert alert-success no-margin-bottom alert-dismissible", $resultado);

        errores::$error = false;
        $html_ = new html();
        $html = new directivas($html_);
        $_SESSION['exito'][]['mensaje'] = 'hola';
        $controler = new controlador_adm_seccion(link: $this->link,paths_conf: $this->paths_conf);
        $resultado = $html->mensaje_exito($controler->mensaje_exito);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertStringContainsStringIgnoringCase("<div class='alert alert-success' role='alert' ><strong>Muy bien!</strong> ", $resultado);

        errores::$error = false;
    }

    /**
     * @throws JsonException
     */
    #[NoReturn] public function test_mensaje_warning(): void
    {
        errores::$error = false;
        $html_ = new html();
        $html = new directivas($html_);
        $_GET['session_id'] = 1;
        $_GET['seccion'] = 'adm_seccion';
        $_GET['accion'] = 'lista';
        $_SESSION['grupo_id'] = 2;
        $_SESSION['usuario_id'] = 2;
        $_SESSION['warning'][]['mensaje'] = 'a';

        $del = (new base_test())->del_adm_seccion(link: $this->link);
        if(errores::$error){
            print_r($del);
            exit;
        }

        $alta = (new base_test())->alta_adm_accion(link: $this->link,adm_seccion_descripcion: 'adm_seccion',descripcion: 'lista');
        if(errores::$error){
            print_r($alta);
            exit;
        }

        $controler = new controlador_adm_seccion(link: $this->link, paths_conf: $this->paths_conf);
        //$controler->mensaje_exito = 'a'
        $resultado = $html->mensaje_warning($controler->mensaje_warning);

        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertStringContainsStringIgnoringCase("<div class='alert alert-warning' role='alert' ><strong>Advertencia!</strong> a.</div>", $resultado);
        errores::$error = false;
    }




}

