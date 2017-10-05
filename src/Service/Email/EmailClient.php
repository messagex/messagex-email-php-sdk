<?php

/**
 * This file is part of the MessageX PHP SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MessageX\Service\Email;

use MessageX\MxClient;
use MessageX\Service\Email\ValueObject\Email;
use MessageX\Service\Email\ValueObject\Response\EmailAccepted;

/**
 * Class EmailClient
 * @package MessageX\Service\Email
 *
 * @method EmailAccepted sendEmail(Email $email)
 * @author Silvio Marijic <silvio.marijic@smsglobal.com>
 */
class EmailClient extends MxClient
{
    /**
     * @return string
     */
    protected function getServiceDescriptorPath()
    {
        return __DIR__ . '/../../descriptor.json';
    }
}
