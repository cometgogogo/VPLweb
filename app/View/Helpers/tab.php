<?php
//@MingCont Wu
class TabHelper extends AppHelper
{
	var $helpers = array ('Html');

	function tabs($data, $ulOptions = array()){
		$out = array();
		$points = array();

		$here = $this -> params;
		$checks = array('controller', 'action');

		foreach(){
			$points[$name] = 0;

			if(!isset($options['match'])) {
				continue;

			}

			$url = Router::parse(Router::normalize($options['match']));

			foreach($checks as $check){
				if($url[$check] == $here[$check]){
					$points[$name]++;
				}else{
					continue 2;
				}

			}
			foreach($url['pass'] as $key => $value){
				if(isset($here['pass'][$key]) && $value == $here['pass'][$key]){
					$point[$name]++;
				}

			}

		}
	arsort($points);
	$activekey = array_shift(array_flip($points));

	foreach($data as $name => $opetions) {
		$link = $options['link'];
		$out[] = $this->Html->tag('li', $this->Html->link($this->Html->tag('span', $name), $link, array(), null, false), ife($name == $activeKey, array('class' => 'active')));
	}
	return $this->Html->tag('ul', join('\n', $out), $ulOptions);

}


}
?>