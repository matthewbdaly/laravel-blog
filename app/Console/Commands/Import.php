<?php

namespace Matthewbdaly\LaravelBlog\Console\Commands;

use Illuminate\Console\Command;
use Mni\FrontYAML\Parser;
use Storage;
use Matthewbdaly\LaravelBlog\Eloquent\Models\Post;
use Matthewbdaly\LaravelBlog\Eloquent\Models\User;
use Matthewbdaly\LaravelFlatpages\Eloquent\Models\Flatpage;
use Carbon\Carbon;
use DB;

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
        $posts = Storage::files('import/posts');
        foreach ($posts as $post) {
            $document = $this->parser->parse(Storage::get($post));
            $content = $document->getContent();
            $yaml = $document->getYAML();
            $pubDate = Carbon::parse($yaml['date']);
            $urlDate = preg_replace('/(\d{4})-(\d{2})-(\d{2})/', '$1/$2/$3/', $pubDate->toDateString());
            $yaml['slug'] = "/" . $urlDate . preg_replace('/(\d{4})-(\d{2})-(\d{2})-/', '', explode(".", explode("/", $post)[2])[0]) . "/";
            Post::create([
                'text'=> $content,
                'title' => $yaml['title'],
                'slug' => $yaml['slug'],
                'pub_date' => $pubDate,
                'author_id' => $user->id,
            ]);
        }
        $pages = Storage::files('import/pages');
        foreach ($pages as $page) {
            $document = $this->parser->parse(Storage::get($page));
            $content = $document->getContent();
            $yaml = $document->getYAML();
            $yaml['slug'] = "/".explode(".", explode("/", $page)[2])[0]."/";
            Flatpage::create([
                'content'=> $content,
                'title' => $yaml['title'],
                'slug' => $yaml['slug'],
            ]);

        }
    }
}
