<?php

return array(
        'sourcePath'=>dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..',
        'messagePath'=>dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'messages',
        'languages'=>array('zh_cn'),
        'autoMerge'=>true,
        'launchpad'=>false,
        'skipUnused'=>true,
        'fileTypes'=>array('php'),
        'exclude'=>array(
                '/messages',
        ),
);

?>
