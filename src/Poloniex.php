<?php

namespace poloniex\api;

use poloniex\api\PoloniexAPIPublic;

/**
 * Poloniex API Wrapper.
 *
 * @category Poloniex API
 * @author Dmytro Zarezenko <dmytro.zarezenko@gmail.com>
 * @copyright (c) 2017, Dmytro Zarezenko
 *
 * @git https://github.com/dzarezenko/poloniex-api
 * @license http://opensource.org/licenses/MIT
 */
class Poloniex extends PoloniexAPITrading {

    private $balances = null;
    private $completeBalances = null;

    private $depositAddresses = null;

    public function returnTicker() {
        return PoloniexAPIPublic::returnTicker();
    }

    public function return24hVolume() {
        return PoloniexAPIPublic::return24hVolume();
    }

    public function returnOrderBook($currencyPair = "all", $depth = null) {
        return PoloniexAPIPublic::returnOrderBook($currencyPair, $depth);
    }

    public function returnPublicTradeHistory($currencyPair, $start, $end) {
        return PoloniexAPIPublic::returnTradeHistory($currencyPair, $start, $end);
    }

    public function returnPublicLastTradeHistory($currencyPair, $timePeriod) {
        $time = time();

        return PoloniexAPIPublic::returnTradeHistory($currencyPair, $time - $timePeriod, $time);
    }

    public function returnChartData($currencyPair, $period, $start, $end) {
        return PoloniexAPIPublic::returnChartData($currencyPair, $period, $start, $end);
    }

    public function returnCurrencies() {
        return PoloniexAPIPublic::returnCurrencies();
    }

    public function returnLoanOrders($currency = null) {
        return PoloniexAPIPublic::returnLoanOrders($currency);
    }

    //Authenticated Methods
    public function returnBalances($reload = false) {
        if (is_null($this->balances) || $reload) {
            $this->balances = parent::returnBalances();
        }

        return $this->balances;
    }

    public function returnCompleteBalances($account = null, $reload = false) {
        if (is_null($this->completeBalances) || $reload) {
            $this->completeBalances = parent::returnCompleteBalances($account);
        }

        return $this->completeBalances;
    }

    public function returnDepositAddresses($reload = false) {
        if (is_null($this->depositAddresses) || $reload) {
            $this->depositAddresses = parent::returnDepositAddresses();
        }

        return $this->depositAddresses;
    }

}
