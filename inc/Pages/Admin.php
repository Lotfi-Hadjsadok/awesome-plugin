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
		$this->set_settings();
		$this->set_sections();
		$this->set_fields();

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
	public function set_settings()
	{
		$args = array(
			array(
				'option_group' => "alecaddd_options_group",
				'option_name' => 'text-example',
				'callback' => array($this->callbacks, 'alecaddd_options_group')
			)
		);
		$this->settings->add_settings($args);
	}
	public function set_sections()
	{
		$args = array(
			array(
				'id' => "alecaddd_admin_index",
				'title' => 'Settings',
				'callback' => array($this->callbacks, 'alecaddd_admin_section'),
				'page' => 'Alecaddd-plugin'
			)
		);
		$this->settings->add_sections($args);
	}

	public function set_fields()
	{
		$args = array(
			array(
				'id' => "alecaddd_options_group",
				'title' => 'Text Example',
				'callback' => array($this->callbacks, 'alecaddd_text_example'),
				'page' => 'Alecaddd-plugin',
				'section' => 'alecaddd_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			)
		);
		$this->settings->add_fields($args);
	}
}
