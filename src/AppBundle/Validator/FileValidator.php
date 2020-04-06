<?php

namespace AppBundle\Validator;

use Symfony\Component\HttpFoundation\File\UploadedFile;

abstract class FileValidator
{
    private const ALLOWED_MEME_TYPE = 'text/xml';

    public static function validate(UploadedFile $file)
    {
        if ($file->getMimeType() !== self::ALLOWED_MEME_TYPE) {
            throw new \DomainException('Invalide format type for the file: ' . $file->getClientOriginalName());
        }
    }
}
