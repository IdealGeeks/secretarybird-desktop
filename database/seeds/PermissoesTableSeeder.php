<?php

use Illuminate\Database\Seeder;

class PermissoesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissoes')->delete();
        
        \DB::table('permissoes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'label' => 'Cadastros',
                'controller' => 'Permissoes',
                'rota' => NULL,
                'permissao_id' => NULL,
                'icone' => 'mdi mdi-account-group',
                'visivel_menu' => 1,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-01-15 22:02:24',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            3 => 
            array (
                'id' => 4,
                'label' => 'Permissões',
                'controller' => 'Dashboard',
                'rota' => NULL,
                'permissao_id' => NULL,
                'icone' => 'mdi mdi-key-change',
                'visivel_menu' => 1,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            1 =>
                array (
                    'id' => 2,
                    'label' => 'Lista de permissões',
                    'controller' => NULL,
                    'rota' => 'admin.permissoes.index',
                    'permissao_id' => 4,
                    'icone' => NULL,
                    'visivel_menu' => 1,
                    'visivel_user' => 1,
                    'mobile' => 1,
                    'created_at' => '2019-01-15 22:02:24',
                    'updated_at' => '2019-03-25 17:26:18',
                ),
            4 => 
            array (
                'id' => 5,
                'label' => 'Dashboard',
                'controller' => NULL,
                'rota' => 'admin.dashboard',
                'permissao_id' => 4,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 0,
                'mobile' => 0,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            5 => 
            array (
                'id' => 6,
                'label' => 'Permissões para Administradores',
                'controller' => 'Administradores',
                'rota' => NULL,
                'permissao_id' => NULL,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            2 =>
                array (
                    'id' => 3,
                    'label' => 'Atualizar permissões',
                    'controller' => NULL,
                    'rota' => 'admin.permissoes.update',
                    'permissao_id' => 6,
                    'icone' => NULL,
                    'visivel_menu' => 0,
                    'visivel_user' => 1,
                    'mobile' => 1,
                    'created_at' => '2019-01-15 22:02:24',
                    'updated_at' => '2019-03-25 17:26:18',
                ),
            6 => 
            array (
                'id' => 7,
                'label' => 'Administradores',
                'controller' => NULL,
                'rota' => 'admin.administradores.index',
                'permissao_id' => 1,
                'icone' => NULL,
                'visivel_menu' => 1,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            7 => 
            array (
                'id' => 8,
                'label' => 'Lixeira',
                'controller' => NULL,
                'rota' => 'admin.administradores.trashed',
                'permissao_id' => 6,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            8 => 
            array (
                'id' => 9,
                'label' => 'Deletar',
                'controller' => NULL,
                'rota' => 'admin.administradores.destroy',
                'permissao_id' => 6,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            9 => 
            array (
                'id' => 10,
                'label' => 'Restaurar da lixeira',
                'controller' => NULL,
                'rota' => 'admin.administradores.restore',
                'permissao_id' => 6,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            10 => 
            array (
                'id' => 11,
                'label' => 'Deletar da lixeira',
                'controller' => NULL,
                'rota' => 'admin.administradores.forceDelete',
                'permissao_id' => 6,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            11 => 
            array (
                'id' => 12,
                'label' => 'Editar',
                'controller' => NULL,
                'rota' => 'admin.administradores.edit',
                'permissao_id' => 6,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            12 => 
            array (
                'id' => 13,
                'label' => 'Cadastrar',
                'controller' => NULL,
                'rota' => 'admin.administradores.create',
                'permissao_id' => 6,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            13 => 
            array (
                'id' => 14,
                'label' => 'Permissões para Grupos',
                'controller' => 'Grupos',
                'rota' => NULL,
                'permissao_id' => NULL,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            14 => 
            array (
                'id' => 15,
                'label' => 'Grupos',
                'controller' => NULL,
                'rota' => 'admin.grupos.index',
                'permissao_id' => 1,
                'icone' => NULL,
                'visivel_menu' => 1,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            15 => 
            array (
                'id' => 16,
                'label' => 'Lixeira',
                'controller' => NULL,
                'rota' => 'admin.grupos.trashed',
                'permissao_id' => 14,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            16 => 
            array (
                'id' => 17,
                'label' => 'Deletar',
                'controller' => NULL,
                'rota' => 'admin.grupos.destroy',
                'permissao_id' => 14,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            17 => 
            array (
                'id' => 18,
                'label' => 'Restaurar da lixeira',
                'controller' => NULL,
                'rota' => 'admin.grupos.restore',
                'permissao_id' => 14,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            18 => 
            array (
                'id' => 19,
                'label' => 'Deletar da lixeira',
                'controller' => NULL,
                'rota' => 'admin.grupos.forceDelete',
                'permissao_id' => 14,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            19 => 
            array (
                'id' => 20,
                'label' => 'Editar',
                'controller' => NULL,
                'rota' => 'admin.grupos.edit',
                'permissao_id' => 14,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            20 => 
            array (
                'id' => 21,
                'label' => 'Cadastrar',
                'controller' => NULL,
                'rota' => 'admin.grupos.create',
                'permissao_id' => 14,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            21 => 
            array (
                'id' => 22,
                'label' => 'Permissões para Usuários',
                'controller' => 'Usuarios',
                'rota' => NULL,
                'permissao_id' => NULL,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            22 => 
            array (
                'id' => 23,
                'label' => 'Usuários',
                'controller' => NULL,
                'rota' => 'admin.usuarios.index',
                'permissao_id' => 1,
                'icone' => NULL,
                'visivel_menu' => 1,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            23 => 
            array (
                'id' => 24,
                'label' => 'Lixeira',
                'controller' => NULL,
                'rota' => 'admin.usuarios.trashed',
                'permissao_id' => 22,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            24 => 
            array (
                'id' => 25,
                'label' => 'Deletar',
                'controller' => NULL,
                'rota' => 'admin.usuarios.destroy',
                'permissao_id' => 22,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            25 => 
            array (
                'id' => 26,
                'label' => 'Restaurar da lixeira',
                'controller' => NULL,
                'rota' => 'admin.usuarios.restore',
                'permissao_id' => 22,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            26 => 
            array (
                'id' => 27,
                'label' => 'Deletar da lixeira',
                'controller' => NULL,
                'rota' => 'admin.usuarios.forceDelete',
                'permissao_id' => 22,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            27 => 
            array (
                'id' => 28,
                'label' => 'Editar',
                'controller' => NULL,
                'rota' => 'admin.usuarios.edit',
                'permissao_id' => 22,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
            28 => 
            array (
                'id' => 29,
                'label' => 'Cadastrar',
                'controller' => NULL,
                'rota' => 'admin.usuarios.create',
                'permissao_id' => 22,
                'icone' => NULL,
                'visivel_menu' => 0,
                'visivel_user' => 1,
                'mobile' => 1,
                'created_at' => '2019-03-22 20:10:23',
                'updated_at' => '2019-03-25 17:26:18',
            ),
        ));
    }
}