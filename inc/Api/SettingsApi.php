<?php

/**
 * @package  AlecadddPlugin
 */

namespace Inc\Api;

class SettingsApi
{
    public $admin_pages = array();
    public $admin_subpages = array();
    public function register()
    {
        if (!empty($this->admin_pages)) {
            add_action('admin_menu', array($this, 'add_admin_menu'));
        }
    }
    public function add_pages(array $pages)
    {
        $this->admin_pages = $pages;
        return $this;
    }

    public function add_sub_pages(array $pages)
    {
        $this->admin_subpages =  $pages;
        return $this;
    }
    public function add_admin_menu()
    {
        foreach ($this->admin_pages as $page) {
            add_menu_page($page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position']);
        }
        foreach ($this->admin_subpages as $page) {
            add_submenu_page($page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback']);
        }
    }
}
