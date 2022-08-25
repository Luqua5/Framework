<?php 

namespace exceptions;

class actionNotCallableExceptions extends \Exception {
    protected $message = "Ce n'est pas pas un collable ou pas un tableau";
}