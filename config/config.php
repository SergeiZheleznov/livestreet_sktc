<?php

$config = array();
$config['min_count'] = 3; // в облако выводятся только те теги, частота использования которых выше этого значения

/**
 * Переопределяем конфигурацию блоков
 */
Config::Set('block.rule_index_blog.blocks.right',array(
				'stream'=>array('priority'=>100),
				'blogs'=>array('params'=>array(),'priority'=>1),
				'Sktc'=>array('params'=>array('plugin'=>'sktc'),'priority'=>50)
				)
			);


Config::Set('block.rule_tag.blocks.right',array(
				'stream'=>array('priority'=>100),
				'Sktc'=>array('params'=>array('plugin'=>'sktc'),'priority'=>50)
				)
			);


return $config;
