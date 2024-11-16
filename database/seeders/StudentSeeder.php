<?php

namespace Database\Seeders;

use App\Models\Student;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica se o usuário existe, caso contrário, cria um
        $user = User::firstOrCreate([
            'name' => 'Nailton M. Araújo',
            'email' => 'nailtonmauricio@hotmail.com',
            'password' => Hash::make('nailton@hotmail', ['rounds' => 12])
        ]);

        // Verifica se o estudante já existe e, se não, cria um
        if (!Student::where('user_id', $user->id)->exists()) {
            Student::create([
                'user_id' => $user->id,
                'name' => 'Nailton M. Araújo',
                'document' => '05882701481',
                'contact' => '83993348144',
                'registration' => '20240935823',
            ]);
        }

        /*Student::factory(10)->create();*/
    }
}
