<?php

namespace Database\Seeders;

use App\Models\Tipo;
use App\Models\User;
use Illuminate\Database\Seeder;
//spatie
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            //Tipos
            'ver-tipo',
            'crear-tipo',
            'editar-tipo',
            'borrar-tipo',
            //oficinas
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla documentos
            'ver-documento',
            'crear-documento',
            'editar-documento',
            'borrar-documento',
            'enviar-documento',
        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);   
        }
        $usuarioadmin=User::create(['name'=>'admin',
                    'email'=>'admin@gmail.com',
                    'password'=>bcrypt('administrador'),
        ]);
        $rol=Role::create(['name'=>'Administrador']);
        $permisos = Permission::pluck('id','id')->all();
        $rol->syncPermissions($permisos);
        $usuarioadmin->assignRole([$rol->id]);



        $usuariomdpartes=User::create(['name'=>'mesa',
                    'email'=>'mesa@gmail.com',
                    'password'=>bcrypt('12345678'),
        ]);
        $rol=Role::create(['name'=>'Mesa de Partes']);
        $permisos = Permission::pluck('id','id')->all();
        $rol->syncPermissions($permisos);
        $usuariomdpartes->assignRole([$rol->id]);
        

        $usuariomdirec=User::create(['name'=>'director',
                    'email'=>'director@gmail.com',
                    'password'=>bcrypt('director'),
        ]);

        $rol=Role::create(['name'=>'Director']);
        $permisos = Permission::pluck('id','id')->all();
        $rol->syncPermissions($permisos);
        $usuariomdirec->assignRole([$rol->id]);



        Tipo::create(['title'=>'Constancia de Estudios']);
        Tipo::create(['title'=>'Constancia de Matricula']);

    }
}
