<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ots;
use App\Models\Oth;
use App\Models\Otf;
use App\Models\Otd;
use App\Models\Otw;
use App\Models\Halal;
use App\Models\China;
use App\Models\Thai;
use App\Models\Bus;
use App\Models\Police;
use App\Models\Taxi;
use App\Models\Act;    
use App\Models\Hotel;
use App\Models\Hospital;
use App\Models\Banner;

class PagesController extends Controller
{
    public function event()
    {
        $events = Event::all();
        return view('event')->with(array('events'=>$events));
    }
    public function restaurant()
    {
        $chinas = China::all();
        return view('restaurant.china')->with(array('chinas'=>$chinas));
    }
    public function restaurants()
    {
        $thais = Thai::all();
        return view('restaurant.thai')->with(array('thais'=>$thais));
    }
    public function restaurantss()
    {
        $halals = Halal::all();
        return view('restaurant.halal')->with(array('halals'=>$halals));
    }
    public function of()
    {
        $otfoods = Otf::all();
        return view('otops.foodd')->with(array('otfoods'=>$otfoods));
    }
    public function ow()
    {
        $otwaters = Otw::all();
        return view('otops.water')->with(array('otwaters'=>$otwaters));
    }
    public function oh()
    {
        $otherbs = Oth::all();
        return view('otops.herb')->with(array('otherbs'=>$otherbs));
    }
    public function ot()
    {
        $otshirts = Ots::all();
        return view('otops.shirt')->with(array('otshirts'=>$otshirts));
    }
    public function od()
    {
        $otdecos = Otd::all();
        return view('otops.decoration')->with(array('otdecos'=>$otdecos));
    }
    public function hos()
    {
        $hospitals = Hospital::all();
        return view('stations.hosp')->with(array('hospitals'=>$hospitals));
    }
    public function pol()
    {
        $postations = Police::all();
        return view('stations.poli')->with(array('postations'=>$postations));
    }
    public function bus()
    {
        $buss = Bus::all();
        return view('stations.buss')->with(array('buss'=>$buss));
    }
    public function taxi()
    {
        $taxies = Taxi::all();
        return view('stations.taxi')->with(array('taxies'=>$taxies));
    }
    public function hotel()
    {
        $hotels = Hotel::all();
        return view('hotel')->with(array('hotels'=>$hotels));
    }
    public function ban()
    {
        $banners = Banner::all();
        return view('banners')->with(array('banners'=>$banners));
    }
    // public function ho()
    // {
        
    //     return view('Otop');
    // }
    // public function hs()
    // {
        
    //     return view('Station');
    // }
    // public function hc()
    // {
        
    //     return view('Currency');
    // }
   
}     
