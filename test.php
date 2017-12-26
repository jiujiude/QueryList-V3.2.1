<?php
require 'phpQuery.php';
require 'QueryList.php';
use QL\QueryList;

//$hj = QueryList::Query('http://mobile.csdn.net/', array("url" => array('.unit h1 a', 'href')));
//$data = $hj->getData(function($x) {
//	return $x['url'];
//});
//var_dump($data);


$html = '<div id="footer">
        <div class="wrap-inner">
            <div class="links">
                <a href="open.taobao.com" target="_blank">淘宝开放平台</a>
                <a href="www.alibabagroup.com" target="_blank">阿里巴巴集团</a>
                <a href="www.aliyun.com" target="_blank">阿里云</a>
                <a href="www.net.cn" target="_blank">万网</a>
                <a href="www.taobao.com" target="_blank">淘宝网</a>
                <a href="www.tmall.com" target="_blank">天猫</a>
                <a href="www.etao.com" target="_blank">一淘</a>
                <a href="ju.taobao.com" target="_blank">聚划算</a>
                <a href="www.alipay.com" target="_blank">支付宝</a>
            </div>
        </div>
</div>';
$baseUrl = 'http://xxxx.com';
echo memory_get_usage() . "\n";
$hj = QueryList::Query($html, array("href" => array('#footer .links a', 'href')));
$data = $hj->getData(function($x) use($baseUrl){
	return $baseUrl.$x['href'];
});
var_dump($data);

//phpQuery 的方式
echo memory_get_usage() . "\n";
$doc = phpQuery::newDocumentHTML($html);
//phpQuery::selectDocument($doc);
$data = array();
$img = array();
foreach (pq('a') as $img) {
	$data[] = $baseUrl.$img -> getAttribute('href');
}
var_dump($data);
//$img = pq('a')->get(0)->getAttribute('href');
//$img = pq('#footer .wrap-inner .links a')->get(0)->getAttribute('href');
//var_dump($img);
//$doc1 = $doc->find('#footer .wrap-inner .links a:eq(0)')
//	->remove();
//var_dump($doc->htmlOuter());
//echo (pq('#footer .wrap-inner .links a:eq(0)')->htmlOuter());
$doc->unloadDocument();
echo memory_get_usage() . "\n";