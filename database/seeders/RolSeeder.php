<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = Role::create(['name' => 'Administrador']);
        $gestor = Role::create(['name' => 'Gestor de Contenido']);

        //Permisos de Administrador y Gestor de Contenido
        Permission::create(['name' => 'admin.index',
                                    'descripcion' => 'Ver Inicio del Panel de Administración',])->syncRoles([$administrador, $gestor]);

        Permission::create(['name' => 'admin.administradores.index',
                                    'descripcion' => 'Ver Tabla de Administradores',])->assignRole($administrador);
        Permission::create(['name' => 'admin.administradores.create',
                                    'descripcion' => 'Crear un Nuevo Administrador',])->assignRole($administrador);
        Permission::create(['name' => 'admin.administradores.edit',
                                    'descripcion' => 'Editar un Administrador',])->assignRole($administrador);
        Permission::create(['name' => 'admin.administradores.show',
                                    'descripcion' => 'Ver Datos de un Administrador',])->assignRole($administrador);
        Permission::create(['name' => 'admin.administradores.destroy',
                                    'descripcion' => 'Eliminar un Administrador'])->assignRole($administrador);

        Permission::create(['name' => 'admin.roles.index',
                                    'descripcion' => 'Ver Tabla de Rol',])->assignRole($administrador);
        Permission::create(['name' => 'admin.roles.create',
                                    'descripcion' => 'Crear un Nuevo Rol',])->assignRole($administrador);
        Permission::create(['name' => 'admin.roles.edit',
                                    'descripcion' => 'Editar un Rol',])->assignRole($administrador);
        Permission::create(['name' => 'admin.roles.show',
                                    'descripcion' => 'Ver Datos de un Rol',])->assignRole($administrador);
        Permission::create(['name' => 'admin.roles.destroy',
                                    'descripcion' => 'Eliminar un Rol'])->assignRole($administrador);                                    

        Permission::create(['name' => 'admin.deportes.index',
                                    'descripcion' => 'Ver Tabla de Deportes',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.deportes.create',
                                    'descripcion' => 'Crear un Nuevo Deporte',])->assignRole($administrador);
        Permission::create(['name' => 'admin.deportes.edit',
                                    'descripcion' => 'Editar un Deporte',])->assignRole($administrador);
        Permission::create(['name' => 'admin.deportes.show',
                                    'descripcion' => 'Ver Datos de un Deporte',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.deportes.destroy',
                                    'descripcion' => 'Eliminar un Deporte',])->assignRole($administrador);

        Permission::create(['name' => 'admin.campeonatos.index',
                                    'descripcion' => 'Ver Tabla de Campeonatos',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.campeonatos.create',
                                    'descripcion' => 'Crear un Nuevo Campeonato',])->assignRole($administrador);
        Permission::create(['name' => 'admin.campeonatos.edit',
                                    'descripcion' => 'Editar un Campeonato',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.campeonatos.show',
                                    'descripcion' => 'Ver Datos de un Campeonato',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.campeonatos.destroy',
                                    'descripcion' => 'Eliminar un Campeonato',])->assignRole($administrador);

        Permission::create(['name' => 'admin.videos.index',
                                    'descripcion' => 'Ver Tabla de Videos',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.videos.create',
                                    'descripcion' => 'Crear un Nuevo Video',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.videos.edit',
                                    'descripcion' => 'Editar un Video',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.videos.show',
                                    'descripcion' => 'Ver Datos de un Video',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.videos.destroy',
                                    'descripcion' => 'Eliminar un Video',])->assignRole($administrador);

        Permission::create(['name' => 'admin.publicidades.index',
                                    'descripcion' => 'Ver Tabla de Publicidades',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.publicidades.create',
                                    'descripcion' => 'Crear una Nueva Publicidad',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.publicidades.edit',
                                    'descripcion' => 'Editar una Publicidad',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.publicidades.show',
                                    'descripcion' => 'Ver Datos de una Publicidad',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.publicidades.destroy',
                                    'descripcion' => 'Eliminar una Publicidad',])->assignRole($administrador);

        Permission::create(['name' => 'admin.clientes.index',
                                    'descripcion' => 'Ver Tabla de Clientes',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.clientes.show',
                                    'descripcion' => 'Ver Datos de un Cliente',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.clientes.subscribeVideo',
                                    'descripcion' => 'Regalar una suscripción a un Cliente',])->syncRoles([$administrador, $gestor]);
        Permission::create(['name' => 'admin.clientes.unsubscribeVideo',
                                    'descripcion' => 'Quitar una suscripción regalada a un Cliente',])->syncRoles([$administrador, $gestor]);

        Permission::create(['name' => 'admin.reporte.pagos.totales',
                                    'descripcion' => 'Ver Reporte de Pagos Totales',])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.reporte.pagos.eventos',
                                    'descripcion' => 'Ver Reposte de Pagos por Evento',])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.suscripciones',
                                    'descripcion' => 'Ver Reporte de Suscripciones',])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.suscripciones.eventos',
                                    'descripcion' => 'Ver Reporte de Suscriptiones por Evento',])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.suscripciones.campeonatos',    
                                    'descripcion' => 'Ver Reporte de Suscripciones por Campeonato',])->syncRoles([$administrador]);


        Permission::create(['name' => 'admin.company.index',    
                                    'descripcion' => 'Visualizar la Información de la Empresa',])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.company.update',    
                                    'descripcion' => 'Actualizar la Información de la Empresa',])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.services.index',    
                                    'descripcion' => 'Visualizar la Información de los Servicios',])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.services.update',    
                                    'descripcion' => 'Actualizar la Información de los Servicios',])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.services.create',    
                                    'descripcion' => 'Agregar un Nuevo Servicio ',])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.comments.index',    
                                    'descripcion' => 'Visualizar la Lista de Comentarios',])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.comments.destroy',    
                                    'descripcion' => 'Eliminar Comentarios de los Videos',])->syncRoles([$administrador]);
                                                             
    }
}
