<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);

        // Maestros
        DB::table('maestros')->insert([
            [
                'matricula' => '21850021',
                'nombre_completo' => 'Juan Alfonzo',
                'apellido_paterno' => 'Conrrado',
                'apellido_materno' => 'Jimenez',
                'departamento' => 'Comunicación y difusión',
                'email' => '21850021@ittizimin.edu.mx',
                'password' => Hash::make('12345'),
                'rol' => 1,
                'telefono' => '5551234567',
                'rfc' => 'PELJ800101HDF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'matricula' => '21850022',
                'nombre_completo' => 'Ana Laura',
                'apellido_paterno' => 'Gómez',
                'apellido_materno' => 'Ruiz',
                'departamento' => 'Economico Administrativo',
                'email' => '21850022@ittizimin.edu.mx',
                'password' => Hash::make('123456'),
                'rol' => 1,
                'telefono' => '5559876543',
                'rfc' => 'GORL850202HDF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'matricula' => '21850023',
                'nombre_completo' => 'Iván Alexander',
                'apellido_paterno' => 'Torres',
                'apellido_materno' => 'Miravette',
                'departamento' => 'Ciencias Básicas',
                'email' => '21850023@ittizimin.edu.mx',
                'password' => Hash::make('nikea'),
                'rol' => 0,
                'telefono' => null,
                'rfc' => 'HETC900303HDF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Periodos
        DB::table('periodos')->insert([
            [
                'nombre_periodo' => 'Enero - Abril',
                'fecha_inicio' => '2025-01-01',
                'fecha_fin' => '2025-04-30',
                'estatus' => 'activo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_periodo' => 'Mayo - Agosto',
                'fecha_inicio' => '2025-05-01',
                'fecha_fin' => '2025-08-31',
                'estatus' => 'activo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_periodo' => 'Septiembre - Diciembre 2025',
                'fecha_inicio' => '2025-09-01',
                'fecha_fin' => '2025-12-15',
                'estatus' => 'inactivo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

         // Cedulas
         DB::table('cedulas')->insert([
            [
                'fecha' => '2025-05-01',
                'apellido_paterno' => 'López',
                'apellido_materno' => 'Martínez',
                'nombre' => 'Ana',
                'rfc' => 'LOMA900101ABC',
                'telefono' => '5551112222',
                'email' => 'ana.lopez@correo.com',
                'estudios' => json_encode(['Licenciatura']),
                'carrera_nombre' => 'Ingeniería de Software',
                'tipo_puesto' => 'Docente',
                'unidad_responsable' => 'UR-01',
                'area' => 'TI',
                'puesto_actual' => 'Profesor',
                'nombre_jefe' => 'Dr. Jorge Méndez',
                'domicilio_oficial' => 'Calle 1 #100',
                'telefono_oficial' => '5558887766',
                'extension' => '123',
                'horario' => '8:00 - 15:00',
                'nombre_evento' => 'Curso Laravel',
                'nombre_instructor' => 'Ing. María Torres',
                'fecha_realizacion' => '2025-05-10',
                'horario_evento' => '9:00 - 13:00',
                'sede' => 'Centro Cívico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-05-02',
                'apellido_paterno' => 'Gómez',
                'apellido_materno' => 'Salinas',
                'nombre' => 'Pedro',
                'rfc' => 'GOSP880202DEF',
                'telefono' => '5552223333',
                'email' => 'pedro.gomez@correo.com',
                'estudios' => json_encode(['Maestría']),
                'carrera_nombre' => 'Sistemas Computacionales',
                'tipo_puesto' => 'Administrativo',
                'unidad_responsable' => 'UR-02',
                'area' => 'Recursos Humanos',
                'puesto_actual' => 'Jefe de Departamento',
                'nombre_jefe' => 'Lic. Sandra Pérez',
                'domicilio_oficial' => 'Calle 2 #200',
                'telefono_oficial' => '5559991122',
                'extension' => null,
                'horario' => '9:00 - 17:00',
                'nombre_evento' => 'Curso Seguridad Informática',
                'nombre_instructor' => 'Lic. Iván Díaz',
                'fecha_realizacion' => '2025-05-15',
                'horario_evento' => '10:00 - 14:00',
                'sede' => 'Auditorio A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2025-05-03',
                'apellido_paterno' => 'Ramírez',
                'apellido_materno' => 'Mendoza',
                'nombre' => 'Lucía',
                'rfc' => 'RAML910303GHI',
                'telefono' => '5553334444',
                'email' => 'lucia.ramirez@correo.com',
                'estudios' => null,
                'carrera_nombre' => null,
                'tipo_puesto' => 'Técnico',
                'unidad_responsable' => 'UR-03',
                'area' => 'Soporte Técnico',
                'puesto_actual' => null,
                'nombre_jefe' => 'Ing. Raúl Solís',
                'domicilio_oficial' => 'Calle 3 #300',
                'telefono_oficial' => '5557778899',
                'extension' => '456',
                'horario' => '7:00 - 15:00',
                'nombre_evento' => 'Curso Redes',
                'nombre_instructor' => 'Ing. Paula Vega',
                'fecha_realizacion' => '2025-05-20',
                'horario_evento' => '8:00 - 12:00',
                'sede' => 'Laboratorio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Datos Laborales
        DB::table('datos_laborales')->insert([
            [
                'unidad_responsable' => 'UR-01',
                'area' => 'TI',
                'tipo_puesto' => 'Docente',
                'nombre_jefe' => 'Dr. Jorge Méndez',
                'domicilio_oficial' => 'Calle 1 #100',
                'telefono_oficial' => '5558887766',
                'extension' => '123',
                'horario' => '8:00 - 15:00',
                'maestro_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unidad_responsable' => 'UR-02',
                'area' => 'Recursos Humanos',
                'tipo_puesto' => 'Administrativo',
                'nombre_jefe' => 'Lic. Sandra Pérez',
                'domicilio_oficial' => 'Calle 2 #200',
                'telefono_oficial' => '5559991122',
                'extension' => null,
                'horario' => '9:00 - 17:00',
                'maestro_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unidad_responsable' => 'UR-03',
                'area' => 'Soporte Técnico',
                'tipo_puesto' => 'Técnico',
                'nombre_jefe' => 'Ing. Raúl Solís',
                'domicilio_oficial' => 'Calle 3 #300',
                'telefono_oficial' => '5557778899',
                'extension' => '456',
                'horario' => '7:00 - 15:00',
                'maestro_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Cursos
        DB::table('cursos')->insert([
            [
                'nombre_curso' => 'Laravel Básico',
                'tipo' => 'profesional',
                'descripcion' => 'Curso introductorio a Laravel para desarrolladores.',
                'duracion' => 20,
                'fecha_inicio' => '2025-05-10',
                'fecha_fin' => '2025-05-15',
                'maestro_id' => 1,
                'cedula_id' => 1,
                'periodo_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_curso' => 'Didáctica Docente',
                'tipo' => 'docente',
                'descripcion' => 'Metodologías para mejorar la enseñanza.',
                'duracion' => 15,
                'fecha_inicio' => '2025-06-01',
                'fecha_fin' => '2025-06-05',
                'maestro_id' => 2,
                'cedula_id' => 2,
                'periodo_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_curso' => 'Ciberseguridad',
                'tipo' => 'profesional',
                'descripcion' => 'Principios básicos de seguridad en sistemas.',
                'duracion' => 10,
                'fecha_inicio' => '2025-07-01',
                'fecha_fin' => '2025-07-03',
                'maestro_id' => 3,
                'cedula_id' => 3,
                'periodo_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Curso-Maestro
        DB::table('curso_maestro')->insert([
            ['curso_id' => 1, 'maestro_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['curso_id' => 2, 'maestro_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['curso_id' => 3, 'maestro_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
