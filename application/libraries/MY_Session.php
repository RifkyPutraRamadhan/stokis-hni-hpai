<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Session extends CI_Session {

    public function __construct($params = array()) {
        parent::__construct($params);

        // Memeriksa apakah data userdata telah berubah sejak dimuat
        if (isset($_SESSION['__ci_last_regenerate'])) {
            $last_regenerate = $_SESSION['__ci_last_regenerate'];
        } else {
            $last_regenerate = time();
            $_SESSION['__ci_last_regenerate'] = $last_regenerate;
        }

        if ((time() - $last_regenerate) > config_item('sess_time_to_update')) {
            // Data userdata telah berubah, maka perlu melakukan reload session
            $this->sess_regenerate(TRUE);
            $_SESSION['__ci_last_regenerate'] = time();
        }
    }
}
