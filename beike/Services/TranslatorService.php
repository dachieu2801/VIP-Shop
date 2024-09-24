<?php
/**
 * Translator.php
 *

 * @created    2023-09-04 15:31:49
 * @modified   2023-09-04 15:31:49
 */

namespace Beike\Services;

interface TranslatorService
{
    public function translate($from, $to, $text): string;

    public function batchTranslate($from, $to, $texts): array;

    public function mapCode($code): string;
}
