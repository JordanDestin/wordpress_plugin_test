<?php

namespace Jojo\Test;

class JojoPlugin {

    const TRANSIENT_ACTIVATION = 'jojo_activation_activated';

    public function __construct(string $file) {
        register_activation_hook($file, [$this, 'plugin_activation']);
        add_action('admin_notices', [$this, 'notice_activation']);

        if(is_admin()) {
           $adminController =  new Controller\AdminController();
        }
    }

    public function plugin_activation() {
        set_transient(self::TRANSIENT_ACTIVATION, true);
    }

    public function notice_activation() {
        if(get_transient(self::TRANSIENT_ACTIVATION)) {
           self::render('notice', ['message' => '<strong>Extension activéesssssss.</strong>']);
        }
        delete_transient(self::TRANSIENT_ACTIVATION);
    }

    public static function render(string $name, array $args=[]) {
        extract($args); 
        $file = JOJO_PLUGIN_DIR . 'views/' . $name . '.php';

        ob_start();
        include_once($file);

        echo ob_get_clean();
    }
}