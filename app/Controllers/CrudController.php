<?php
namespace App\Controllers;

use App\Models\Crudmodel;

class CrudController extends BaseController
{
    public function principalCrud()
    {
        //  esta es la vista principal de formulario login

        //este es el formulario que tiene la vista proncipal del formulario obligatoriamente requieren sesion entonces toca ponerla para que no falle  este hasta print es la validacion de formularios
        session();

        // por aca pasamos los campos erados a la vista en la validacion de form $cvalidaciones puede ser cualquiera  esto es lo que nos imprime los errores en la vista cuando se retrocede
        $validaciones = \config\Services::validation();
        //list errors devuelve los errores de los formularios esta muestra los errores
        print($texto_de_errores = $validaciones->listErrors());
        //yo meti validacion eerores que es lo que nos retorna en esta $texto_de_errores para probar sui puedo meterna en un html y me quede mejor  este del div es el mismo que esta arriba de print solo que hice a ver si era capaz de cambiarle el color
        echo "</br>";
        echo '<div style="color:red;">
        	' . $texto_de_errores . '
        </div>';

        $mensaje = session('mensaje');

        $crud   = new Crudmodel();
        $nombre = $crud->listarNombres();
        $data   = ['nombres' => $nombre,
            'mensaje'            => $mensaje];
        return view('crud/paginaInicioCrud', $data);
    }

    public function crear()
    {
        if ($this->validate('validar_formulario_crud')) {
            //la clave del array asociativo es el nombre como en la tabla de la bd y el mismo orden
            $datos = ['nombre' => $_POST['nombre'],
                'materno'          => $_POST['apmate'],
                'paterno'          => $_POST['appat'],
            ];

            $crud      = new Crudmodel();
            $respuesta = $crud->insertar($datos);
            //la respuesta de  crud si esta buena es elid entonces si retorna un id obvio sera mayor a cero todo esta ok
            if ($respuesta > 0) {
                //con with se crea una session mensaje y se le da el valor 1 esto es para validar que sea 1 correcto 2 incorrecto ay puede ser cualquier valor
                return redirect()->to(base_url() . route_to('inicioCrud'))->with('mensaje', '1');
            } else {
                return redirect()->to(base_url() . route_to('inicioCrud'))->with('mensaje', '0');
            }

        } else {
            return redirect()->back()->withInput();
        }
    }
    public function actualizar()
    {

        if ($this->validate('validar_formulario_crud')) {

            //la clave del array asociativo es el nombre como en la tabla de la bd y el mismo orden esta es la misma que agregar solo tiene de diferencia el id
            $data = [
                'nombre'  => $_POST['nombre'],
                'materno' => $_POST['apmate'],
                'paterno' => $_POST['appat'],
            ];

            $idNombre  = $_POST['idnombre'];
            $crud      = new Crudmodel();
            $respuesta = $crud->actualizar($data, $idNombre);
            //la respuesta de  crud si esta buena es elid entonces si retorna un id obvio sera mayor a cero todo esta ok  este lo dejamos en resupesta o sea si respuesta es true fue bien incluso en el otro tambien se podia pero bueno algo nuevo aprendimos
            if ($respuesta) {
                //con with se crea una session mensaje y se le da el valor 1 esto es para validar que sea 2correcto 3 incorrecto ay puede ser cualquier valor esos numeros son cualquieras es para diferenciarlos en las vistas cuando llega el numero y hacer el comparativo
                return redirect()->to(base_url() . route_to('inicioCrud'))->with('mensaje', '2');
            } else {
                return redirect()->to(base_url() . route_to('inicioCrud'))->with('mensaje', '3');
            }
        } else {
            return redirect()->back()->withInput();
        }
    }

//esta funcion es en si editar como en un crud nomal mandar con el id y ya yo con el id saco los nombres y los muestro esta lo hace en el modelo con obtenerNombre($data); alla se muestran alla los modifico y se va ejecutar la funcion de actualizar de este modelo
    public function obtenerNombre($idNombre)
    {

        session();
        $validaciones = \config\Services::validation();
        print($validaciones->listErrors());

        $data      = ['id_persona' => $idNombre];
        $crud      = new Crudmodel();
        $respuesta = $crud->obtenerNombre($data);
        $datos     = ['datos' => $respuesta];
        return view('crud/actualizar', $datos);

    }

    public function eliminar($idNombre)
    {
        $id = ['id_persona' => $idNombre];

        $crud      = new Crudmodel();
        $respuesta = $crud->eliminar($id);
        if ($respuesta) {
            return redirect()->to(base_url() . route_to('inicioCrud'))->with('mensaje', '4');
        } else {
            return redirect()->to(base_url() . route_to('inicioCrud'))->with('mensaje', '5');
        }

    }

}
