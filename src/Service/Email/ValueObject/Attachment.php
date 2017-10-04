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
use MessageX\Service\Email\Exception\FileTypeNotAllowed;
use MessageX\Service\Email\ValueObject\Attachment\MimeType;
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
     * @var array
     */
    private static $unallowedFileTypes = [
        'ade', 'adp', 'bat', 'chm', 'cmd', 'com', 'cpl', 'exe', 'hta',
        'ins', 'isp', 'jar', 'jse', 'lib', 'lnk', 'mde', 'msc', 'msi',
        'msp', 'mst', 'nsh', 'pif', 'scr', 'sct', 'shb', 'sys', 'vb',
        'vbe', 'vbs', 'vxd', 'wsc', 'wsf', 'wsh','js'
    ];

    /**
     * @var string Name of the attachment.
     * @Serializer\Type("string")
     */
    private $name;

    /**
     * @var string Base64 encoded content of the attachment.
     * @Serializer\Type("string")
     */
    private $content;

    /**
     * @var string Content type of the attachment.
     * @Serializer\Type("string")
     */
    private $mime;

    /**
     * Attachment constructor.
     * @param string $name Name of the attachment.
     * @param string $mime Mime type of the attachment.
     * @param string $content Base64 encoded content of the attachment.
     */
    public function __construct($name, $mime, $content)
    {
        $this->name     = $name;
        $this->mime     = $mime;
        $this->content  = base64_encode($content);
    }

    /**
     * @param string $path Absolute path to the file.
     * @return Attachment
     * @throws FileTypeNotAllowed
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
        if (in_array($file->getExtension(), self::$unallowedFileTypes)) {
            throw new FileTypeNotAllowed(
                sprintf(
                    'Attachment file type % is not allowed',
                    $file->getExtension()
                )
            );
        }

        $mime = new MimeType($file->getExtension());

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
            $mime,
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
