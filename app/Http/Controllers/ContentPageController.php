<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentPage;

class ContentPageController extends Controller
{
    public function addContent($contentPage, $prefix, $request)
    {
        $contentPage->id = $prefix; 
        $contentPage->user_id = auth()->id();
        $contentPage->assets = request('gjs-assets');
        $contentPage->css = request('gjs-css');  
        $contentPage->styles = request('gjs-styles');
        $contentPage->html = request('gjs-html');
        $contentPage->components = request('gjs-components');

        $contentPage->save();
    }

    public function store(Request $request)
    {
        //prefix = what is contained in main div (ID) -> what makes it a unique identifier
        // $prefix = $request->route('id');
        $prefix = request('id');

        $entry = ContentPage::where('id', '=', $prefix)->first();

        if ($entry === null) {
            //create new entry
            $contentPage = new ContentPage();
        } else {
            $contentPage = $entry;
        }

        Self::addContent($contentPage, $prefix, $request);

        return redirect()->back();
    }

    public function load(Request $request)
    {
        $prefix = request('id');

        $contentPage = ContentPage::where('id', '=', $prefix)->first(); dd($contentPage);

        if ($contentPage === null) {
            $contentPage = new ContentPage();
            Self::addContent($contentPage, $prefix, $request);
        }

        $labels = ['assets', 'css', 'styles', 'html', 'components', ]; 

        $json = [
            'id' => request('id'),
            'gjs-assets' =>  $contentPage->getAttribute('assets'),
            'gjs-css' =>  $contentPage->getAttribute('css'),
            'gjs-styles' =>  $contentPage->getAttribute('styles'),
            'gjs-html' =>  $contentPage->getAttribute('html'),
            'gjs-components' =>  $contentPage->getAttribute('components')
        ];

        header('Content-Type: application/json');

        return json_encode($json);
    }
}
