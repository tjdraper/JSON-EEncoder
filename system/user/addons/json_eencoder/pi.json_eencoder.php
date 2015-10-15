<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * JSON EEncoder plugin
 *
 * @package json_encoder
 * @author TJ Draper <tj@buzzingpixel.com>
 * @link https://github.com/tjdraper/JSON-EEncoder
 * @copyright Copyright (c) 2015, BuzzingPixel
 */

class Json_eencoder
{
	/**
	 * Encode template tag
	 *
	 * @return string
	 */
	public function encode()
	{
		$jsonEncodedContent = json_encode(ee()->TMPL->tagdata);

		if ($this->truthy(ee()->TMPL->fetch_param('outer_quotes'))) {
			$jsonEncodedContent = trim($jsonEncodedContent, '"');
		}

		return $jsonEncodedContent;
	}

	/**
	 * Truthy check
	 *
	 * @param string $val
	 * @return bool
	 */
	private function truthy($val)
	{
		$truth = array(
			'y',
			'yes',
			'true',
			true
		);

		return in_array($val, $truth);
	}
}