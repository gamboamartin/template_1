<?php
namespace tests\controllers;

use gamboamartin\controllers\controlador_adm_seccion;
use gamboamartin\errores\errores;
use gamboamartin\test\liberator;
use gamboamartin\test\test;
use html\directivas;
use JetBrains\PhpStorm\NoReturn;
use JsonException;

use stdClass;


class directivasTest extends test {
    public errores $errores;
    private stdClass $paths_conf;
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->errores = new errores();

        $this->paths_conf = new stdClass();
        $this->paths_conf->generales = '/var/www/html/cat_sat/config/generales.php';
        $this->paths_conf->database = '/var/www/html/cat_sat/config/database.php';
        $this->paths_conf->views = '/var/www/html/cat_sat/config/views.php';

    }

    /**
     * @throws JsonException
     */
    #[NoReturn] public function test_button_href(): void
    {
        errores::$error = false;
        $html = new directivas();
        $html = new liberator($html);
        $_GET['session_id'] = 1;
        $accion = -1;
        $registro_id = -1;
        $seccion = 'a';
        $etiqueta = 'a';
        $name = 'a';
        $place_holder = 'c';
        $style = 'a';

        $resultado = $html->button_href($accion, $etiqueta, $name, $place_holder, $registro_id, $seccion, $style);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<label class='control-label' for='a'>c</label><div class='controls'><a role='button' href='index.php?seccion=a&accion=-1&registro_id=-1&session_id=1' class='btn btn-a col-sm-12'>a</a></div>", $resultado);


        errores::$error = false;
    }

    /**
     */
    #[NoReturn] public function test_input_codigo(): void
    {
        errores::$error = false;
        $html = new directivas();
        //$html = new liberator($html);
        $_GET['session_id'] = 1;
        $cols = 1;
        $row_upd = new stdClass();
        $value_vacio = false;


        $resultado = $html->input_codigo($cols, $row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<div class='control-group col-sm-1'><label class='control-label' for='codigo'>Codigo</label><div class='controls'><input type='text' name='codigo' value='' class='form-control'  required id='codigo' placeholder='Codigo' /></div></div>", $resultado);

        errores::$error = false;
    }


    /**
     * @throws JsonException
     */
    #[NoReturn] public function test_input_text_required(): void
    {
        errores::$error = false;
        $html = new directivas();
        $html = new liberator($html);

        $disable = false;
        $name = 'a';
        $place_holder = 'b';
        $row_upd = new stdClass();
        $value_vacio = false;
        $resultado = $html->input_text_required($disable, $name, $place_holder, $row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<label class='control-label' for='a'>b</label><div class='controls'><input type='text' name='a' value='' class='form-control'  required id='a' placeholder='b' /></div>", $resultado);

        errores::$error = false;

        $disable = true;
        $name = 'a';
        $place_holder = 'b';
        $row_upd = new stdClass();
        $value_vacio = false;
        $resultado = $html->input_text_required($disable, $name, $place_holder, $row_upd, $value_vacio);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<label class='control-label' for='a'>b</label><div class='controls'><input type='text' name='a' value='' class='form-control' disabled required id='a' placeholder='b' /></div>", $resultado);

        errores::$error = false;


    }

    /**
     * @throws JsonException
     */
    #[NoReturn] public function test_mensaje_exito(): void
    {
        errores::$error = false;
        $html = new directivas();

        $controler = new controlador_adm_seccion(link: $this->link,paths_conf: $this->paths_conf);

        $resultado = $html->mensaje_exito($controler->mensaje_exito);

        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("", $resultado);

        errores::$error = false;
        $html = new directivas();
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
        $html = new directivas();
        $_GET['session_id'] = 1;
        $_GET['seccion'] = 'adm_seccion';
        $_GET['accion'] = 'lista';
        $_SESSION['grupo_id'] = 1;
        $_SESSION['warning'][]['mensaje'] = 'a';
        $controler = new controlador_adm_seccion(link: $this->link, paths_conf: $this->paths_conf);
        //$controler->mensaje_exito = 'a'
        $resultado = $html->mensaje_warning($controler->mensaje_warning);
        print_r($resultado);
        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertStringContainsStringIgnoringCase("<div class='alert alert-warning' role='alert' ><strong>Advertencia!</strong> a.</div>", $resultado);
        errores::$error = false;
    }


}

