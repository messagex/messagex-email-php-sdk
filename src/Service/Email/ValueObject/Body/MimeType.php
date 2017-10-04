<?php
/**
 * This file is part of the MessageX PHP SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MessageX\Service\Email\ValueObject\Body;

/**
 * Class MimeType
 * @package MessageX\Service\Email\ValueObject\Body
 * @author Silvio Marijic <silvio.marijic@smsglobal.com>
 */
final class MimeType
{
    /**
     *
     */
    const DEFAULT_MIME_TYPE = 'text/plain';

    /**
     * @var array
     */
    private $mimeTypes = [
        "text/plain",
        "text/html",
    ];

    /**
     * @var string
     */
    private $mime;

    /**
     * MimeType constructor.
     * @param string $mime
     */
    public function __construct($mime)
    {
        if (! is_string($mime)) {
        }

        $this->mime = in_array($mime, $this->mimeTypes)
            ? $mime
            : self::DEFAULT_MIME_TYPE;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->mime;
    }
}
