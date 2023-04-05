<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Operador']);
        $role3 = Role::create(['name'=>'Estadistica']);

        Permission::create(['name'=>'estadisticas'])->syncRoles([$role1,$role3]);

        Permission::create(['name'=>'articulo'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'articulo.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'articulo.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'articulo.update'])->syncRoles([$role1,$role2]);
            
        Permission::create(['name'=>'categorias'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'categorias.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'categorias.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'categorias.update'])->syncRoles([$role1,$role2]);
         
        Permission::create(['name'=>'ubicacion'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ubicacion.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ubicacion.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'ubicacion.update'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'bienes'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'bienes.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'bienes.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'bienes.update'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'traspasos'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'traspasos.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'traspasos.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'traspasos.update'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'espacios'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'espacios.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'espacios.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'espacios.update'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'incidencias'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name'=>'incidencias.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'incidencias.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'incidencias.update'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'solicitante'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'solicitantes.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'solicitante.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'solicitante.update'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'prestamos'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'prestamos.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'prestamos.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'prestamos.update'])->syncRoles([$role1,$role2]);
 
    }
}
