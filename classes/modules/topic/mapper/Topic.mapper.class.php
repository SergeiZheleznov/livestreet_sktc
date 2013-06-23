<?php
/*-------------------------------------------------------
*
*   Plugin "Sktc. Изменение стандартного облака тегов"
*   Author: Zheleznov Sergey (skif)
*   Site: livestreet.ru/profile/skif/
*   Contact e-mail: sksdes@gmail.com
*
---------------------------------------------------------
*/
class PluginSktc_ModuleTopic_MapperTopic extends PluginSktc_Inherit_ModuleTopic_MapperTopic {
	public function GetOpenTopicTags($iLimit,$iUserId=null) {
		$sql = "
			SELECT 
				tt.topic_tag_text,
				count(tt.topic_tag_text)	as count		 
			FROM 
				".Config::Get('db.table.topic_tag')." as tt,
				".Config::Get('db.table.blog')." as b
			WHERE
				1 = 1
				{ AND tt.user_id = ?d }
				AND
				tt.blog_id = b.blog_id
				AND
				b.blog_type <> 'close'
			GROUP BY 
				tt.topic_tag_text
			ORDER BY 
				count desc		
			LIMIT 0, ?d
				";
		$aReturn=array();
		$aReturnSort=array();
		if ($aRows=$this->oDb->select($sql,is_null($iUserId) ? DBSIMPLE_SKIP : $iUserId,$iLimit)) {
			foreach ($aRows as $aRow) {
					$aReturn[mb_strtolower($aRow['topic_tag_text'],'UTF-8')]=$aRow;
			}
			foreach ($aReturn as $aRow) {
				$aReturnSort[]=Engine::GetEntity('Topic_TopicTag',$aRow);
			}
		}
		return $aReturnSort;
	}
}
?>