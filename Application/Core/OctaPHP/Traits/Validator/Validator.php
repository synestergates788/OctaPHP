<?php
namespace OctaPHP\Traits\Validator;

/**
 * Initialize vlucas\Validator class.
 */
use Valitron\Validator as OctaValidator;

/**
 * Initialize Respect\Validation\Validator class.
 */
use Respect\Validation\Validator as OctaDataValidator;

trait Validator{

    protected $formValidation;

    /**
     * integrating form validation using Validator.
     * @param array $data      contains an array of fields to be validated
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function formValidation(array $data = []){
        $this->formValidation = new OctaValidator($data);
    }

    /**
     * integrating data validator.
     *
     * @return Validator class
     * @author Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
     */
    public function validator(){
        return new OctaDataValidator();
    }
}

