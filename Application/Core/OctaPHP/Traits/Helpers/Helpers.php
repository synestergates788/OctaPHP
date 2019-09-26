<?php
namespace OctaPHP\Traits\Helpers;

/**
 * loading autoload helpers.
 *
 * @param string $helpers      helper file name
 * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
 */

trait Helpers {

    public function __construct($Helpers) {
        $this->loadHelpers($Helpers);
    }

    public function loadHelpers($ConfigHelpers) {
        $Helpers = [];

        if ($ConfigHelpers) {
            foreach ($ConfigHelpers as $row) {
                array_push($Helpers, $row);
            }
        }

        $HelperDir = scandir(ROOT . DS . 'Application' . DS . 'Helpers');
        unset($HelperDir[0],$HelperDir[1]);
        if ($HelperDir) {
            foreach ($HelperDir as $row) {
                if (strpos($row, '.php')) {
                    $row = str_replace(".php", "", $row);
                    if (in_array($row,$Helpers)) {
                        include_once ROOT . DS . 'Application' . DS . 'Helpers' . DS . $row . '.php';
                    }
                }
            }
        }
    }
}