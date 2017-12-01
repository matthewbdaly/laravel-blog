<?php

namespace LaravelBlog\Console\Commands;

use Illuminate\Console\Command;
use Mni\FrontYAML\Parser;
use Storage;
use LaravelBlog\Post;
use LaravelBlog\User;
use Carbon\Carbon;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import posts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Parser $parser)
    {
        parent::__construct();
        $this->parser = $parser;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::first();
        $files = Storage::files('import');
        foreach ($files as $file) {
            $document = $this->parser->parse(Storage::get($file));
            $content = $document->getContent();
            $yaml = $document->getYAML();
            if (!array_key_exists('slug', $yaml)) {
                $yaml['slug'] = explode(".", explode("/", $file)[1])[0];
            }
            Post::create([
                'text'=> $content,
                'title' => $yaml['title'],
                'slug' => $yaml['slug'],
                'pub_date' => Carbon::parse($yaml['date']),
                'author_id' => $user->id,
            ]);
        }
    }
}
