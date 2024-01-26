<?php

namespace Openexchange\DTO;

final class Latest
{
	private string $base = '';
	private int $timestamp = 0;
	private array $rates = [];
	
	public function __construct(string $base, int $timestamp, array $rates)
	{
		$this->base = $base;
		$this->timestamp = $timestamp;
		$this->rates = $rates;
	}	
	
	public function getBase()
	{
		return $this->base;
	}
	
	public function getRates()
	{
		return $this->rates;
	}
	
	public function getTimestamp()
	{
		return $this->timestamp;
	}
}
