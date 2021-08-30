<?php

namespace App\View\Components\features;

use Illuminate\View\Component;
use App\Models\Template;

class Card extends Component
{
    public $template;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Template $template)
    {
        $this->template=$template;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.templates.card');
    }
}
