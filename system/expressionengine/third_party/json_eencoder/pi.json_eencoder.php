<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * JSON EEncoder Plugin
 *
 * @package JSON EEncoder
 * @author  TJ Draper
 * @link    http://www.buzzingpixel.com
 */

$plugin_info = array (
	'pi_name' => 'JSON EEncoder',
	'pi_version' => '1.0.0',
	'pi_author' => 'TJ Draper',
	'pi_author_url' => 'http://buzzingpixel.com',
	'pi_description' => 'JSON encode content.',
	'pi_usage' => Json_eencoder::usage()
);

class Json_eencoder {

	public function __construct()
	{
		$this->EE =& get_instance();
	}

	public function encode()
	{
		$outerQuotes = $this->EE->TMPL->fetch_param('outer_quotes');

		$jsonEncodedContent = json_encode($this->EE->TMPL->tagdata);

		if ($outerQuotes === 'no') {
			$jsonEncodedContent = rtrim($jsonEncodedContent, '"');
			$jsonEncodedContent = ltrim($jsonEncodedContent, '"');
		}

		return $jsonEncodedContent;
	}

	public static function usage()
	{
		ob_start();
?>
See docs and examples on GitHub:
https://github.com/tjdraper/JSON-EEncoder
<?php
		$buffer = ob_get_contents();

		ob_end_clean();

		return $buffer;
	}
}