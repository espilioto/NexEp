<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Show;

class ShowsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

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
                    $arrayToInsert[(int)$show->id]['id'] = "Not available";    
                if (isset($show->url))
                    $arrayToInsert[(int)$show->id]['url'] = $show->url;
                else 
                    $arrayToInsert[(int)$show->id]['url'] = "Not available";   
                if (isset($show->name))
                    $arrayToInsert[(int)$show->id]['name'] = $show->name;
                else 
                    $arrayToInsert[(int)$show->id]['name'] = "Not available";  
                if (isset($show->status))
                    $arrayToInsert[(int)$show->id]['status'] = $show->status;
                else 
                    $arrayToInsert[(int)$show->id]['status'] = "Not available";     
                if (isset($show->_links->nextepisode)) {
                    $temp = json_decode(file_get_contents($show->_links->nextepisode->href, true));
                    
                    if (isset($temp->airstamp))
                        $arrayToInsert[(int)$show->id]['nextepisode'] = $temp->airstamp;
                    else
                        $arrayToInsert[(int)$show->id]['nextepisode'] = "Not available";

                    if (isset($temp->season))
                        $arrayToInsert[(int)$show->id]['season'] = $temp->season;
                    else
                        $arrayToInsert[(int)$show->id]['season'] = "Not available";

                    if (isset($temp->number))
                        $arrayToInsert[(int)$show->id]['number'] = $temp->number;
                    else
                        $arrayToInsert[(int)$show->id]['number'] = "Not available";
                }
                else {
                    $arrayToInsert[(int)$show->id]['nextepisode'] = "Not available";
                    $arrayToInsert[(int)$show->id]['season'] = "Not available";
                    $arrayToInsert[(int)$show->id]['number'] = "Not available";
                }
                if (isset($show->_links->self->href))
                    $arrayToInsert[(int)$show->id]['tvmaze'] = $show->_links->self->href;
                else 
                    $arrayToInsert[(int)$show->id]['tvmaze'] = "Not available";    
                if (isset($show->externals->imdb))
                    $arrayToInsert[(int)$show->id]['imdb'] = $show->externals->imdb;
                else 
                    $arrayToInsert[(int)$show->id]['imdb'] = "Not available";  
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
                    $arrayToInsert[(int)$show->id]['summary'] = "Not available";   
                if (isset($show->updated))
                    $arrayToInsert[(int)$show->id]['updated'] = $show->updated;
                else 
                    $arrayToInsert[(int)$show->id]['updated'] = "Not available";   
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

    public function autocomplete(Request $request)
    {
        $term = $request->term;
        $data = Show::where('name', 'LIKE', '%'.$term.'%')
                ->take(5)
                ->get();
        $result = array();

        foreach ($data as $key => $value) {
            $result[] = ['id'=>$value->id, 
                        'label'=>$value->name, 
                        'image'=>$value->medium
            ];
        }

        // return response()->json($result);
        return $result;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
