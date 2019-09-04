<?php
/**
 * Таксономия тегов
 * Class Tag
 */
namespace IN_FAQ;
class Tag
{
	/**
	 * @const Custom Post Type
	 */
	const TAXONOMY = 'in-faq-tag';
	
	/**
	 * @const SLUG
	 */
    const SLUG = 'faq/tag';
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
            'name'                       => _x( 'Теги', 'Taxonomy General Name', Plugin::TEXTDOMAIN ),
            'singular_name'              => _x( 'Тег', 'Taxonomy Singular Name', Plugin::TEXTDOMAIN ),
            'menu_name'                  => __( 'Теги', Plugin::TEXTDOMAIN ),
            'all_items'                  => __( 'Все теги', Plugin::TEXTDOMAIN ),
            'new_item_name'              => __( 'Новый тег', Plugin::TEXTDOMAIN ),
            'add_new_item'               => __( 'Добавить', Plugin::TEXTDOMAIN ),
            'edit_item'                  => __( 'Редактировать', Plugin::TEXTDOMAIN ),
            'update_item'                => __( 'Обновить', Plugin::TEXTDOMAIN ),
            'view_item'                  => __( 'Просмотр', Plugin::TEXTDOMAIN ),
            'separate_items_with_commas' => __( 'Теги, разделенные запятыми', Plugin::TEXTDOMAIN ),
            'add_or_remove_items'        => __( 'Добавить или удалить теги', Plugin::TEXTDOMAIN ),
            'choose_from_most_used'      => __( 'Выберите из часто используемых', Plugin::TEXTDOMAIN ),
            'popular_items'              => __( 'Популярные теги', Plugin::TEXTDOMAIN ),
            'search_items'               => __( 'Поиск', Plugin::TEXTDOMAIN ),
            'not_found'                  => __( 'Не найдено', Plugin::TEXTDOMAIN ),
            'no_terms'                   => __( 'Нет тегов', Plugin::TEXTDOMAIN ),
            'items_list'                 => __( 'Список тегов', Plugin::TEXTDOMAIN ),
            'items_list_navigation'      => __( 'Навигация', Plugin::TEXTDOMAIN ),
        );
        $rewrite = array(
            'slug'                       => $this->slug,
            'with_front'                 => true,
            'hierarchical'               => true,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
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