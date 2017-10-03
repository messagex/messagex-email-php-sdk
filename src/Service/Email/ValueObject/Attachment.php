<?php

/**
 * This file is part of the MessageX PHP SDK package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MessageX\Service\Email\ValueObject;

use InvalidArgumentException;
use JMS\Serializer\Annotation as Serializer;
use RuntimeException;
use SplFileObject;

/**
 * Class Attachment
 * @package MessageX\Service\Email\ValueObject
 * @author Silvio Marijic <silvio.marijic@smsglobal.com>
 */
final class Attachment
{
    /**
     * @var string Name of the attachment.
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @var string Content type of the attachment.
     * @Serializer\Type("string")
     */
    private $contentType;

    /**
     * @var string Base64 encoded content of the attachment.
     * @Serializer\Type("string")
     */
    private $content;

    /**
     * Attachment constructor.
     * @param string $name Name of the attachment.
     * @param string $contentType Content type of the attachment.
     * @param string $content Base64 encoded content of the attachment.
     */
    public function __construct($name, $contentType, $content)
    {
        $this->name             = $name;
        $this->contentType      = $contentType;
        $this->content          = base64_encode($content);
    }

    /**
     * @param string $path Absolute path to the file.
     * @return Attachment
     */
    public static function fromFile($path)
    {
        if (! is_string($path)) {
            throw new InvalidArgumentException(
                sprintf('Path has to be instance of string, %s given.', gettype($path))
            );
        }

        if (! file_exists($path)) {
            throw new RuntimeException(
                sprintf('File %s does not exist', $path)
            );
        }

        $file = new SplFileObject($path, 'r');

        if (! $file->isReadable()) {
            throw new RuntimeException(
                sprintf('File %s is not readable', $path)
            );
        }

        $content = $file->fread($file->getSize());

        if (false === $content) {
            throw new RuntimeException(
                sprintf('File %s can not be red', $path)
            );
        }

        return new self(
            $file->getFilename(),
            'application/octet-stream',
            $content
        );
    }

    /**
     * @return string Name of the attachment.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string Content type of the attachment.
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return string Base64 encoded content of the attachment.
     */
    public function getContent()
    {
        return $this->content;
    }
}
