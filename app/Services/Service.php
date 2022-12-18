<?php

namespace App\Services;

use App\Contracts\Models;

class Service
{
    /**
     * @var userInterface
     */
    protected $userInterface;

    /**
     * @var roleInterface
     */
    protected $roleInterface;

    /**
     * @var menuInterface
     */
    protected $menuInterface;

    /**
     * @var pageInterface
     */
    protected $pageInterface;

    /**
     * @var auditInterface
     */
    protected $auditInterface;

    /**
     * @var gradeInterface
     */
    protected $gradeInterface;

    /**
     * @var votingInterface
     */
    protected $votingInterface;

    /**
     * @var languageInterface
     */
    protected $languageInterface;

    /**
     * @var candidateInterface
     */
    protected $candidateInterface;

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
     * @param  \App\Contracts\Models\UserInterface  $userInterface
     * @param  \App\Contracts\Models\RoleInterface  $roleInterface
     * @param  \App\Contracts\Models\MenuInterface  $menuInterface
     * @param  \App\Contracts\Models\PageInterface  $pageInterface
     * @param  \App\Contracts\Models\AuditInterface  $auditInterface
     * @param  \App\Contracts\Models\GradeInterface  $gradeInterface
     * @param  \App\Contracts\Models\VotingInterface  $votingInterface
     * @param  \App\Contracts\Models\LanguageInterface  $languageInterface
     * @param  \App\Contracts\Models\CandidateInterface  $candidateInterface
     * @param  \App\Contracts\Models\PermissionInterface  $permissionInterface
     * @param  \App\Contracts\Models\ApplicationInterface  $applicationInterface
     */
    public function __construct(
        Models\UserInterface $userInterface,
        Models\RoleInterface $roleInterface,
        Models\MenuInterface $menuInterface,
        Models\PageInterface $pageInterface,
        Models\AuditInterface $auditInterface,
        Models\GradeInterface $gradeInterface,
        Models\VotingInterface $votingInterface,
        Models\LanguageInterface $languageInterface,
        Models\CandidateInterface $candidateInterface,
        Models\PermissionInterface $permissionInterface,
        Models\ApplicationInterface $applicationInterface
    )
    {
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
        $this->menuInterface = $menuInterface;
        $this->pageInterface = $pageInterface;
        $this->auditInterface = $auditInterface;
        $this->gradeInterface = $gradeInterface;
        $this->votingInterface = $votingInterface;
        $this->languageInterface = $languageInterface;
        $this->candidateInterface = $candidateInterface;
        $this->permissionInterface = $permissionInterface;
        $this->applicationInterface = $applicationInterface;
    }
}
