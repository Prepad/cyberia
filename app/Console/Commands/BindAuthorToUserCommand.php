<?php

namespace App\Console\Commands;

use App\Models\Author;
use App\Models\User;
use Illuminate\Console\Command;

class BindAuthorToUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bind:author-user';

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
        $userId = $this->ask('User id');
        $authorId = $this->ask('Author id');

        if (is_null(User::find($userId))) {
            $this->error('User with this id does not exist');
            return self::FAILURE;
        }

        if (is_null(Author::find($authorId))) {
            $this->error('Author with this id does not exist');
            return self::FAILURE;
        }
        $author = Author::find($authorId);
        $author->user()->associate($userId);
        $author->save();

        return Command::SUCCESS;
    }
}
