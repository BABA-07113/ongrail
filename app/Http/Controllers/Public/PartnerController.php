<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $financiers = Partner::visible()->where('category', 'financier')->get();
        $techniques = Partner::visible()->where('category', 'technique')->get();
        $institutionnels = Partner::visible()->where('category', 'institutionnel')->get();

        return view('pages.partners.index', compact('financiers', 'techniques', 'institutionnels'));
    }
}
