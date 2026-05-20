<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\FAQ;

class ContactController extends Controller
{
    public function index()
    {
        $companyInfo = [];
        foreach (CompanyInfo::all() as $info) {
            $companyInfo[$info->type] = $info->value;
        }

        $faqs = FAQ::all();

        return view('contact', compact('companyInfo', 'faqs'));
    }
}
