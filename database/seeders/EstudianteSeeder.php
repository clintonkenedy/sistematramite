<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Estudiante;
use App\Models\Seguimiento;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i=0;$i<20;$i++){
            $codigo2 = now()->format('dmY');
            $document = Document::factory()->create();
            // $document = Document::create([
            //     'tipo_id'=> 2,
            //     'codigo_tramite'=> $codigo2,
            //     'titulo'=> $this->faker->word(),
            //     'contenido'=> $this->faker->sentence(),
            // ]);
            $document->codigo_tramite = $document->id.$codigo2;
            $document->save();

            $estudiante = Estudiante::factory()->create([
                'document_id' => $document->id,
            ]);
    
            // $estudiante = Estudiante::create([
            //     'document_id'=> $document->id,
            //     'nombre'=> $codigo2,
            //     'apellido_paterno'=> 'ga1',
            //     'apellido_materno'=> 'ga2',
            //     'nombre'=> 'gacita',
            //     'dni'=> '12345678',
            //     'direccion'=> 'jr matare buscando',
            //     'celular'=> '123456789',
            //     'correo'=> 'gacita@gmail.com',
            // ]);
    
            $seguimiento = Seguimiento::create([
                'document_id'=> $document->id,
                'oficina'=> Role::find(2)->name,
                'oficina_derivada'=> Role::find(2)->name,
            ]);
        }
        

    }
}
