<?php

$currentDir = getcwd();
exit("请修改 Apache 或 Nginx 配置, 将网站根目录设置为: {$currentDir}/public/");
