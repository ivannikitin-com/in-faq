<?php
/**
 * Тип данных
 * Class FAQ
 */
namespace IN_FAQ;
class FAQ
{
	/**
	 * @const Custom Post Type
	 */
	const CPT = 'in-faq';
	
	/**
	 * @const Custom Post Type
	 */
    const SLUG = 'faq';
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
		$this->registerCPT();
    }
    
    /**
     * Регистрация типа данных
     */
    private function registerCPT()
    {
        $labels = array(
            'name'                  => _x( 'Вопросы', 'Post Type General Name', Plugin::TEXTDOMAIN ),
            'singular_name'         => _x( 'Вопрос', 'Post Type Singular Name', Plugin::TEXTDOMAIN ),
            'menu_name'             => __( 'FAQ', Plugin::TEXTDOMAIN ),
            'name_admin_bar'        => __( 'FAQ', Plugin::TEXTDOMAIN ),
            'archives'              => __( 'Часто задаваемые вопросы', Plugin::TEXTDOMAIN ),
            'attributes'            => __( 'Атрибуты', Plugin::TEXTDOMAIN ),
            'parent_item_colon'     => __( 'Родительский вопрос', Plugin::TEXTDOMAIN ),
            'all_items'             => __( 'Все вопросы', Plugin::TEXTDOMAIN ),
            'add_new_item'          => __( 'Добавить', Plugin::TEXTDOMAIN ),
            'add_new'               => __( 'Добавить', Plugin::TEXTDOMAIN ),
            'new_item'              => __( 'Новый вопрос', Plugin::TEXTDOMAIN ),
            'edit_item'             => __( 'Редактировать', Plugin::TEXTDOMAIN ),
            'update_item'           => __( 'Обновить', Plugin::TEXTDOMAIN ),
            'view_item'             => __( 'Просмотреть', Plugin::TEXTDOMAIN ),
            'view_items'            => __( 'Просмотреть', Plugin::TEXTDOMAIN ),
            'search_items'          => __( 'Поиск', Plugin::TEXTDOMAIN ),
            'not_found'             => __( 'Не найдено', Plugin::TEXTDOMAIN ),
            'not_found_in_trash'    => __( 'Не найдено', Plugin::TEXTDOMAIN ),
            'featured_image'        => __( 'Изображение', Plugin::TEXTDOMAIN ),
            'set_featured_image'    => __( 'Установить изображение', Plugin::TEXTDOMAIN ),
            'remove_featured_image' => __( 'Удалить изображение', Plugin::TEXTDOMAIN ),
            'use_featured_image'    => __( 'Использовать как изображение записи', Plugin::TEXTDOMAIN ),
            'insert_into_item'      => __( 'Вставить в запись', Plugin::TEXTDOMAIN ),
            'uploaded_to_this_item' => __( 'Загружено', Plugin::TEXTDOMAIN ),
            'items_list'            => __( 'Список элементов', Plugin::TEXTDOMAIN ),
            'items_list_navigation' => __( 'Навигация', Plugin::TEXTDOMAIN ),
            'filter_items_list'     => __( 'Фильтр', Plugin::TEXTDOMAIN ),
        );
        $rewrite = array(
            'slug'                  => $this->slug,
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Вопрос', Plugin::TEXTDOMAIN ),
            'description'           => __( 'Часто задаваемые вопросы', Plugin::TEXTDOMAIN ),
            'labels'                => $labels,
            'taxonomies'            => array( Category::TAXONOMY, Tag::TAXONOMY ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 10,
            'menu_icon'             => 'dashicons-excerpt-view',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => $this->slug,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
            'show_in_rest' => true,
            'supports' => array('editor', 'title', 'author', 'excerpt', 'thumbnail', 'revisions', 'comments'),
        );
        register_post_type( self::CPT, $args );
    }
    
}