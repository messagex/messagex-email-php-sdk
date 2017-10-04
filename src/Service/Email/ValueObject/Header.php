<?php

/**
 * This file is part of the MessageX PHP SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MessageX\Service\Email\ValueObject;

use JMS\Serializer\Annotation as Serializer;
use MessageX\Service\Email\Exception\HeaderNotAllowed;

/**
 * Class Header
 * @package MessageX\Service\Email\ValueObject
 * @author Silvio Marijic <silvio.marijic@smsglobal.com>
 */
final class Header
{
    /**
     * @var array
     */
    private $unallowedHeaders = [
        'x-msx-gid',
        'received',
        'dkim-signature',
        'content-type',
        'content-transfer-encoding',
        'to',
        'from',
        'subject',
        'reply-to',
        'cc',
        'bcc'
    ];

    /**
     * @var string Name of the header.
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @var mixed Value of the header.
     * @Serializer\Type("string")
     */
    private $value;

    /**
     * Header constructor.
     * @param string $name Name of the header.
     * @param mixed $value Value of the header.
     * @throws HeaderNotAllowed
     */
    public function __construct($name, $value)
    {
        if (in_array(strtolower($name), $this->unallowedHeaders)) {
            throw new HeaderNotAllowed(
                sprintf(
                    'Header %s is not allowed to be overwritten',
                    $name
                )
            );
        }

        $this->name     = $name;
        $this->value    = $value;
    }

    /**
     * @return string Name of the header.
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return mixed Value of the header.
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return string String representation of header.
     */
    public function __toString()
    {
        return "{$this->name}: {$this->value}";
    }
}
