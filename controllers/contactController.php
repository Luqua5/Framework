<?php

namespace controllers;

use source\renderer;

class contactController {
    public function contact() {
        return renderer::make("contact"); //on crée une instance d'index
    }
}