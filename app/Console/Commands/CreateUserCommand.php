<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Name');
        $email = $this->ask('Email');
        $validator = Validator::make(['email' => $email], [
            'email' => 'email'
        ]);
        if ($validator->fails()) {
            $this->error('Incorrect email');
            return self::FAILURE;
        }
        if (User::where('email', '=', $email)->count() > 0) {
            $this->error('Email already exists');
            return self::FAILURE;
        }
        $password = $this->secret('Password');
        $repeatPassword = $this->secret('Password again');
        if ($password !== $repeatPassword) {
            $this->error('Password mismatch');
            return self::FAILURE;
        }
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->email_verified_at = Carbon::now();
        $user->save();

        $this->line('User created, id:' . $user->id);

        return Command::SUCCESS;
    }
}
