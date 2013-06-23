<?php
class PluginSktc_BlockSktc extends Block {
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
