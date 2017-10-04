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
 * Class Options
 * @package MessageX\Service\Email\ValueObject
 * @author Silvio Marijic <silvio.marijic@smsglobal.com>
 */
final class Options
{
    /**
     * Maximum number of recipients in transactional email.
     */
    const MAX_RECIPIENTS_TRANS_EML = 3;

    /**
     * @var bool Specifies whether emails are transactional or bulk.
     * @Serializer\Type("boolean")
     */
    private $transactional = false;

    /**
     * @var string Url to which email stats will be delivered.
     * @Serializer\Type("string")
     */
    private $postBackUrl;

    /**
     * @return string Url to which email stats will be delivered.
     */
    public function postBackUrl()
    {
        return is_string($this->postBackUrl)? $this->postBackUrl : '';
    }

    /**
     * @return bool Specifies whether emails are transactional or batch.
     */
    public function isTransactional()
    {
        return $this->transactional === true;
    }
    /**
     *
     */
    public function flagAsTransactional()
    {
        $this->transactional = true;
    }

    /**
     *
     */
    public function flagAsBulk()
    {
        $this->transactional = false;
    }
}
