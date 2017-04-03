<?php

namespace poloniex\api;

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

    /**
     * Returns the ticker for all markets.
     *
     * @return json
     */
    public function returnTicker() {
        return PoloniexAPIPublic::returnTicker();
    }

    /**
     * Returns the 24-hour volume for all markets, plus totals for primary
     * currencies.
     *
     * @return json
     */
    public function return24hVolume() {
        return PoloniexAPIPublic::return24hVolume();
    }

    /**
     * Returns the order book for a given market, as well as a sequence number
     * for use with the Push API and an indicator specifying whether the market
     * is frozen. You may set currencyPair to "all" to get the order books of
     * all markets.
     *
     * @param string $currencyPair In the 'BTC_NXT' format or 'all'.
     * @param int $depth Depth.
     *
     * @return json
     */
    public function returnOrderBook($currencyPair = "all", $depth = null) {
        return PoloniexAPIPublic::returnOrderBook($currencyPair, $depth);
    }

    /**
     * Returns the past 200 trades for a given market, or up to 50,000 trades
     * between a range specified in UNIX timestamps by the "start" and "end" GET
     * parameters.
     *
     * @param string $currencyPair In the 'BTC_NXT' format.
     * @param int $start Start timestamp.
     * @param int $end End timestamp.
     *
     * @return json
     */
    public function returnPublicTradeHistory($currencyPair, $start, $end) {
        return PoloniexAPIPublic::returnTradeHistory($currencyPair, $start, $end);
    }

    /**
     * Returns the last trades for a given market for a time period.
     *
     * @param string $currencyPair In the 'BTC_NXT' format.
     * @param int $timePeriod Time period in seconds.
     *
     * @return json
     */
    public function returnPublicLastTradeHistory($currencyPair, $timePeriod) {
        $time = time();

        return PoloniexAPIPublic::returnTradeHistory($currencyPair, $time - $timePeriod, $time);
    }

    /**
     * Returns candlestick chart data.
     * "Start" and "end" are given in UNIX timestamp format and used to specify the
     * date range for the data returned.
     *
     * @param string $currencyPair In the 'BTC_NXT' format.
     * @param int $period Candlestick period in seconds:
     *           valid values are 300, 900, 1800, 7200, 14400, and 86400.
     * @param int $start Start time in the UNIX timestamp format.
     * @param int $end End time in UNIX timestamp format.
     *
     * @return json
     */
    public function returnChartData($currencyPair, $period, $start, $end) {
        return PoloniexAPIPublic::returnChartData($currencyPair, $period, $start, $end);
    }

    /**
     * Returns information about currencies.
     *
     * @return json
     */
    public function returnCurrencies() {
        return PoloniexAPIPublic::returnCurrencies();
    }

    /**
     * Returns the list of loan offers and demands for a given currency,
     * specified by the "currency" GET parameter.
     *
     * @param string $currency Currency name.
     *
     * @return json
     */
    public function returnLoanOrders($currency = null) {
        return PoloniexAPIPublic::returnLoanOrders($currency);
    }

    //Authenticated Methods

    /**
     * {@inheritdoc}
     *
     * @param bool $reload Reload data from Poloniex or not.
     */
    public function returnBalances($reload = false) {
        if (is_null($this->balances) || $reload) {
            $this->balances = parent::returnBalances();
        }

        return $this->balances;
    }

    /**
     * {@inheritdoc}
     *
     * @param bool $reload Reload data from Poloniex or not.
     */
    public function returnCompleteBalances($account = null, $reload = false) {
        if (is_null($this->completeBalances) || $reload) {
            $this->completeBalances = parent::returnCompleteBalances($account);
        }

        return $this->completeBalances;
    }

    /**
     * {@inheritdoc}
     *
     * @param bool $reload Reload data from Poloniex or not.
     */
    public function returnDepositAddresses($reload = false) {
        if (is_null($this->depositAddresses) || $reload) {
            $this->depositAddresses = parent::returnDepositAddresses();
        }

        return $this->depositAddresses;
    }

}
