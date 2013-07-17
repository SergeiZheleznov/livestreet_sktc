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
class PluginSktc_BlockTags extends PluginSktc_Inherit_BlockTags {
    public function Exec() {
		$aTags=$this->oEngine->Topic_GetOpenTopicTags(Config::Get('block.tags.tags_count'));
		if ($aTags) {
			$this->Viewer_Assign("aTags",$aTags);
		}
		if ($oUserCurrent=$this->User_getUserCurrent()) {
			$aTags=$this->oEngine->Topic_GetOpenTopicTags(Config::Get('block.tags.personal_tags_count'), $oUserCurrent->getId());

			if ($aTags) {
				$this->Viewer_Assign("aTagsUser",$aTags);
			}
		}
    }
}
?>
