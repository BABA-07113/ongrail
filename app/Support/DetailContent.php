<?php

namespace App\Support;

class DetailContent
{
    public static function render(?string $html): string
    {
        if ($html === null || trim($html) === '') {
            return '';
        }

        $blocks = static::topLevelBlocks($html);

        if (count($blocks) === 0) {
            return $html;
        }

        $segments = [];
        foreach ($blocks as $block) {
            if (trim($block) === '') {
                continue;
            }
            $type = static::isMedia($block) ? 'media' : 'text';
            $last = count($segments) - 1;
            if ($last >= 0 && $segments[$last]['type'] === $type) {
                $segments[$last]['html'] .= $block;
            } else {
                $segments[] = ['type' => $type, 'html' => $block];
            }
        }

        if (count($segments) === 1 && $segments[0]['type'] === 'text') {
            return $html;
        }

        $rows = [];
        $count = count($segments);
        for ($i = 0; $i < $count; $i += 2) {
            $rows[] = ['left' => $segments[$i], 'right' => $segments[$i + 1] ?? null];
        }

        $baseFlipped = $rows[0]['left']['type'] === 'media';
        $out = '';

        foreach ($rows as $index => $row) {
            $left = $row['left'];
            $right = $row['right'];

            if ($right === null) {
                $media = $left['type'] === 'media';
                $inner = static::mediaCell($left['html'], $media);
                $out .= '<div class="detail-row detail-row-solo">'
                    . '<div class="detail-cell detail-cell-solo' . ($media ? ' detail-cell-solo-media' : '') . '">'
                    . $inner
                    . '</div></div>';
                continue;
            }

            $text = $left['type'] === 'text' ? $left['html'] : $right['html'];
            $media = $left['type'] === 'media' ? $left['html'] : $right['html'];
            $flipped = ($index % 2 === 1) !== $baseFlipped;

            $out .= '<div class="detail-row' . ($flipped ? ' detail-row-flip' : '') . '">'
                . '<div class="detail-cell detail-cell-text">' . $text . '</div>'
                . '<div class="detail-cell detail-cell-media">' . static::mediaCell($media, true) . '</div>'
                . '</div>';
        }

        return $out;
    }

    private static function topLevelBlocks(string $html): array
    {
        $blocks = [];
        $len = strlen($html);
        $pos = 0;
        $text = '';
        $buffer = '';
        $stack = [];

        while ($pos < $len) {
            $lt = strpos($html, '<', $pos);
            if ($lt === false) {
                $chunk = substr($html, $pos);
                if ($stack === []) {
                    $text .= $chunk;
                } else {
                    $buffer .= $chunk;
                }
                break;
            }

            if ($lt > $pos) {
                $chunk = substr($html, $pos, $lt - $pos);
                if ($stack === []) {
                    $text .= $chunk;
                } else {
                    $buffer .= $chunk;
                }
            }

            $gt = strpos($html, '>', $lt);
            if ($gt === false) {
                $chunk = substr($html, $lt);
                if ($stack === []) {
                    $text .= $chunk;
                } else {
                    $buffer .= $chunk;
                }
                break;
            }

            $tagStr = substr($html, $lt, $gt - $lt + 1);
            $inner = trim(substr($tagStr, 1, -1));

            if ($inner === '' || substr($inner, 0, 1) === '!' || substr($inner, 0, 1) === '?') {
                if ($stack === []) {
                    $text .= $tagStr;
                } else {
                    $buffer .= $tagStr;
                }
                $pos = $gt + 1;
                continue;
            }

            if (substr($inner, 0, 1) === '/') {
                $name = strtolower(trim(preg_replace('/\s.*$/', '', substr($inner, 1))));
                if ($stack !== []) {
                    $buffer .= $tagStr;
                    if (end($stack) === $name) {
                        array_pop($stack);
                        if ($stack === []) {
                            $blocks[] = $buffer;
                            $buffer = '';
                        }
                    }
                } else {
                    $text .= $tagStr;
                }
                $pos = $gt + 1;
                continue;
            }

            $name = strtolower(preg_replace('/\s.*$/', '', $inner));
            $selfClosing = substr($inner, -1) === '/'
                || in_array($name, ['br', 'hr', 'img', 'input', 'meta', 'link', 'source', 'area', 'base', 'col', 'embed', 'param', 'track', 'wbr'], true);

            if ($stack === []) {
                if ($selfClosing) {
                    $blocks[] = $tagStr;
                } else {
                    $buffer = $tagStr;
                    $stack[] = $name;
                }
            } else {
                $buffer .= $tagStr;
                if (!$selfClosing) {
                    $stack[] = $name;
                }
            }
            $pos = $gt + 1;
        }

        if (trim($text) !== '') {
            $blocks[] = $text;
        }
        if (trim($buffer) !== '') {
            $blocks[] = $buffer;
        }

        return $blocks;
    }

    private static function isMedia(string $block): bool
    {
        if (preg_match('/^<(\w+)\b([^>]*)>/i', $block, $m)) {
            $tag = strtolower($m[1]);
            if ($tag === 'figure') {
                return true;
            }
            if (preg_match('/class="([^"]*)"/i', $m[2], $cm)) {
                $class = ' ' . $cm[1] . ' ';
                if (str_contains($class, 'wp-block-gallery')
                    || str_contains($class, 'wp-block-embed')
                    || str_contains($class, 'wp-block-columns')
                    || str_contains($class, 'wp-block-image')) {
                    return true;
                }
            }
        }

        return false;
    }

    private static function mediaCell(string $html, bool $wrapGrid): string
    {
        $hasComplex = str_contains($html, 'wp-block-gallery')
            || str_contains($html, 'wp-block-columns')
            || str_contains($html, 'wp-block-embed');

        $figures = preg_match_all('/<figure\b/i', $html);

        if ($wrapGrid && !$hasComplex && $figures >= 2) {
            return '<div class="detail-media-grid">' . $html . '</div>';
        }

        return $html;
    }
}
