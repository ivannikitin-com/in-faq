<?php
/**
 * Plugin Name:       IN-FAQ
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Раздел FAQ на сайте
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.0
 * Author:            Иван Никитин и партнеры
 * Author URI:        https://ivannikitin.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       in-faq
 * Domain Path:       /languages
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* Файлы плагина */
require 'classes/plugin.php';
require 'classes/faq.php';
require 'classes/category.php';
require 'classes/tag.php';

/* Запуск плагина */
IN_FAQ\Plugin::get( __FILE__ );