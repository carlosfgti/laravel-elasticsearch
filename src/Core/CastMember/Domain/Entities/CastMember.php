<?php

namespace Core\CastMember\Domain\Entities;

use Core\CastMember\Domain\Enums\CastMemberType;
use Core\SeedWork\Domain\Utils\MethodsMagicsTrait;
use Core\SeedWork\Domain\Validators\DomainValidation;
use Core\SeedWork\Domain\ValueObjects\Uuid;
use DateTime;

class CastMember
{
    use MethodsMagicsTrait;

    public function __construct(
        protected string $name,
        protected CastMemberType $type,
        protected ?Uuid $id = null,
        protected ?DateTime $createdAt = null,
    ) {
        $this->id = $this->id ?? Uuid::random();
        $this->createdAt = $this->createdAt ?? new DateTime();

        $this->validate();
    }

    public function update(string $name)
    {
        $this->name = $name;

        $this->validate();
    }

    protected function validate()
    {
        DomainValidation::strMaxLength($this->name);
        DomainValidation::strMinLength($this->name);
    }
}
