<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Users\Domain;

interface UserRepository
{
    public function save(User $user): void;
    public function search(UserId $userId): ?User;
}