<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action
{
  public function autenticar()
  {
    $usuario = Container::getModel('Usuario');

    $usuario->__set('email', $_POST['email']);
    $usuario->__set('senha', $_POST['senha']);

    $usuario->autenticar();

    if (!empty($usuario->__get('id')) && !empty($usuario->__get('nome'))) {
      echo 'autenticado';
    }else{
      header('Location: /?login=erro');
    }
  }
}