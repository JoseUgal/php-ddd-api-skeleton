<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Users\Infrastructure;

use JoseUgal\Mooc\Users\Domain\User;
use JoseUgal\Mooc\Users\Domain\UserId;
use JoseUgal\Mooc\Users\Domain\UserRepository;

final class FileUserRepository implements UserRepository
{

    const FILE_PATH = __DIR__ . '/users';

    public function save(User $user): void
    {
        file_put_contents($this->fileName($user->id()->value()), serialize($user));
    }

    public function search(UserId $userId): ?User
    {
        return file_exists($this->fileName($userId->value()))
            ? unserialize(file_get_contents($this->fileName($userId->value())))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}