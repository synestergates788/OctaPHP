<?php
namespace Core;

class Input {

    public function isAjaxRequest() {
        return ( ! empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');
    }

    public function post($Data) {
        if (is_array($Data)) {
            if ($Data) {
                foreach ($Data as $key => $row) {
                    return (isset($_POST[$row])) ? $_POST[$row] : '';
                }
            }
        } else {
            return (isset($_POST[$Data])) ? $_POST[$Data] : null;
        }
    }

    public function get($Data) {

        if (is_array($Data)) {
            if ($Data) {
                foreach ($Data as $key => $row) {
                    return (isset($_GET[$row])) ? $_GET[$row] : null;
                }
            }
        } else {
            return (isset($_GET[$Data])) ? $_GET[$Data] : null;
        }
    }
}