<?php

namespace App\View\Components;

use App\Models\Post;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Post $post,
        public User $author,
        public ?bool $clickable = false,
        public ?bool $editable = false,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.post-card');
    }
}
