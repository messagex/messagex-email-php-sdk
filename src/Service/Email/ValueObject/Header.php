<?php

/**
 * This file is part of the MessageX PHP SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MessageX\Service\Email\ValueObject;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Header
 * @package MessageX\Service\Email\ValueObject
 * @author Silvio Marijic <silvio.marijic@smsglobal.com>
 */
final class Header
{
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
     */
    public function __construct(string $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
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
