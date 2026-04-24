<?php

namespace lib\Helpers;

class ImageHelper
{
    /**
     *
     * Ресайз изображения
     *
     * @param int $imageId
     * @param int $width
     * @param int $height
     * @param int $resizeType
     * @return string
     */
    public static function resizeById(
        int $imageId,
        int $width = 0,
        int $height = 0,
        int $resizeType = BX_RESIZE_IMAGE_PROPORTIONAL
    ): string
    {
        $path = \CFile::GetFileArray($imageId);

        if (empty($path)) {
            return '';
        }

        $result = \CFile::ResizeImageGet(
            $imageId,
            ['width' => $width, 'height' => $height],
            $resizeType,
            true,
            false,
            false
        );

        return $result['src'] ?? $path;
    }

}