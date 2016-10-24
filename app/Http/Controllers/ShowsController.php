<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ShowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i=0; $i<1000; $i++) {
            $arrayToInsert = null;
            $queryurl = 'http://api.tvmaze.com/shows?page=' . $i;
            
            try {
                $shows = json_decode(file_get_contents($queryurl, true));
            } catch (Exception $e) {
                return '<strong>Dead</strong> @ page ' . $i;
            }

            foreach ($shows as $show) {
                if (isset($show->id))
                    $arrayToInsert[(int)$show->id]['id'] = $show->id;
                else 
                    $arrayToInsert[(int)$show->id]['id'] = null;    
                if (isset($show->url))
                    $arrayToInsert[(int)$show->id]['url'] = $show->url;
                else 
                    $arrayToInsert[(int)$show->id]['url'] = null;   
                if (isset($show->name))
                    $arrayToInsert[(int)$show->id]['name'] = $show->name;
                else 
                    $arrayToInsert[(int)$show->id]['name'] = null;  
                if (isset($show->status))
                    $arrayToInsert[(int)$show->id]['status'] = $show->status;
                else 
                    $arrayToInsert[(int)$show->id]['status'] = null;     
                if (isset($show->_links->nextepisode)) {
                    $temp = json_decode(file_get_contents($show->_links->nextepisode->href, true));
                    
                    if (isset($temp->airstamp))
                        $arrayToInsert[(int)$show->id]['nextepisode'] = $temp->airstamp;
                    else
                        $arrayToInsert[(int)$show->id]['nextepisode'] = null;

                    if (isset($temp->season))
                        $arrayToInsert[(int)$show->id]['season'] = $temp->season;
                    else
                        $arrayToInsert[(int)$show->id]['season'] = null;

                    if (isset($temp->number))
                        $arrayToInsert[(int)$show->id]['number'] = $temp->number;
                    else
                        $arrayToInsert[(int)$show->id]['number'] = null;
                }
                else {
                    $arrayToInsert[(int)$show->id]['nextepisode'] = null;
                    $arrayToInsert[(int)$show->id]['season'] = null;
                    $arrayToInsert[(int)$show->id]['number'] = null;
                }
                if (isset($show->_links->self->href))
                    $arrayToInsert[(int)$show->id]['tvmaze'] = $show->_links->self->href;
                else 
                    $arrayToInsert[(int)$show->id]['tvmaze'] = null;    
                if (isset($show->externals->imdb))
                    $arrayToInsert[(int)$show->id]['imdb'] = $show->externals->imdb;
                else 
                    $arrayToInsert[(int)$show->id]['imdb'] = null;  
                if (isset($show->image->medium))
                    $arrayToInsert[(int)$show->id]['medium'] = $show->image->medium;
                else 
                    $arrayToInsert[(int)$show->id]['medium'] = null;    
                if (isset($show->image->original))
                    $arrayToInsert[(int)$show->id]['original'] = $show->image->original;
                else 
                    $arrayToInsert[(int)$show->id]['original'] = null;  
                if (isset($show->summary))
                    $arrayToInsert[(int)$show->id]['summary'] = $show->summary;
                else 
                    $arrayToInsert[(int)$show->id]['summary'] = null;   
                if (isset($show->updated))
                    $arrayToInsert[(int)$show->id]['updated'] = $show->updated;
                else 
                    $arrayToInsert[(int)$show->id]['updated'] = null;   
            }

            echo "Finished parsing page " . $i;

            foreach ($arrayToInsert as $show) {
                \DB::table('shows')->insert([
                    'id' => $show['id'],
                    'url' => $show['url'],
                    'name' => $show['name'],
                    'status' => $show['status'],
                    'nextepisode' => $show['nextepisode'],
                    'season' => $show['season'],
                    'number' => $show['number'],
                    'tvmaze' => $show['tvmaze'],
                    'imdb' => $show['imdb'],
                    'medium' => $show['medium'],
                    'original' => $show['original'],
                    'summary' => $show['summary'],
                    'updated' => $show['updated']
                ]);
            }
            echo ". Finished inserting page " . $i . "<br>";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
