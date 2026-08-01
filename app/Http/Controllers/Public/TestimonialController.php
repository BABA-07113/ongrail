<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::visible()->paginate(12);
        return view('pages.testimonials.index', compact('testimonials'));
    }
}
