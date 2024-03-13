<?php
namespace tests\controllers;

use gamboamartin\errores\errores;
use gamboamartin\template_1\nav;
use gamboamartin\test\liberator;
use gamboamartin\test\test;
use JetBrains\PhpStorm\NoReturn;

use stdClass;


class navTest extends test {
    public errores $errores;
    private stdClass $paths_conf;
    public function __construct(?string $name = null)
    {
        parent::__construct($name);
        $this->errores = new errores();

    }

    /**
     */
    #[NoReturn] public function test_li_menu_principal_lista(): void
    {
        errores::$error = false;
        $nav = new nav();
        $nav = new liberator($nav);

        $links = new stdClass();
        $seccion = 'b';
        $links->b = new stdClass();
        $links->b->lista = 'd';
        $resultado = $nav->li_menu_principal_lista($links, $seccion, 'a');

        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<li class='nav-item'><a class='nav-link' href='d' role='button'>A</a></li>", $resultado);
        errores::$error = false;
    }

    /**
     */
    #[NoReturn] public function test_link_menu_principal_lista(): void
    {
        errores::$error = false;
        $nav = new nav();
        $nav = new liberator($nav);

        $links = new stdClass();
        $seccion = 'a';
        $links->a = new stdClass();
        $links->a->lista = 'a';
        $resultado = $nav->link_menu_principal_lista($links, $seccion, 'fN');


        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<a class='nav-link' href='a' role='button'>FN</a>", $resultado);


        errores::$error = false;
    }

    /**
     */
    #[NoReturn] public function test_lis_menu_principal(): void
    {
        errores::$error = false;
        $nav = new nav();
        //$nav = new liberator($nav);

        $links = new stdClass();
        $links->cat_sat_tipo_persona = new stdClass();
        $links->cat_sat_tipo_persona->lista = 'z';

        $resultado = $nav->lis_menu_principal($links, array(0=>array('adm_seccion_descripcion'=>'cat_sat_tipo_persona')));

        $this->assertIsString($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertEquals("<li class='nav-item'><a class='nav-link' href='z' role='button'>Cat Sat Tipo Persona</a></li>", $resultado);
        errores::$error = false;
    }

    /**
     */
    #[NoReturn] public function test_valida_links(): void
    {
        errores::$error = false;
        $nav = new nav();
        $nav = new liberator($nav);

        $links = new stdClass();
        $seccion = '';

        $resultado = $nav->valida_links($links, $seccion);
        $this->assertIsArray($resultado);
        $this->assertTrue(errores::$error);
        $this->assertStringContainsStringIgnoringCase("Error la seccion esta vacia", $resultado['mensaje']);

        errores::$error = false;
        $links = new stdClass();
        $seccion = 'd';

        $resultado = $nav->valida_links($links, $seccion);
        $this->assertIsBool($resultado);
        $this->assertNotTrue(errores::$error);


        errores::$error = false;
        $links = new stdClass();
        $seccion = 'd';
        $links->d = new stdClass();
        $resultado = $nav->valida_links($links, $seccion);

        $this->assertIsBool($resultado);
        $this->assertNotTrue(errores::$error);


        errores::$error = false;
        $links = new stdClass();
        $seccion = 'd';
        $links->d = new stdClass();
        $links->d->lista = 'z';
        $resultado = $nav->valida_links($links, $seccion);
        $this->assertIsBool($resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertTrue($resultado);
        errores::$error = false;

    }




}

