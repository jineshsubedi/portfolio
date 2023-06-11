<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public $menu = [];

    public function __construct()
    {
        $this->menu = [
            [
                'url' => route('admin.dashboard'),
                'label' => 'Dashboard',
                'icon' => 'fas fa-th',
                'path' => [],
                'links' => request()->is('admin/dashboard'),
                'childrens' => []
            ],
            [
                'url' => "#",
                'label' => 'Configuration',
                'icon' => 'fas fa-tachometer-alt',
                'path' => ['setting', 'profile'],
                'links' => false,
                'childrens' => [
                    [
                        'url' => route('admin.setting.index'),
                        'label' => 'Setting',
                        'icon' => 'far fa-circle',
                        'path' => [],
                        'links' => request()->is('admin/setting*')
                    ],
                    [
                        'url' => route('admin.profile.edit'),
                        'label' => 'Profile',
                        'icon' => 'far fa-circle',
                        'path' => [],
                        'links' => request()->is('admin/profile*')
                    ],
                ]
            ],
            [
                'url' => "#",
                'label' => 'PMS',
                'icon' => 'fas fa-tachometer-alt',
                'path' => ['portfolio'],
                'links' => false,
                'childrens' => [
                    [
                        'url' => route('admin.portfolio.index'),
                        'label' => 'Home',
                        'icon' => 'far fa-circle',
                        'path' => [],
                        'links' => request()->is('admin/portfolio*')
                    ],
                ]
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-menu');
    }
}
