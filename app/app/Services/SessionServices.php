<?php

namespace App\app\Services;

class SessionServices
{

//    public function useFilters($books, $filters)
//    {
//        $filtersFromSession = $this->filtersFromSession();
//        unset($filters['_token']);
//        if ($filters != $filtersFromSession){
//
//        }
//
//        return $books;
//    }

    public static function filtersToSession($filters)
    {
//        $session =session();
//        $filters[1] = session('key');

//        $filters = null;
//        if (isset($session)){
//            $filters ['booksOnPage'] = session('booksOnPage');
//            $filters ['sorting'] = session('sorting');
//            $filters ['displayingByYear'] = session('displayingByYear');
//            $filters ['text'] = session('text');
//        }

//        session(['booksOnPage' => $filters['booksOnPage']]);
        session(['sorting' => $filters['sorting']]);
        session(['filtering' => $filters['filtering']]);
        session(['pageNumber' => 1]);

        return;
    }

    public static function filtersFromSession()
    {
            $filters ['sorting'] = session('sorting');
            $filters ['filtering'] = session('filtering');
            $filters ['pageNumber'] = session('pageNumber');

        return $filters;
    }

    public static function loadInitialData()
    {
        $filters['sorting'] = 'none';
        $filters['filtering'] = 'all';

        session(['sorting' => $filters['sorting']]);
        session(['filtering' => $filters['filtering']]);
        session(['pageNumber' => 1]);

        return $filters;
    }

}
