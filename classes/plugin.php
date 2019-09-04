<?php
/**
 * Основной класс плагина
 * Class Plugin
 */
namespace IN_FAQ;
class Plugin
{
	/**
	 * @const TEXTDOMAIN Text domain
	 */
	const TEXTDOMAIN = 'in-faq';
	
	/**
	 * @const LANG Translations folder
	 */
    const LANG = '/languages';
    
     /**
     * @var Plugin
     */
    private static $instance;	
	
	/**
	 * Plugin folder
	 * @var string
	 */
	public $dir = '';
	
	/**
	 * Plugin file
	 * @var string
	 */
    private $file = '';	
    	
    /**
     * Возвращает экземпляр плагина
	 * @param string $pluginDir	Путь к папке плагина, должен быть передан при первом вызове 
     * @return Plugin
     */
    public static function get( $pluginDir = '' )
    {
        if (null === static::$instance) {
            static::$instance = new static( $pluginDir );
        }
        return static::$instance;
    }

    /**
	 * CPT и таксономии
	 * @var faq
	 */
	private $faq;
	private $category;   
	private $tag;   

	/**
	 * Конструктор плагина
	 * @param string	$pluginFile	Plugin File
	 */
	private function __construct( $pluginFile )
	{
		$this->file = $pluginFile;
		$this->dir = plugin_dir_path( $pluginFile );
		add_action( 'plugins_loaded', array( $this, 'loadTextDomain' ) );
        
        // CPT и таксономии
        $this->category = new Category();
        $this->tag = new Tag();
        $this->faq = new FAQ();
    }
    
	/**
	 * Load textdomain
	 */
	public function loadTextDomain()
	{
		load_plugin_textdomain( self::TEXTDOMAIN, false, basename( dirname( $this->file ) ) . self::LANG );
	}
}