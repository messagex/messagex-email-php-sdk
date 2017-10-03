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
 * Class Email
 * @package MessageX\Service\Email\ValueObject
 * @author Silvio Marijic <silvio.marijic@smsglobal.com>
 */
class Email
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $from;

    /**
     * @var array
     * @Serializer\Type("array<string>")
     */
    private $to;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $subject;

    /**
     * @var Body
     * @Serializer\Type("MessageX\Service\Email\ValueObject\Body")
     */
    private $body;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    private $cc;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    private $bcc;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $replyTo;

    /**
     * @var array
     * @Serializer\Type("array<string, array>")
     */
    private $substitutions;

    /**
     * @var Header[]
     * @Serializer\Type("array<MessageX\Service\Email\ValueObject\Header>")
     */
    private $headers;

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     */
    private $tags;

    /**
     * @var
     * @Serializer\Type("array<MessageX\Service\Email\ValueObject\Attachment>")
     */
    private $attachments;

    /**
     * @var Options
     * @Serializer\Type("MessageX\Service\Email\ValueObject\Options")
     */
    private $options;

    /**
     * SendEmailsJob constructor.
     * @param string $from
     * @param array $to
     */
    public function __construct($from, array $to)
    {
        $this->options  = new Options();
        $this->from     = $from;
        $this->to       = $to;
    }

    /**
     * @param $subject
     * @return Email
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @param Body $body
     * @return Email
     */
    public function addBody(Body $body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param $replyTo
     * @return Email
     */
    public function replyTo($replyTo)
    {
        $this->replyTo = $replyTo;

        return $this;
    }

    /**
     * @param array $cc
     * @return Email
     */
    public function addCc(array $cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * @param array $bcc
     * @return Email
     */
    public function addBcc(array $bcc)
    {
        $this->bcc = $bcc;

        return $this;
    }

    /**
     * @param $header
     * @param $value
     * @return Email
     */
    public function addHeader($header, $value)
    {
        $this->headers[] = new Header($header, $value);

        return $this;
    }

    /**
     * @param $tag
     * @return Email
     */
    public function addTag($tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * @param Attachment $attachment
     * @return Email
     */
    public function addAttachment(Attachment $attachment)
    {
        $this->attachments[] = $attachment;

        return $this;
    }

    /**
     * @param array $substitutions
     * @return $this
     */
    public function addSubstitutions(array $substitutions)
    {
        $this->substitutions = $substitutions;

        return $this;
    }
}
