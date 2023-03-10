<?php

namespace Core\SeedWork\Domain\Validators;

use Core\SeedWork\Domain\Entity\Entity;

interface ValidatorInterface
{
    public function validate(Entity $entity): void;
}
