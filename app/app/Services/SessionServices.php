<?php

namespace App\app\Services;

class SessionServices
{
    /**
     * Performs saving filters data to SESSION.
     *
     * @param $filters
     */
    public static function filtersToSession($filters)
    {
        session(['sorting' => $filters['sorting']]);
        session(['filtering' => $filters['filtering']]);
        session(['pageNumber' => 1]);

        return;
    }

    /**
     * Performs saving page number to SESSION.
     *
     * @param $pageNumber
     */
    public static function pageNumberToSession($pageNumber)
    {
        session(['pageNumber' => $pageNumber]);

        return;
    }

    /**
     * Gets filters data from SESSION.
     *
     * @return mixed
     */
    public static function filtersFromSession()
    {
            $filters ['sorting'] = session('sorting');
            $filters ['filtering'] = session('filtering');
            $filters ['pageNumber'] = session('pageNumber');

        return $filters;
    }

    /**
     * Performs load initial data to filters and SESSION.
     *
     * @return mixed
     */
    public static function loadInitialData()
    {
        $filters['sorting'] = 'none';
        $filters['filtering'] = 'all';
        $filters ['pageNumber'] = 1;

        session(['sorting' => $filters['sorting']]);
        session(['filtering' => $filters['filtering']]);
        session(['pageNumber' => 1]);

        return $filters;
    }

}
