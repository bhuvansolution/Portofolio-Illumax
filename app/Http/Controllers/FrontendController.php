<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\GalleryPage;
use App\Models\HomePage;
use App\Models\OurPartner;
use App\Models\OurPortofolio;
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

        $whychoose = WhyChoose::firstOrFail();
        $whychoose->gambar = json_decode($whychoose->gambar);
        $whychoose->title = json_decode($whychoose->title);
        $whychoose->description = json_decode($whychoose->description);
        $whychoose->engtitle = json_decode($whychoose->engtitle);
        $whychoose->engdescription = json_decode($whychoose->engdescription);
        return view('home.index', [
            'title' => 'Home ',
            'aboutus' => Aboutus::firstOrFail(),
            'ourservice' => $ourservice,
            'whychoose' => $whychoose,
            'partner' => OurPartner::where('status', 'Publish')->get(),
            'ourproject' => OurProject::where('status', 'Publish')->get(),
            'contacts' => Contact::firstOrFail(),
            'banner' => HomePage::firstOrFail(),
            'porto' => OurPortofolio::where('status', 'Publish')->get(),
            'about' => Aboutus::firstOrFail(),
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
        $ourservice->text = json_decode($ourservice->text);
        $ourservice->engtext = json_decode($ourservice->engtext);
        $ourservice->icon = json_decode($ourservice->icon);
        return view('home.service', [
            'title' => 'Services ',
            'ourservice' => $ourservice,
            'contacts' => Contact::firstOrFail(),
            'about' => Aboutus::firstOrFail(),
        ]);
    }

    public function contacts()
    {
        return view('home.contacts', [
            'title' => 'Contacts ',
            'contacts' => Contact::firstOrFail(),
            'about' => Aboutus::firstOrFail(),
        ]);
    }
    public function portofolio()
    {
        return view('home.portofolio', [
            'title' => 'Portfolio ',
            'contacts' => Contact::firstOrFail(),
            'portopage' => PortofolioPage::firstOrFail(),
            'porto' => OurPortofolio::where('status', 'Publish')->paginate(12),
            'news' => OurPortofolio::where('status', 'Publish')->orderBy('created_at', 'desc')->first(),
            'about' => Aboutus::firstOrFail(),
        ]);
    }
    public function gallery()
    {
        return view('home.gallery', [
            'title' => 'Gallery ',
            'gallery' => Gallery::where('status', 'Publish')->get(),
            'contacts' => Contact::firstOrFail(),
            'gallerypage' => GalleryPage::firstOrFail(),
            'about' => Aboutus::firstOrFail(),
        ]);
    }
}
