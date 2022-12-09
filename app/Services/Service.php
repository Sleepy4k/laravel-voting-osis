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
     * @var companyInterface
     */
    protected $companyInterface;

    /**
     * @var concertInterface
     */
    protected $concertInterface;

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
     * @var transactionInterface
     */
    protected $transactionInterface;

    /**
     * Model contract constructor.
     * 
     * @param App\Contracts\Models\UserInterface $userInterface
     * @param App\Contracts\Models\RoleInterface $roleInterface
     * @param App\Contracts\Models\AuditInterface $auditInterface
     * @param App\Contracts\Models\CompanyInterface $companyInterface
     * @param App\Contracts\Models\ConcertInterface $concertInterface
     * @param App\Contracts\Models\LanguageInterface $languageInterface
     * @param App\Contracts\Models\PermissionInterface $permissionInterface
     * @param App\Contracts\Models\ApplicationInterface $applicationInterface
     * @param App\Contracts\Models\TransactionInterface $transactionInterface
     */
    public function __construct(
        Models\UserInterface $userInterface,
        Models\RoleInterface $roleInterface,
        Models\AuditInterface $auditInterface,
        Models\CompanyInterface $companyInterface,
        Models\ConcertInterface $concertInterface,
        Models\LanguageInterface $languageInterface,
        Models\PermissionInterface $permissionInterface,
        Models\ApplicationInterface $applicationInterface,
        Models\TransactionInterface $transactionInterface,
    )
    {
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
        $this->auditInterface = $auditInterface;
        $this->companyInterface = $companyInterface;
        $this->concertInterface = $concertInterface;
        $this->languageInterface = $languageInterface;
        $this->permissionInterface = $permissionInterface;
        $this->applicationInterface = $applicationInterface;
        $this->transactionInterface = $transactionInterface;
    }
}
