<?php
/**
 * SanitizeTest file
 *
 * CakePHP(tm) Tests <http://book.cakephp.org/2.0/en/development/testing.html>
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://book.cakephp.org/2.0/en/development/testing.html CakePHP(tm) Tests
 * @package       Cake.Test.Case.Utility
 * @since         CakePHP(tm) v 1.2.0.5428
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Sanitize', 'Utility');

/**
 * DataTest class
 *
 * @package       Cake.Test.Case.Utility
 */
class SanitizeDataTest extends CakeTestModel {

/**
 * useTable property
 *
 * @var string
 */
	public $useTable = 'data_tests';
}

/**
 * Article class
 *
 * @package       Cake.Test.Case.Utility
 */
class SanitizeArticle extends CakeTestModel {

/**
 * useTable property
 *
 * @var string
 */
	public $useTable = 'articles';
}

/**
 * SanitizeTest class
 *
 * @package       Cake.Test.Case.Utility
 */
class SanitizeTest extends CakeTestCase {

/**
 * autoFixtures property
 *
 * @var bool
 */
	public $autoFixtures = false;

/**
 * fixtures property
 *
 * @var array
 */
	public $fixtures = array('core.data_test', 'core.article');

/**
 * testEscapeAlphaNumeric method
 *
 * @return void
 */
	public function testEscapeAlphaNumeric() {
		$resultAlpha = Sanitize::escape('abc', 'test');
		$this->assertEquals('abc', $resultAlpha);

		$resultNumeric = Sanitize::escape('123', 'test');
		$this->assertEquals('123', $resultNumeric);

		$resultNumeric = Sanitize::escape(1234, 'test');
		$this->assertEquals(1234, $resultNumeric);

		$resultNumeric = Sanitize::escape(1234.23, 'test');
		$this->assertEquals(1234.23, $resultNumeric);

		$resultNumeric = Sanitize::escape('#1234.23', 'test');
		$this->assertEquals('#1234.23', $resultNumeric);

		$resultNull = Sanitize::escape(null, 'test');
		$this->assertEquals(null, $resultNull);

		$resultNull = Sanitize::escape(false, 'test');
		$this->assertEquals(false, $resultNull);

		$resultNull = Sanitize::escape(true, 'test');
		$this->assertEquals(true, $resultNull);
	}

/**
 * testClean method
 *
 * @return void
 */
	public function testClean() {
		$string = 'test & "quote" \'other\' ;.$ symbol.' . "\r" . 'another line';
		$expected = 'test &amp; &quot;quote&quot; &#039;other&#039; ;.$ symbol.another line';
		$result = Sanitize::clean($string, array('connection' => 'test'));
		$this->assertEquals($expected, $result);

		$string = 'test & "quote" \'other\' ;.$ symbol.' . "\r" . 'another line';
		$expected = 'test & ' . Sanitize::escape('"quote"', 'test') . ' ' . Sanitize::escape('\'other\'', 'test') . ' ;.$ symbol.another line';
		$result = Sanitize::clean($string, array('encode' => false, 'connection' => 'test'));
		$this->assertEquals($expected, $result);

		$string = 'test & "quote" \'other\' ;.$ \\$ symbol.' . "\r" . 'another line';
		$expected = 'test & "quote" \'other\' ;.$ $ symbol.another line';
		$result = Sanitize::clean($string, array('encode' => false, 'escape' => false, 'connection' => 'test'));
		$this->assertEquals($expected, $result);

		$string = 'test & "quote" \'other\' ;.$ \\$ symbol.' . "\r" . 'another line';
		$expected = 'test & "quote" \'other\' ;.$ \\$ symbol.another line';
		$result = Sanitize::clean($string, array('encode' => false, 'escape' => false, 'dollar' => false, 'connection' => 'test'));
		$this->assertEquals($expected, $result);

		$string = 'test & "quote" \'other\' ;.$ symbol.' . "\r" . 'another line';
		$expected = 'test & "quote" \'other\' ;.$ symbol.' . "\r" . 'another line';
		$result = Sanitize::clean($string, array('encode' => false, 'escape' => false, 'carriage' => false, 'connection' => 'test'));
		$this->assertEquals($expected, $result);

		$array = array(array('test & "quote" \'other\' ;.$ symbol.' . "\r" . 'another line'));
		$expected = array(array('test &amp; &quot;quote&quot; &#039;other&#039; ;.$ symbol.another line'));
		$result = Sanitize::clean($array, array('connection' => 'test'));
		$this->assertEquals($expected, $result);

		$array = array(array('test & "quote" \'other\' ;.$ \\$ symbol.' . "\r" . 'another line'));
		$expected = array(array('test & "quote" \'other\' ;.$ $ symbol.another line'));
		$result = Sanitize::clean($array, array('encode' => false, 'escape' => false, 'connection' => 'test'));
		$this->assertEquals($expected, $result);

		$array = array(array('test odd Ä spacesé'));
		$expected = array(array('test odd &Auml; spaces&eacute;'));
		$result = Sanitize::clean($array, array('odd_spaces' => false, 'escape' => false, 'connection' => 'test'));
		$this->assertEquals($expected, $result);

		$array = array(array('\\$', array('key' => 'test & "quote" \'other\' ;.$ \\$ symbol.' . "\r" . 'another line')));
		$expected = array(array('$', array('key' => 'test & "quote" \'other\' ;.$ $ symbol.another line')));
		$result = Sanitize::clean($array, array('encode' => false, 'escape' => false, 'connection' => 'test'));
		$this->assertEquals($expected, $result);

		$string = '';
		$expected = '';
		$result = Sanitize::clean($string, array('connection' => 'test'));
		$this->assertEquals($expected, $string);

		$data = array(
			'Grant' => array(
				'title' => '2 o clock grant',
				'grant_peer_review_id' => 3,
				'institution_id' => 5,
				'created_by' => 1,
				'modified_by' => 1,
				'created' => '2010-07-15 14:11:00',
				'modified' => '2010-07-19 10:45:41'
			),
			'GrantsMember' => array(
				0 => array(
					'id' => 68,
					'grant_id' => 120,
					'member_id' => 16,
					'program_id' => 29,
					'pi_percent_commitment' => 1
				)
			)
		);
		$result = Sanitize::clean($data, array('connection' => 'test'));
		$this->assertEquals($data, $result);
	}

/**
 * testHtml method
 *
 * @return void
 */
	public function testHtml() {
		$string = '<p>This is a <em>test string</em> & so is this</p>';
		$expected = 'This is a test string &amp; so is this';
		$result = Sanitize::html($string, array('remove' => true));
		$this->assertEquals($expected, $result);

		$string = 'The "lazy" dog \'jumped\' & flew over the moon. If (1+1) = 2 <em>is</em> true, (2-1) = 1 is also true';
		$expected = 'The &quot;lazy&quot; dog &#039;jumped&#039; &amp; flew over the moon. If (1+1) = 2 &lt;em&gt;is&lt;/em&gt; true, (2-1) = 1 is also true';
		$result = Sanitize::html($string);
		$this->assertEquals($expected, $result);

		$string = 'The "lazy" dog \'jumped\'';
		$expected = 'The &quot;lazy&quot; dog \'jumped\'';
		$result = Sanitize::html($string, array('quotes' => ENT_COMPAT));
		$this->assertEquals($expected, $result);

		$string = 'The "lazy" dog \'jumped\'';
		$result = Sanitize::html($string, array('quotes' => ENT_NOQUOTES));
		$this->assertEquals($string, $result);

		$string = 'The "lazy" dog \'jumped\' & flew over the moon. If (1+1) = 2 <em>is</em> true, (2-1) = 1 is also true';
		$expected = 'The &quot;lazy&quot; dog &#039;jumped&#039; &amp; flew over the moon. If (1+1) = 2 &lt;em&gt;is&lt;/em&gt; true, (2-1) = 1 is also true';
		$result = Sanitize::html($string);
		$this->assertEquals($expected, $result);

		$string = 'The "lazy" dog & his friend Apple&reg; conquered the world';
		$expected = 'The &quot;lazy&quot; dog &amp; his friend Apple&amp;reg; conquered the world';
		$result = Sanitize::html($string);
		$this->assertEquals($expected, $result);

		$string = 'The "lazy" dog & his friend Apple&reg; conquered the world';
		$expected = 'The &quot;lazy&quot; dog &amp; his friend Apple&reg; conquered the world';
		$result = Sanitize::html($string, array('double' => false));
		$this->assertEquals($expected, $result);
	}

/**
 * testStripWhitespace method
 *
 * @return void
 */
	public function testStripWhitespace() {
		$string = "This     sentence \t\t\t has lots of \n\n white\nspace \rthat \r\n needs to be    \t    \n trimmed.";
		$expected = "This sentence has lots of whitespace that needs to be trimmed.";
		$result = Sanitize::stripWhitespace($string);
		$this->assertEquals($expected, $result);

		$text = 'I    love  ßá†ö√    letters.';
		$result = Sanitize::stripWhitespace($text);
		$expected = 'I love ßá†ö√ letters.';
		$this->assertEquals($expected, $result);
	}

/**
 * testParanoid method
 *
 * @return void
 */
	public function testParanoid() {
		$string = 'I would like to !%@#% & dance & sing ^$&*()-+';
		$expected = 'Iwouldliketodancesing';
		$result = Sanitize::paranoid($string);
		$this->assertEquals($expected, $result);

		$string = array('This |s th% s0ng that never ends it g*es',
					