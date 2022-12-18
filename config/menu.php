<?php

return [
    'admin' => [
         [
           'name' => 'main',
           'label' => 'sidebar.admin.menu.main',
           'ordering' => 1,
           'role' => 'admin|superadmin'
         ],
         [
           'name' => 'admin',
           'label' => 'sidebar.admin.menu.admin',
           'ordering' => 2,
           'role' => 'superadmin'
         ],
         [
           'name' => 'system',
           'label' => 'sidebar.admin.menu.system',
           'ordering' => 3,
           'role' => 'superadmin'
         ],
         [
           'name' => 'audit',
           'label' => 'sidebar.admin.menu.audit',
           'ordering' => 4,
           'role' => 'superadmin'
         ]
    ]
];