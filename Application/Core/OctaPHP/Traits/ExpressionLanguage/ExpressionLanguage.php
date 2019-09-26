<?php
namespace OctaPHP\Traits\ExpressionLanguage;

/**
 * Initialize ExpressionLanguage class.
 * Allows to compile and evaluate expressions written in your own DSL.
 */
use Symfony\Component\ExpressionLanguage\ExpressionLanguage as OctaExpressionLanguage;

trait ExpressionLanguage {

    /**
     * integrating expression language component of symfony.
     *
     * @return OctaExpressionLanguage class
     * @author Fabien Potencier <fabien@symfony.com>
     */
    public function expressionLanguage() {
        return new OctaExpressionLanguage();
    }
}

