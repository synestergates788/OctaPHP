<?php
namespace OctaPHP\Traits\FormValidator;
use Valitron\Validator as OctaValidator;

trait FormValidator {

    protected $formValidation;

    /**
     * integrating form validation using Validator.
     * @param array $data      contains an array of fields to be validated
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function formValidation(array $data = []) {
        $this->formValidation = new OctaValidator($data);
    }
}