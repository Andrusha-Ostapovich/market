<?php

namespace App\Facades;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Currency
{
    // Отримати курси валют з API та кешувати їх на годину
    public function getExchangeRates()
    {
        return Cache::remember('exchange-rates', now()->addHour(), function () {
            $response = Http::get('https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11');

            if (!$response->successful()) {
                throw new \RuntimeException('Failed to fetch exchange rates from PrivatBank API.');
            }

            return $response->json();
        });
    }

    // Конвертувати ціну в обрану валюту
    public function convertToCurrency($price, $targetCurrency)
    {
        $exchangeRates = $this->getExchangeRates();

        foreach ($exchangeRates as $rate) {
            if ($rate['ccy'] === $targetCurrency) {
                $exchangeRate = $rate['buy'];
                return number_format($price / $exchangeRate, 2);
            }
        }

        throw new \InvalidArgumentException("Invalid target currency: $targetCurrency");
    }
}
