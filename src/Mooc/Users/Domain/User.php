<?php

declare(strict_types=1);

namespace JoseUgal\Mooc\Users\Domain;

final class User
{

    private UserId $id;
    private UserFirstName $firstName;
    private UserLastName $lastName;

    public function __construct(UserId $id, UserFirstName $firstName, UserLastName $lastName)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }


    public function id(): UserId
    {
        return $this->id;
    }

    public function firstName(): UserFirstName
    {
        return $this->firstName;
    }

    public function lastName(): UserLastName
    {
        return $this->lastName;
    }


    public function setId(UserId $id): void
    {
        $this->id = $id;
    }
    public function setFirstName(UserFirstName $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(UserLastName $lastName): void
    {
        $this->lastName = $lastName;
    }
}