<?php
namespace App\Controllers;

use App\Models\Loginmodel;

class LoginController extends BaseController
{
    public function login()
    {
        //  esta es la vista principal de formulario login

        //este es el formulario que tiene la vista proncipal del formulario obligatoriamente requieren sesion entonces toca ponerla para que no falle  este hasta print es la validacion de formularios
        session();

        // por aca pasamos los campos erados a la vista en la validacion de form $cvalidaciones puede ser cualquiera  esto es lo que nos imprime los errores en la vista cuando se retrocede
        $validaciones = \config\Services::validation();
        //list errors devuelve los errores de los formularios esta muestra los errores
        print($validaciones->listErrors());

        $mensaje = session('mensaje');
        $data    = ['mensaje' => $mensaje];
        return view('login/index', $data);
    }

    public function procesarLogin()
    {

        // hacemos la validacion de formulario si los datos estan bien llenos seguimos a validar que exista como usuario

        //validando el formulario primero voy a config validate y pongo las validaciones y luego me vengo pa ca, validar_formulario es el nombre de la variable que pusimos por alla en el archivo de conffig en validate

        if ($this->validate('validar_formulario_login')) {
// si cumplio con los datos requeridos de formulario
            //podemos hacerlo como en la insercion de array asociativo,o de esta otra manera, ello hizo de esta para saber que existe
            $usuario  = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');
            $usuarios = new Loginmodel();

            $datos_usuario = $usuarios->obtenerUsuario(['usuario' => $usuario]);
            //si encuentra un usuario tenbdra datos array  y el pasword de esta pesona coincida con el que esta
            if (count($datos_usuario) > 0 && password_verify($password, $datos_usuario[0]['password'])) {
                // aca creamos los datos que les crearemos session
                $data = [
                    'usuario' => $datos_usuario[0]['usuario'],
                    'roll'    => $datos_usuario[0]['roll'],

                ];
                $session = session();
                $session->set($data);
                // esos mensaje 1 es una sesion ,mensaje y en el login recibimos ese mensaje en sesion(mensaje ) el numero es el que queramos envair pero en la vista se recoge y de acuerdo al numero en un condicional decido que mensaje mostrar
                return redirect()->to(base_url() . route_to('inicioSesion'))->with('mensaje', '1');

            } else {
                // si valido bien formulario pero no es usuario
                return redirect()->to(base_url() . route_to('principal'))->with('mensaje', '0');
            }

        } else {

//si tenemos problemas con las validaciones lo redirigimos esta funcion es la que redirecciona atras para cuando el formulario este malo no lo deja avanzar si no que se retrocede wit input es para que no pierda los datos escritos en el formulario
            return redirect()->back()->withInput();
        }
    }

    public function inicioSesion()
    {

        $mensaje = session('mensaje');
        $data    = ['mensaje' => $mensaje];

        return view('login/inicioapp', $data);
    }
    public function cerrarSesion()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url() . route_to('login'));

    }
}
