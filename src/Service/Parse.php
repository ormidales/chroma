<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

/**
 * @author Hugo Doueil <hugo@pyreweb.com>
 * @author Pyréweb <contact@pyreweb.com>
 */
class Parse
{
	public const HEX_SHORT_LENGTH = 3;

	public static function hex(string $hex): array
	{
		$hex = ltrim($hex, '#');

		if (strlen($hex) === self::HEX_SHORT_LENGTH) {
			$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
		}

		return [
			hexdec(substr($hex, 0, 2)),
			hexdec(substr($hex, 2, 2)),
			hexdec(substr($hex, 4, 2)),
		];
	}

	public static function rgb(string $rgb): array
	{
		preg_match('/rgba?\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})(?:,\s*(\d*\.?\d+))?\)/', $rgb, $matches);

		return [
			(int) $matches[1],
			(int) $matches[2],
			(int) $matches[3],
		];
	}

	public static function rgba(string $rgba): array
	{
		preg_match('/rgba?\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})(?:,\s*(\d*\.?\d+))?\)/', $rgba, $matches);

		return [
			(int) $matches[1],
			(int) $matches[2],
			(int) $matches[3],
			isset($matches[4]) ? (float) $matches[4] : 1.0,
		];
	}
}