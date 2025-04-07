<?php
namespace Routes;

class Routes{

    public static function getRoutes(){

        return  [
            '/' => 'HomeController@index',
            '/home' => 'HomeController@index',

            '/cadastrar' => 'UserController@cadastro',
            '/cadastrarAction' => 'UserController@actionCadastro',

            '/login' => 'UserController@index',
            '/loginAction' => 'UserController@actionLogin',

            '/usuarios/delete/{id}' => 'UserController@delete',
            '/usuarios/edit/{id}' => 'UserController@edit',
            '/usuarios/edit' => 'UserController@editarAction',

            '/listar' => 'UserController@listar',

            '/perfil' => 'UserController@perfil',

            '/logout' => 'UserController@logout',

            '/recuperar' => 'UserController@recuperarSenha',
            '/novaSenha' => 'UserController@novaSenha',
            
            '/create' => 'TaskController@create',
            '/list' => 'TaskController@findAll',
            '/list/{id}' => 'TaskController@findBy',
            '/update/{id}' => 'TaskController@update',
            '/delete/{id}' => 'TaskController@delete',
            '/search' => 'TaskController@search',
        ];
    }

}

?>
