<?php
namespace OctaPHP\Traits\DataValidator;
use Respect\Validation\Validator as OctaDataValidator;

trait DataValidator{

    /**
     * integrating data validator.
     * @return OctaDataValidator class
     * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
     */
    public function validator(){
        return new OctaDataValidator();
    }
}
