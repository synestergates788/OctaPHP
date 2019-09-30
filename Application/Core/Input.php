<?php
namespace Core;

class Input {

    public function isAjaxRequest() {
        return ( ! empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');
    }

    public function post($Data) {

        if (is_array($Data)) {

            foreach ($Data as $key => $row) {
                if (isset($_POST[$row])) {
                    return $_POST[$row];
                }
            }

        } else {
            if (isset($_POST[$Data])) {
                return $_POST[$Data];
            } else {
                return false;
            }
        }
    }

    public function get($Data) {

        if (is_array($Data)) {

            foreach ($Data as $key => $row) {
                if (isset($_GET[$row])) {
                    return $_GET[$row];
                }
            }

        } else {
            if (isset($_GET[$Data])) {
                return $_GET[$Data];
            }
        }
    }
}