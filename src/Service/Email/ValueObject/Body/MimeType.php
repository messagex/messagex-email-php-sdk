<?php
/**
 * This file is part of the MessageX PHP SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MessageX\Service\Email\ValueObject\Body;

use MessageX\Exception\InvalidArgumentType;

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
     * @throws InvalidArgumentType
     */
    public function __construct($mime)
    {
        if (! is_string($mime)) {
            if (! is_string($mime)) {
                throw new InvalidArgumentType(
                    sprintf('Mime-Type has to be instance of string, %s given.', gettype($mime))
                );
            }
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
