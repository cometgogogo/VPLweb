<?php

/**
 * SkitterHelper
 *
 * Skitter - Slideshow for anytime!
 *
 * @description Slideshow
 * @author Thiago Silva Ferreira - http://thiagosf.net
 * @version 1.0
 * @date July 12, 2011
 * @copyright (c) 2011 Thiago Silva Ferreira - http://thiagosf.net
 * @license Dual licensed under the MIT or GPL Version 2 licenses
 * @example http://thiagosf.net/projects/jquery/skitter/
 *
 */
class SkitterHelper extends Helper
{
	/**
	 * Helpers
	 */
	public $helpers = array(
		'Html',
		'Javascript',
	);

	/**
	 * Configuration
	 */
	private $config = array();

	/**
	 * Valid options
	 */
	private $map = array(
		'velocity' 				=> 'number',
		'interval' 				=> 'number',
		'animation'	 			=> 'string',
		'numbers' 				=> 'boolean',
		'navigation' 			=> 'boolean',
		'label' 				=> 'boolean',
		'easing_default' 		=> 'string',
		'animateNumberOut' 		=> 'json',
		'animateNumberOver' 	=> 'json',
		'animateNumberActive' 	=> 'json',
		'thumbs' 				=> 'boolean',
		'hideTools' 			=> 'boolean',
		'fullscreen' 			=> 'boolean',
		'xml' 					=> 'string',
		'dots' 					=> 'boolean',
		'width_label' 			=> 'string',
		'show_randomly' 		=> 'boolean',
		'preview' 				=> 'bool',
		'numbers_align' 		=> 'string',
	);

    /**
     * Include files
     */
    function includeFiles() {
		// JS Files
		$out  = '';
		// $out .= $this->Javascript->link('jquery-1.6.3.min');
		$out .= $this->Javascript->link('jquery.animate-colors-min');
		$out .= $this->Javascript->link('jquery.easing.1.3');
		$out .= $this->Javascript->link('jquery.skitter.min');

		// CSS Theme
		$out .= $this->Html->css('skitter.styles');

		return $out;
    }

	/**
	 * Display slideshow
	 *
	 * @param $slides array			Array with slides
	 *
	 * Example:
	 *
	 * array(
	 * 		array(
	 * 			'image' => 'path/image.jpg',	// Path image
	 * 			'link' => '#link',				// Link (optional)
	 * 			'label' => 'Label',				// Label (optional)
	 * 			'animation' => 'paralell',		// Animation (optional)
	 * 		),
	 * );
	 *
	 */
	public function display ($slides = array()) {
		if (!empty($slides)) {

			$class = (isset($this->config['class']) ? ' '.$this->config['class'] : '');
			$options = $this->_getOptions();

			$js = $this->Javascript->codeBlock('
				$(document).ready(function() {
					$(".box_skitter").skitter('.$options.');
				});
			');

			$out  = $js;
			$out .= '<div id="cake_skitter" class="box_skitter'.$class.'">';
			$out .= '<ul>';

			foreach($slides as $slide) {
				$animation = (isset($slide['animation']) ? $slide['animation'] : '');
				//$image = $this->Html->image($slide['image'], array('class' => $animation));
				$image = '<img src="/img/'.$slide[image].'" class="'.$animation.'" />';

				$label = null;

				if (!empty($slide['link'])) {
					//$image = $this->Html->link($image, $slide['link'], array('target'=>'_blank', 'escape' => false));
					$image = '<a href="'.$slide['link']. '"  rel="external" target="_blank">'.$image.'</a>';
				}

				if (!empty($slide['label'])) {
					$label = sprintf('<div class="label_text"><p>%s</p></div>', $slide['label']);
				}

				$out .= sprintf('<li>%s%s</li>', $image, $label);
			}

			$out .= '</ul>';
			$out .= '</div>';
echo $out;
			return $out;
		}
	}

	/**
	 * Configuration
	 *
	 * @param $config array		 	Skitter options setup
	 */
	public function setConfig ($config = array()) {
		$this->config = $config;
	}

	/**
	 * Options
	 */
	private function _getOptions () {
		if (!empty($this->config)) {
			$block = array('class');
			$out = array();
			foreach($this->config as $key => $value) {
				if (!in_array($key, $block) && isset($this->map[$key])) {
					$out[] = $key.': '.$this->_getValue($key, $value);
				}
			}
			$out = '{'.implode(', ', $out).'}';
			return $out;
		}
	}

	/**
	 * Get value formated
	 *
	 * @param $key string			Name option
	 * @param $value string			Value option
	 */
	private function _getValue ($key, $value) {
		$type = isset($this->map[$key]) ? $this->map[$key] : 'string';
		switch ($type) {
			case 'string' : $value = '"'.$value.'"'; break;
			case 'boolean' : $value = (($value) ? 'true' : 'false'); break;
		}
		return $value;
	}
}
