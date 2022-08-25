<?php

namespace Tests\Unit;

use router\router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /** @test */
    public function register():void
    {
        //$this -> assertTrue(false); on regarde si ce qu'il y a entre parenthèse est vrai

        $router = new router();
        $router -> register('/framework/public/', ['controllers\homeController', 'index'] ); //getRoute pour choper la route pour le test sinon c'est pas possible

        $this->assertEquals(['/framework/public/' => ['controllers\homeController', 'index'] ], $router -> getRoute()); //on regarde si les routes ont bien été save, on compare les 2 params
    }

    
}