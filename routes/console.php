<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('admin:create {email?} {--name=} {--password=}', function () {
    $email = $this->argument('email') ?? $this->ask('Adresse email de l\'administrateur');
    $user = \App\Models\User::where('email', $email)->first();

    if ($user) {
        $user->is_admin = true;
        if ($this->option('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($this->option('password'));
        }
        $user->save();
        $this->info("L'utilisateur existant {$email} a été promu administrateur avec succès.");
        return 0;
    }

    $name = $this->option('name') ?? $this->ask('Nom complet', 'Administrateur OneLove');
    $password = $this->option('password') ?? $this->secret('Mot de passe administrateur');

    if (empty($password)) {
        $this->error('Le mot de passe ne peut pas être vide.');
        return 1;
    }

    $newUser = new \App\Models\User();
    $newUser->name = $name;
    $newUser->email = $email;
    $newUser->password = \Illuminate\Support\Facades\Hash::make($password);
    $newUser->is_admin = true;
    $newUser->save();

    $this->info("Nouveau compte administrateur {$email} créé avec succès !");
    return 0;
})->purpose('Créer ou promouvoir un compte administrateur sécurisé');
