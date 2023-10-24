<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WishList;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class WishListController extends Controller
{
    // google user-agent using for scrapping so the websites will tend to return the SSR version of their pages
    const USERAGENT = 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/W.X.Y.Z Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';

    public function index()
    {
        $wishLists = Auth::user()->wishLists;
        return view('pages.my-wish-list', compact('wishLists'));
    }
    public function create(User $user, Request $request)
    {
        $request->validate([
            'title' => 'string|min:2|max:255',
            'url' => 'url',
            'priority' => 'required|integer|min:0|max:3',
        ]);

        // check for the link to be non-broken
        try {
            $response = Http::withHeaders([
                'User-Agent' => self::USERAGENT,
            ])->get($request->url);
        } catch (\Exception $e) {
            return back()->withErrors(['url' => 'در حال حاضر امکان بررسی لینک مورد نظر وجود ندارد.']);
        }
        if ($response->status() != 200) {
            return back()->withErrors(['url' => 'لینک مورد نظر وجود ندارد.']);
        }

        //getting openGraph attributes
        $ogAttributes = $this->getOGAttributes($response->body(), ['title', 'image', 'description']);

        WishList::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'url' => $request->url,
            'priority' => $request->priority,
            'price' => $request->price ? ($request->price / 1000) : null, //convert iranian rial to kiloriyal
        ]);
        return redirect()->back();
    }

    /**
     * Scrap the opengraph attributes from the html
     *
     * @param string $html the html to scrape from
     * @param array $keys the key names to extract as opengraph attributes from html
     * @return array the array consisting of the opengraph keys and values (if one not exists the value would be null)
     */
    private function getOGAttributes($html, $keys)
    {
        $ogAttributes = [];
        $crawler = (new Crawler($html));
        foreach ($keys as $ogKey) {
            $nodes = $crawler->filter("meta[property=\"og:$ogKey\"]");
            $ogAttributes[$ogKey] = $nodes->count() ? ($nodes->first()->attr('content')) : null;
        }
        return $ogAttributes;
    }

}
