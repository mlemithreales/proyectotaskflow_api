<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@taskflow.test')->first();
        $collaborators = User::where('email', '!=', 'admin@taskflow.test')->get();

        // Crea 4 proyectos
        Project::factory(4)
            ->for($admin, 'creator')
            ->create()
            ->each(function (Project $project) use ($collaborators) {
                // Asigna 3 participantes aleatorios a cada proyecto
                $participants = $collaborators->random(3);
                $project->participants()->attach($participants);
            });
    }
}
