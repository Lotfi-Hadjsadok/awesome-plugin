<?php

/**
 * @package  AlecadddPlugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{

    public function admin_dashboard()
    {
        return require_once($this->plugin_path . '/templates/admin.php');
    }
    public function alecaddd_options_group($input)
    {
        return $input;
    }
    public function alecaddd_admin_section()
    {
        echo 'check';
    }
    public function alecaddd_text_example()
    {
        $value = esc_attr(get_option('text-example'));
        echo '<input class="regular-text" name="text-example" value="' . $value . '"  type="text" />';
    }
}
