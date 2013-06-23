<?php

/**
 * Запрещаем напрямую через браузер обращение к этому файлу.
 */
if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginSktc extends Plugin {

    // Объявление делегирований (нужны для того, чтобы назначить свои экшны и шаблоны)
    public $aDelegates = array(

    );

    // Объявление переопределений (модули, мапперы и сущности)
    protected $aInherits=array(
        'module' => array('ModuleTopic_MapperTopic'),
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
        //$this->Viewer_AppendScript(Plugin::GetTemplatePath(__CLASS__)."/js/script.js"); // Добавление своего JS

        //$this->Viewer_AddMenu('blog',Plugin::GetTemplatePath(__CLASS__).'/menu.blog.tpl'); // например, задаем свой вид меню
    }
}
?>
