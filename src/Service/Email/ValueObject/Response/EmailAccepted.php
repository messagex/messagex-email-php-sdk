<?php

/**
 * This file is part of the MessageX PHP SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MessageX\Service\Email\ValueObject\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class EmailAccepted
 * @package MessageX\Service\Email\ValueObject\Response
 * @author Silvio Marijic <silvio.marijic@smsglobal.com>
 */
final class EmailAccepted
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $gid;

    /**
     * @return string
     */
    public function gid()
    {
        return $this->gid;
    }
}

