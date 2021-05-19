<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->cedula   = '20391877';
        $user->name     = 'Admin';
        $user->slug     = 'admin';
        $user->lastname = 'Administrador';
        $user->username = 'laradmin';
        $user->genero   = 'M';
        $user->phone    = '0412-5205105';
        $user->email    = 'admin@mail.com';
        $user->password = 'admin';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Administrador');


        $user = new User;
        $user->cedula   = '20391878';
        $user->name     = 'Usuario';
        $user->slug     = 'usuario';
        $user->username = 'larausuario';
        $user->genero   = 'F';
        $user->phone    = '0412-5205105';
        $user->lastname = 'Usuarios';
        $user->email    = 'usuario@mail.com';
        $user->password = 'admin';
        $user->status   = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('Usuario');
    }
}
