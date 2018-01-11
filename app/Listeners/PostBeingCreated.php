<?php

namespace Matthewbdaly\LaravelBlog\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Matthewbdaly\LaravelBlog\Events\PostBeingCreated as PostBeingCreatedEvent;
use Illuminate\Contracts\Auth\Guard;

class PostBeingCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle the event.
     *
     * @param  PostBeingCreated  $event
     * @return void
     */
    public function handle(PostBeingCreatedEvent $event)
    {
        if (!$event->model->author_id) {
            $event->model->author_id = $this->auth->user()->id;
        }
    }
}
