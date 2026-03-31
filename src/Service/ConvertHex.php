<?php

declare(strict_types=1);

namespace Pyreweb\Chroma\Service;

use ArrayObject;

use Pyreweb\Chroma\Service\Convert;

class ConvertHex extends ArrayObject
{
	public function __construct(private string $hex, private float $alpha = 1.0)
	{
		parent::__construct([
			'rgb' => Convert::hexToRgb($hex),
			'rgba' => Convert::hexToRgba($hex, $alpha),
			'hsl' => Convert::hexToHsl($hex),
			'oklch' => Convert::hexToOklch($hex),
			'cmyk' => Convert::hexToCmyk($hex),
		]);
	}

	public function toRgb(): string {
		return $this['rgb'];
	}

	public function toRgba(): string {
		return $this['rgba'];
	}

	public function toHsl(): string {
		return $this['hsl'];
	}

	public function toOklch(): string {
		return $this['oklch'];
	}
	
	public function toCmyk(): string {
		return $this['cmyk'];
	}
}