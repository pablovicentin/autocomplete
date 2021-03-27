<?php

namespace App\Http\Controllers;

use App\Models\Autocomplete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutocompleteController extends Controller
{
    //for create controller - php artisan make:controller AutocompleteController

    function index()
    {
        return view('autocomplete');
    }

    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('apps_countries')
                ->where('country_name', 'LIKE', "%" . $query . "%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '<li><a href="#">' . $row->country_name . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
