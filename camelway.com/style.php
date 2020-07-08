<?php
/*
 * 自动压缩CSS
 */

//定义CSS文件名
$cssFiles[] = 'frame.css';
$cssFiles[] = 'category.css';
$cssFiles[] = 'single.css';
$cssFiles[] = 'index.css';
$cssFiles[] = 'search.css';
$cssFiles[] = 'tag.css';

require_once('./lib/Minifier.php');
require_once('./lib/Colors.php');
require_once('./lib/Utils.php');
$compressor = new Minifier;
$compressor->setLineBreakPosition(5000);
$css = '';
foreach($cssFiles as $cssfile){
    $css .= file_get_contents('./css/'.$cssfile);
}
header('Content-Type: text/css');
header('Cache-Control: public, max-age=7200');
//header('Cache-Control: no-cache');
echo $compressor->run($css);
