<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

/**
 * Class Json_eencoder
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
