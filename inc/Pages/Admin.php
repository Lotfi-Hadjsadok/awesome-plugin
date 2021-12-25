<?php

namespace Inc\Pages;

use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

/**
 * 
 */
class Admin extends BaseController
{
	public $settings;
	public $subpages;
	public $pages;
	public $callbacks;
	public function register()
	{
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->set_pages();
		$this->set_subpages();
		$this->settings->add_pages($this->pages)->add_sub_pages($this->subpages)->register();
	}
	public function set_pages()
	{
		$this->pages = array(
			array(
				'page_title' => 'Alecaddd Plugin',
				'menu_title' => 'Alecaddd',
				'capability' => 'manage_options',
				'menu_slug' => 'Alecaddd-plugin',
				'callback' => array($this->callbacks, 'admin_dashboard'),
				'icon_url' => 'dashicons-store',
				'position' => 110
			)
		);
	}
	public function set_subpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'Alecaddd-plugin',
				'page_title' => 'Alecaddd Plugin',
				'menu_title' => 'Dashboard',
				'capability' => 'manage_options',
				'menu_slug' => 'Alecaddd-plugin',

			),
			array(
				'parent_slug' => 'Alecaddd-plugin',
				'page_title' => 'Custom Post Type',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'alecaddd-cpt',
				'callback' => function () {
					echo '<h1>CPT Manager</h1>';
				}
			),
			array(
				'parent_slug' => 'Alecaddd-plugin',
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'alecaddd-taxonomies',
				'callback' => function () {
					echo '<h1>Taxonomy Manager</h1>';
				},
			),
			array(
				'parent_slug' => 'Alecaddd-plugin',
				'page_title' => 'Custom Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'alecaddd-widgets',
				'callback' => function () {
					echo '<h1>Widget Manager</h1>';
				},
			)
		);
	}
}
