<?php

namespace App\Services;

use App\Contracts\Models;
use App\Traits\UploadFile;

class Service
{
    use UploadFile;

    /**
     * @var userInterface
     */
    protected $userInterface;

    /**
     * @var roleInterface
     */
    protected $roleInterface;

    /**
     * @var auditInterface
     */
    protected $auditInterface;

    /**
     * @var languageInterface
     */
    protected $languageInterface;

    /**
     * @var permissionInterface
     */
    protected $permissionInterface;

    /**
     * @var applicationInterface
     */
    protected $applicationInterface;

    /**
     * Model contract constructor.
     * 
     * @param App\Contracts\Models\UserInterface $userInterface
     * @param App\Contracts\Models\RoleInterface $roleInterface
     * @param App\Contracts\Models\AuditInterface $auditInterface
     * @param App\Contracts\Models\LanguageInterface $languageInterface
     * @param App\Contracts\Models\PermissionInterface $permissionInterface
     * @param App\Contracts\Models\ApplicationInterface $applicationInterface
     */
    public function __construct(
        Models\UserInterface $userInterface,
        Models\RoleInterface $roleInterface,
        Models\AuditInterface $auditInterface,
        Models\LanguageInterface $languageInterface,
        Models\PermissionInterface $permissionInterface,
        Models\ApplicationInterface $applicationInterface
    )
    {
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
        $this->auditInterface = $auditInterface;
        $this->languageInterface = $languageInterface;
        $this->permissionInterface = $permissionInterface;
        $this->applicationInterface = $applicationInterface;
    }
}
