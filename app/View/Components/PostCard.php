<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $authorName,
        public string $authorUsername,
        public string $postUUID,
        public string $postContent,
        public int $postViews,
        public string $postCreatedAt,
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
