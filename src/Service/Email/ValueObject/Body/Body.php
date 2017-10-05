<?php

/**
 * This file is part of the MessageX PHP SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MessageX\Service\Email\ValueObject\Body;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Body
 * @package MessageX\Service\Email\ValueObject\Body
 * @author Silvio Marijic <silvio.marijic@smsglobal.com>
 */
final class Body
{
    /**
     * @var string Content type of the email.
     * @Serializer\Type("string")
     */
    private $mime;

    /**
     * @var string Email content.
     * @Serializer\Type("string")
     */
    private $content;

    /**
     * Body constructor.
     * @param string $mime Content type of the email.
     * @param string $content Email content.
     */
    public function __construct($mime, $content)
    {
        $this->mime     = new MimeType($mime);
        $this->content  = $content;
    }

    /**
     * @return string Content type of the email.
     */
    public function getMime()
    {
        return (string) $this->mime;
    }

    /**
     * @return string Email content.
     */
    public function getContent()
    {
        return $this->content;
    }
}
