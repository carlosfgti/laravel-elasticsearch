<?php

namespace Core\Video\Domain\Factory;

use Core\Domain\Validation\VideoRakitValidator;
use Core\SeedWork\Domain\Validators\ValidatorInterface;

class VideoValidatorFactory
{
    public static function create(): ValidatorInterface
    {
        // return new VideoLaravelValidator();
        return new VideoRakitValidator();
    }
}
