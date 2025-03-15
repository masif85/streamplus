<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CustomValidator extends Constraint
{
    public $message = 'This value is not valid.';
}
