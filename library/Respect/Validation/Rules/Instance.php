<?php

namespace Respect\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use Respect\Validation\Exceptions\InstanceException;

class Instance extends AbstractRule
{

    public $instance;

    public function createException()
    {
        return new InstanceException;
    }

    public function __construct($instance)
    {
        $this->instance = $instance;
    }

    public function validate($input)
    {
        return $input instanceof $this->instance;
    }

    public function assert($input)
    {
        if (!$this->validate($input))
            throw $this->getException() ? :  InstanceException::create()
                ->configure($input, $this->instance);
        return true;
    }

    public function check($input)
    {
        return $this->assert($input);
    }

}