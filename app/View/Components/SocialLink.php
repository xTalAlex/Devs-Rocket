<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SocialLink extends Component
{
    public $name;
    public $color;
    public $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($social)
    {
        $this->name=strtolower($social->description);
        $this->link=$social->pivot->link;
        switch(strtolower($social->description)){
            case 'Facebook':
                $this->color='bg-blue-600';
                break;
            case 'Instagram':
                $this->color='bg-gray-800';
                break;
            case 'Twitter':
                $this->color='bg-blue-400';
                break;
            case 'Github':
                $this->color='bg-gray-600';
                break;
            case 'Discord':
                $this->color='bg-purple-900';
                break;
            case 'Youtube':
                $this->color='bg-red-600';
                break;
            case 'Skype':
                $this->color='bg-blue-500';
                break;  
        }
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.social-link');
    }
}
