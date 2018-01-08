<?php

namespace LaravelBlog\Console\Commands;

use Illuminate\Console\Command;
use Hash;

class CreateSuperUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a single user';

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
        // Get user model from config
        $model = config('auth.providers.users.model');

        // Let user know what this will do
        $this->info('I\'ll ask you for the details I need to set up the user');

        // Get username
        $name = $this->ask('Please provide the username');

        // Get email
        $email = $this->ask('Please provide the email address');

        // Get password
        $password = $this->secret('Please provide the password');

        // Create model
        $user = new $model;
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
        $this->info('User saved');
    }
}
