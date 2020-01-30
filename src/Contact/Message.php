<?php

namespace App\Contact;

use Symfony\Component\Validator\Constraints as Assert;

class Message
{

    /**
     * @var string|null
     *
     * @Assert\Length(min=2, max=75)
     */
    public ?string $name = null;

    /**
     * @var string|null
     *
     * @Assert\NotBlank
     * @Assert\Email
     */
    public ?string $email = null;

    /**
     * @var string|null
     *
     * @Assert\NotBlank
     * @Assert\Length(min=20, max=150)
     */
    public ?string $content = null;

    public static function loadValidatorMetadata()
    {

    }
}
