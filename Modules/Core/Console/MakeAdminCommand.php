<?php

namespace Modules\Core\Console;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Enums\UserTypeEnum;

class MakeAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an Admin.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::create([
            'name' => $this->ask('Name'),
            'email' => $this->ask('Email'),
            'password' => Hash::make($this->secret('Password')),
            'type_flag' => UserTypeEnum::ADMIN->value,
            'email_verified_at' => now(),
        ]);

        return static::SUCCESS;
    }
}
