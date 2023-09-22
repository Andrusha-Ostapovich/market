<?php

namespace App\Services;

class CurrencyConversionService
{
    public function getExchangeRates()
    {
        $url = 'https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11';

        // Отримати JSON-відповідь з API ПриватБанку
        $response = file_get_contents($url);

        if (!$response) {
            throw new \RuntimeException('Failed to fetch exchange rates from PrivatBank API.');
        }

        // Розпарсити JSON-відповідь
        $rates = json_decode($response, true);

        if (!$rates || empty($rates)) {
            throw new \RuntimeException('Failed to parse exchange rates data.');
        }

        // Повернути курси обміну валют у вигляді асоціативного масиву
        $exchangeRates = [];

        foreach ($rates as $rate) {
            $exchangeRates[$rate['ccy']] = [
                'buy' => $rate['buy'],
                'sale' => $rate['sale'],
            ];
        }

        return $exchangeRates;
    }

    public function convertToCurrency($price, $targetCurrency)
    {
        $exchangeRates = $this->getExchangeRates();

        if (!isset($exchangeRates[$targetCurrency])) {
            throw new \InvalidArgumentException("Invalid target currency: $targetCurrency");
        }

        $exchangeRate = $exchangeRates[$targetCurrency]['buy'];

        return number_format($price / $exchangeRate, 2); // Округлення до двох знаків після коми
    }
}
