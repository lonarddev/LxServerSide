<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function loadWelcome() {
    return view('welcome');
    }

    public function loadHomepage() {

    //dados que no futuro estarão definidos no controller e vêm da base de dados
    $courseName = 'SD';

    //simulo que vou à base de dados e trago a lista de alunos
    $students = ['Licínia', 'Raquel', 'João', 'Leonel'];

     //array associativo
    //dados que serão carregados da base de dados
    $contactInfo = [
        'name' => 'Bruno',
        'contact' => 'Bruno@cesae.pt'
    ];

    $cesaeInfo = ['name'=> 'Cesae',
    'address' => 'Rua do cesae', 'email' =>'cesae@cesae.pt'];

    // dd($contactInfo);
    var_dump($contactInfo);




    return view('home', compact('courseName', 'students', 'contactInfo'));
    }

    // public function loadAddUsers() {
    //     return view('users.addusers');
    // }

    // public function loadAllUsers() {
    //     return view('users.allusers');
    // }

// ======================================================
    //versão da formadora
//         public function allUsers() {
//         return view('users.allusers');
//     }

//         public function addUsers () {
//     return view('users.addusers');
// }
// ======================================================

}
