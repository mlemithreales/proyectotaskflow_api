<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@taskflow.test')->first();
        $projects = Project::with('participants')->get();

        // Recorre los proyectos y genera 2 tareas por cada participante
        foreach ($projects as $project) {
            foreach ($project->participants as $participant) {
                Task::factory(2)
                    ->for($project)
                    ->for($participant, 'assignee')
                    ->for($admin, 'creator')
                    ->create();
            }
        }
    }
}
