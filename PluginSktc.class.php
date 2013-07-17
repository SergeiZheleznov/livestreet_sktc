<?php
/*-------------------------------------------------------
*
*   Plugin "Sktc. Замена стандартного облака тегов"
*   Author: Zheleznov Sergey (skif)
*   Site: livestreet.ru/profile/skif/
*   Contact e-mail: sksdes@gmail.com
*
---------------------------------------------------------
*/
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginSktc extends Plugin {

    // Объявление делегирований (нужны для того, чтобы назначить свои экшны и шаблоны)
    public $aDelegates = array(
        'template' => array('blocks/block.tags.tpl')
    );

    // Объявление переопределений (модули, мапперы и сущности)
    protected $aInherits=array(
        'module' => array('ModuleTopic_MapperTopic'),
        'block' => array('BlockTags')
    );

    // Активация плагина
    public function Activate() {
        return true;
    }

    // Деактивация плагина
    public function Deactivate(){
        return true;
    }

    // Инициализация плагина
    public function Init() {
        $this->Viewer_AppendStyle(Plugin::GetTemplatePath(__CLASS__)."css/style.css"); // Добавление своего CSS
    }
}
?>
