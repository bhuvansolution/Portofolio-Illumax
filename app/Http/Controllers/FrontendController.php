<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\GalleryPage;
use App\Models\HomePage;
use App\Models\OurPartner;
use App\Models\OurProject;
use App\Models\OurService;
use App\Models\PortofolioPage;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $ourservice = OurService::firstOrFail();

        $ourservice->title = json_decode($ourservice->title);
        $ourservice->description = json_decode($ourservice->description);
        $ourservice->engtitle = json_decode($ourservice->engtitle);
        $ourservice->engdescription = json_decode($ourservice->engdescription);
        return view('home.index', [
            'title' => 'Home ',
            'aboutus' => Aboutus::firstOrFail(),
            'ourservice' => $ourservice,
            'partner' => OurPartner::all(),
            'ourproject' => OurProject::all(),
            'contacts' => Contact::firstOrFail(),
            'banner' => HomePage::firstOrFail()
        ]);
    }
    public function aboutus()
    {
        return view('home.about', [
            'title' => 'About ',
            'about' => Aboutus::firstOrFail(),
            'contacts' => Contact::firstOrFail(),
        ]);
    }
    public function services()
    {
        $ourservice = OurService::firstOrFail();

        $ourservice->title = json_decode($ourservice->title);
        $ourservice->description = json_decode($ourservice->description);
        $ourservice->engtitle = json_decode($ourservice->engtitle);
        $ourservice->engdescription = json_decode($ourservice->engdescription);
        return view('home.service', [
            'title' => 'Services ',
            'ourservice' => $ourservice,
            'contacts' => Contact::firstOrFail(),
        ]);
    }

    public function contacts()
    {
        return view('home.contacts', [
            'title' => 'Contacts ',
            'contacts' => Contact::firstOrFail(),
        ]);
    }
    public function portofolio()
    {
        return view('home.portofolio', [
            'title' => 'Portfolio ',
            'contacts' => Contact::firstOrFail(),
            'portopage' => PortofolioPage::firstOrFail(),
        ]);
    }
    public function gallery()
    {
        return view('home.gallery', [
            'title' => 'Gallery ',
            'gallery' => Gallery::all(),
            'contacts' => Contact::firstOrFail(),
            'gallerypage' => GalleryPage::firstOrFail(),
        ]);
    }
}
