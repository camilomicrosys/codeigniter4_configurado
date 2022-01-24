<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

//desde aca se crea la validacion de formulario
    public $validar_formulario_ejemplo = [
        'nombre'      => 'required|min_length[3]|max_length[20]',
        'descripcion' => 'required|min_length[15]|max_length[25]',
        'edad'        => 'required|numeric',
        'correo'      => 'required|valid_emails',

    ];
    // aca validamos el formulario de login
    public $validar_formulario_login = [
        'usuario'  => 'required|min_length[3]|max_length[20]',
        'password' => 'required|min_length[5]|max_length[8]',

    ];

    public $validar_formulario_crud = [
        'nombre' => 'required|min_length[5]|max_length[60]|alpha',
        'appat'  => 'required|min_length[5]|max_length[30]|alpha',
        'apmate' => 'required|min_length[5]|max_length[30]|alpha',

    ];

}
