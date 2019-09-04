<?php
/**
 * Таксономия категорий
 * Class Category
 */
namespace IN_FAQ;
class Category
{
	/**
	 * @const Custom Post Type
	 */
	const TAXONOMY = 'in-faq-category';
	
	/**
	 * @const SLUG
	 */
    const SLUG = 'faq/category';
    private $slug = self::SLUG;
    
 	/**
	 * Конструктор
	 */
	public function __construct()
	{
		// Инициализация
        add_action('init', array( $this, 'init') );
	}
	
	/**
	 * Инициализация по хуку Init
	 */
	public function init()
	{
		// Регистрируем тип данных
		$this->registerTaxonomy();
    }
    
    /**
     * Регистрация типа данных
     */
    private function registerTaxonomy()
    {
        $labels = array(
            'name'                       => _x( 'Категории', 'Taxonomy General Name', Plugin::TEXTDOMAIN ),
            'singular_name'              => _x( 'Категория', 'Taxonomy Singular Name', Plugin::TEXTDOMAIN ),
            'menu_name'                  => __( 'Категории', Plugin::TEXTDOMAIN ),
            'all_items'                  => __( 'Все категории', Plugin::TEXTDOMAIN ),
            'parent_item'                => __( 'Родительская категория', Plugin::TEXTDOMAIN ),
            'parent_item_colon'          => __( 'Родительская категория', Plugin::TEXTDOMAIN ),
            'new_item_name'              => __( 'Новая категория', Plugin::TEXTDOMAIN ),
            'add_new_item'               => __( 'Добавить', Plugin::TEXTDOMAIN ),
            'edit_item'                  => __( 'Редактировать', Plugin::TEXTDOMAIN ),
            'update_item'                => __( 'Обновить', Plugin::TEXTDOMAIN ),
            'view_item'                  => __( 'Просмотр', Plugin::TEXTDOMAIN ),
            'separate_items_with_commas' => __( 'Вопросы, разделенные запятыми', Plugin::TEXTDOMAIN ),
            'add_or_remove_items'        => __( 'Добавить или удалить вопросы', Plugin::TEXTDOMAIN ),
            'choose_from_most_used'      => __( 'Выберите из часто используемых', Plugin::TEXTDOMAIN ),
            'popular_items'              => __( 'Популярные элементы', Plugin::TEXTDOMAIN ),
            'search_items'               => __( 'Поиск', Plugin::TEXTDOMAIN ),
            'not_found'                  => __( 'Не найдено', Plugin::TEXTDOMAIN ),
            'no_terms'                   => __( 'Нет категорий', Plugin::TEXTDOMAIN ),
            'items_list'                 => __( 'Список категорий', Plugin::TEXTDOMAIN ),
            'items_list_navigation'      => __( 'Навигация', Plugin::TEXTDOMAIN ),
        );
        $rewrite = array(
            'slug'                       => $this->slug,
            'with_front'                 => true,
            'hierarchical'               => true,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => $rewrite,
        );
        register_taxonomy( self::TAXONOMY, array( FAQ::CPT ), $args );
    }
    
}