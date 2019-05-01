<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::resourceVerbs([
    'create' => 'cadastro',
    'edit' => 'editar',
    'update' => 'atualizar',
    'store' => 'salvar',
    'show' => 'visualizar',
]);


//Rotas de autenticação, recuperação de senhas e logout Administrativo
Route::group(['namespace' => 'Auth', 'prefix' => 'admin', 'middleware' => [], 'as' => 'noacl.route.'], function () {

    Route::get('/login', 'AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'AdminLoginController@login')->name('login.submit');

    Route::get('/logout', 'AdminLoginController@logout')->name('login.logout');

    Route::post('/password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('password.email'); //action
    Route::get('/password/reset', 'AdminForgotPasswordController@showLinkRequestForm')->name('password.request'); //view
    Route::post('/password/reset', 'AdminResetPasswordController@reset')->name('password.reset'); //reset da senha nova
    Route::get('/password/reset/{token}', 'AdminResetPasswordController@showResetForm')->name('password.show.reset'); //view do token

});

//Rotas de Cadastro, autenticação, recuperação de senhas e logout Usuários
Route::group(['namespace' => 'Auth', 'middleware' => [], 'as' => 'site.'], function () {

    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login.submit');

    Route::get('/logout', 'LoginController@logout')->name('logout');

    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email'); //action
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request'); //view
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.reset'); //reset da senha nova
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.show.reset'); //view do token

    Route::post('/registro', 'RegisterController@register')->name('registrar.request'); //Cadastro de usuário

});

//Rotas para o painel administrativo
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => [\App\Http\Middleware\MenuMiddleware::class], 'as' => 'admin.'], function () {
    //Dasboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::group(['middleware' => [\App\Http\Middleware\AclMiddleware::class]], function () {
        //Permissões ACL
        Route::get('/permissoes', 'PermissoesController@index')->name('permissoes.index');
        Route::post('/permissoes/atualizar', 'PermissoesController@update')->name('permissoes.update');

        //Usuários Administradores ACL
        Route::prefix('/administradores')->group(function () {
            Route::get('/', 'AdministradoresController@index')->name('administradores.index');

            Route::get('/lexeira', 'AdministradoresController@trashed')->name('administradores.trashed');
            Route::delete('/delete/{id}', 'AdministradoresController@destroy')->name('administradores.destroy');
            Route::get('/{administrador}/restaura', 'AdministradoresController@restore')->name('administradores.restore');
            Route::delete('/{administrador}/forceDelete', 'AdministradoresController@forceDelete')->name('administradores.forceDelete');

            Route::match(['post', 'get'], '/{id}/editar', 'AdministradoresController@edit')->name('administradores.edit');
            Route::match(['post', 'get'], '/cadastro', 'AdministradoresController@create')->name('administradores.create');
        });

        //Grupos
        Route::prefix('/grupos')->group(function () {
            Route::get('/', 'GruposController@index')->name('grupos.index');

            Route::get('/lexeira', 'GruposController@trashed')->name('grupos.trashed');
            Route::delete('/delete/{id}', 'GruposController@destroy')->name('grupos.destroy');
            Route::get('/{grupo}/restaura', 'GruposController@restore')->name('grupos.restore');
            Route::delete('/{grupo}/forceDelete', 'GruposController@forceDelete')->name('grupos.forceDelete');

            Route::match(['post', 'get'], '/{id}/editar', 'GruposController@edit')->name('grupos.edit');
            Route::match(['post', 'get'], '/cadastro', 'GruposController@create')->name('grupos.create');
        });

        //Usuários - Clientes
        Route::prefix('/usuarios')->group(function () {
            Route::get('/', 'UsuariosController@index')->name('usuarios.index');

            Route::get('/lexeira', 'UsuariosController@trashed')->name('usuarios.trashed');
            Route::delete('/delete/{id}', 'UsuariosController@destroy')->name('usuarios.destroy');
            Route::get('/{usuario}/restaura', 'UsuariosController@restore')->name('usuarios.restore');
            Route::delete('/{usuario}/forceDelete', 'UsuariosController@forceDelete')->name('usuarios.forceDelete');

            Route::match(['post', 'get'], '/{id}/editar', 'UsuariosController@edit')->name('usuarios.edit');
            Route::match(['post', 'get'], '/cadastro', 'UsuariosController@create')->name('usuarios.create');

            Route::get('/perfil/{id}', 'UsuariosController@perfil')->name('usuarios.perfil');
        });

        //Tenancy server
        Route::prefix('/tenancy')->group(function () {
            Route::get('/', 'TenancyController@index')->name('tenancy.index');

            Route::get('/lexeira', 'TenancyController@trashed')->name('tenancy.trashed');
            Route::delete('/delete/{id}', 'TenancyController@destroy')->name('tenancy.destroy');
            Route::get('/{tenancy}/restaura', 'TenancyController@restore')->name('tenancy.restore');
            Route::delete('/{tenancy}/forceDelete', 'TenancyController@forceDelete')->name('tenancy.forceDelete');

            Route::match(['post', 'get'], '/{id}/editar', 'TenancyController@edit')->name('tenancy.edit');
            Route::match(['post', 'get'], '/cadastro', 'TenancyController@create')->name('tenancy.create');
        });

        //Visitas
        Route::prefix('/visitas')->group(function () {
            Route::get('/', 'VisitasController@index')->name('visitas.index');
            Route::get('/{id}/editar', 'VisitasController@edit')->name('visitas.edit');
            Route::get('/cadastro', 'VisitasController@create')->name('visitas.create');
            Route::get('/lixeira', 'VisitasController@trashed')->name('visitas.trashed');
            Route::delete('/delete/{id}', 'VisitasController@destroy')->name('visitas.destroy');
            Route::get('/{id}/restaura', 'VisitasController@restore')->name('visitas.restore');
            Route::delete('/{id}/forceDelete', 'VisitasController@forceDelete')->name('visitas.forceDelete');
        });

        //Empresas
        Route::prefix('/empresas')->group(function () {
            Route::get('/', 'EmpresasController@index')->name('empresas.index');
            Route::get('/{id}/editar', 'EmpresasController@edit')->name('empresas.edit');
            Route::get('/cadastro', 'EmpresasController@create')->name('empresas.create');
            Route::get('/lixeira', 'EmpresasController@trashed')->name('empresas.trashed');
            Route::delete('/delete/{id}', 'EmpresasController@destroy')->name('empresas.destroy');
            Route::get('/{id}/restaura', 'EmpresasController@restore')->name('empresas.restore');
            Route::delete('/{id}/forceDelete', 'EmpresasController@forceDelete')->name('empresas.forceDelete');
        });

        //Setores
        Route::prefix('/setores')->group(function () {
            Route::get('/', 'SetoresController@index')->name('setores.index');
            Route::get('/{id}/editar', 'SetoresController@edit')->name('setores.edit');
            Route::get('/cadastro', 'SetoresController@create')->name('setores.create');
            Route::get('/lixeira', 'SetoresController@trashed')->name('setores.trashed');
            Route::delete('/delete/{id}', 'SetoresController@destroy')->name('setores.destroy');
            Route::get('/{id}/restaura', 'SetoresController@restore')->name('setores.restore');
            Route::delete('/{id}/forceDelete', 'SetoresController@forceDelete')->name('setores.forceDelete');
        });
    });
});


//Rotas para o site
Route::group(['namespace' => 'Front', 'middleware' => [], 'as' => 'site.'], function () {

    // Base do site
    Route::get('/', 'SiteController@index')->name('index');

});
