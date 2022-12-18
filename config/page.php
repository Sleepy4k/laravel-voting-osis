<?php

return [
    'admin' => [
        [
           'name' => 'dashboard',
           'label' => 'sidebar.admin.page.dashboard',
           'menu_id' => 1,
           'route' => 'admin.dashboard.index',
           'icon' => 'bi bi-grid-fill'
        ],
        [
           'name' => 'candidate',
           'label' => 'sidebar.admin.page.candidate',
           'menu_id' => 1,
           'route' => 'admin.candidate.index',
           'icon' => 'bi bi-people-fill'
        ],
        [
           'name' => 'user',
           'label' => 'sidebar.admin.page.user',
           'menu_id' => 1,
           'route' => 'admin.user.index',
           'icon' => 'bi bi-people-fill'
        ],
        [
           'name' => 'role',
           'label' => 'sidebar.admin.page.role',
           'menu_id' => 2,
           'route' => 'admin.role.index',
           'icon' => 'bi bi-grid-fill'
        ],
        [
           'name' => 'permission',
           'label' => 'sidebar.admin.page.permission',
           'menu_id' => 2,
           'route' => 'admin.permission.index',
           'icon' => 'bi bi-grid-fill'
        ],
        [
            'name' => 'menu',
            'label' => 'sidebar.admin.page.menu',
            'menu_id' => 3,
            'route' => 'admin.system.menu.index',
            'icon' => 'bi bi-grid-fill'
        ],
        [
            'name' => 'page',
            'label' => 'sidebar.admin.page.page',
            'menu_id' => 3,
            'route' => 'admin.system.page.index',
            'icon' => 'bi bi-grid-fill'
        ],
        [
            'name' => 'translate',
            'label' => 'sidebar.admin.page.translate',
            'menu_id' => 3,
            'route' => 'admin.system.translate.index',
            'icon' => 'bi bi-grid-fill'
        ],
        [
            'name' => 'application',
            'label' => 'sidebar.admin.page.application',
            'menu_id' => 3,
            'route' => 'admin.system.application.index',
            'icon' => 'bi bi-grid-fill'
        ],
        [
            'name' => 'auth',
            'label' => 'sidebar.admin.page.auth',
            'menu_id' => 4,
            'route' => 'admin.audit.auth.index',
            'icon' => 'bi bi-grid-fill'
        ],
        [
            'name' => 'model',
            'label' => 'sidebar.admin.page.model',
            'menu_id' => 4,
            'route' => 'admin.audit.model.index',
            'icon' => 'bi bi-grid-fill'
        ],
        [
            'name' => 'query',
            'label' => 'sidebar.admin.page.query',
            'menu_id' => 4,
            'route' => 'admin.audit.query.index',
            'icon' => 'bi bi-grid-fill'
        ],
        [
            'name' => 'system',
            'label' => 'sidebar.admin.page.system',
            'menu_id' => 4,
            'route' => 'admin.audit.system.index',
            'icon' => 'bi bi-grid-fill'
        ]
    ]
];