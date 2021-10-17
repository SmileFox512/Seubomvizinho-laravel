<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ImageUpload;
use Auth;
use App\Settings;
use App\Categories;
use App\Lang;
use App\Foods;
use App\Banners;

class MainController extends Controller
{
    public function home(Request $request)
    {
        $search = $request->input('search') ?: "";
        return MainController::getPage(1, true, 0, 0, 100000000, 0, $search, true, '0', "");
    }

    public function main(Request $request)
    {
        $search = $request->input('search') ?: "";
        return MainController::getPage(1, true, 0, 0, 100000000, 0, $search, false, 0, "");
    }

    public function shop(Request $request)
    {
        $search = $request->input('search') ?: "";
        $id = $request->input('id') ?: "0";
        return MainController::getPage(1, true, 0, 0, 100000000, 0, $search, true, $id, "");
    }

    public function category(Request $request){
        $cat = $request->input('cat') ?: -1;
        $market = $request->input('market', '0') ?: '0';
        $city = $request->input('city') ?: "";
        return MainController::getPage(1, true, 0, 0, 100000000, $cat, "", "", $market, $city);
    }

    public function foodsGoPage(Request $request)
    {
        $home = $request->input('home', true) ?: true;
        $page = $request->input('page') ?: 1;
        $sort = $request->input('sort') ?: 0;
        $foodMinPrice = $request->input('foodMinPrice') ?: 0;
        $foodMaxPrice = $request->input('foodMaxPrice') ?: 0;
        $cat = $request->input('cat');
        $search = $request->input('search') ?: "";
        $market = $request->input('market');
        $city = $request->input('city') ?: "";
        return MainController::getPage($page, false, $sort, $foodMinPrice, $foodMaxPrice, $cat, $search, $home, $market, $city);
    }

    public static function getPage($page, $view, $sort, $foodMinPrice, $foodMaxPrice, $cat, $search, $home, $market, $city){
        $path = Settings::getPath();
        if ($path == null)
            if ($view)
                return "Set URL_DASHBOARD variable in .env file";

        $orderby = "";
        if ($sort == 1) // by date
            $orderby = "ORDER BY updated_at DESC";
        if ($sort == 2) // by price
            $orderby = "ORDER BY price ASC";
        if ($sort == 3) // by price
            $orderby = "ORDER BY price DESC";
        $uselike = "no";
        if ($search != "")
            $uselike = "true";

        $market_search = "";
        if ($market != '0')
            $market_search = " AND restaurant=$market";

        $offset = (($page - 1) * 12);
        $zap = "SELECT foods.*, image_uploads.filename AS image FROM foods
                    LEFT JOIN image_uploads ON image_uploads.id=foods.imageid
                    LEFT JOIN restaurants ON restaurants.id=foods.restaurant
                    WHERE foods.published=1 AND price>=$foodMinPrice AND price<=$foodMaxPrice AND foods.name LIKE '%$search%' AND
                     (foods.category=$cat OR foods.category IN (SELECT categories.id FROM categories WHERE parent=$cat)
                                OR foods.category IN (SELECT categories.id FROM categories WHERE parent
                                    IN (SELECT categories.id FROM categories WHERE parent=$cat)))
                                    $market_search
                                    AND (restaurants.city LIKE '%$city%' OR restaurants.city='')
                    GROUP BY foods.id $orderby ";
        $foods = DB::select("$zap LIMIT 12 OFFSET $offset");
        $count = count(DB::select($zap));

        // min - max
        $count2 = count($minmax = DB::select("SELECT MIN(foods.price) AS minPrice, MAX(foods.price) AS maxPrice FROM foods
                    LEFT JOIN restaurants ON restaurants.id=foods.restaurant
                    WHERE foods.published=1 AND foods.name LIKE '%$search%' AND
                     (foods.category=$cat OR foods.category IN (SELECT categories.id FROM categories WHERE parent=$cat)
                                OR foods.category IN (SELECT categories.id FROM categories WHERE parent
                                    IN (SELECT categories.id FROM categories WHERE parent=$cat)))
                                    $market_search
                                    AND (restaurants.city LIKE '%$city%' OR restaurants.city='')
                                    $orderby
                        "));
        $min = 100000000;
        $max = 0;
        if ($count2 != 0) {
            $min = $minmax[0]->minPrice;
            $max = $minmax[0]->maxPrice;
        }
        if ($min == '') $min = 0;
        if ($max == '') $max = 0;

        // fill
        $foods = Foods::fill($foods);
        // count
        if ($foods == "Set URL_DASHBOARD variable in .env file")
            $count_current = 0;
        else
            $count_current = count($foods);
        $t = $count/12;
        if ($count/12 > 0)
            $t++;
        //
        // categories
        //
        $categories = Categories::get(false);
        $catNames = array();
        $catNames = Categories::getCategoryName($categories, $cat, $catNames);
        $catNames = array_reverse($catNames);

        $vendor = 0;
        $marketName = "";
        if ($market != '0') {
            $ts = DB::table("users")->where('vendor', $market)->get()->first();
            if ($ts != null)
                $vendor = $ts->id;
            $ts = DB::table("restaurants")->where('id', $market)->get()->first();
            if ($ts != null)
                $marketName = $ts->name;
        }
        // subcategories
        $subcat = Categories::getCategoriesAndProductsForMainScreen($vendor, $cat);
        //
        if ($view) {
            if ($home) {
                $categoriesAll = Categories::getCategoriesAndProductsForMainScreen($vendor, '0');

                $ret = [
                    'uselike' => $uselike,
                    'cat' => $cat,
                    'foods' => $foods,
                    'count_current' => $count_current,
                    'count' => $count,
                    'page' => $page,
                    'pages' => (int)$t,
                    'min' => $min,
                    'max' => $max,
                    'catNames' => $catNames,
                    'subcat' => $subcat,
                    'subcatCount' => count($subcat),
                    'title' => Lang::get(79), // "Welcome"
                    'banners1' => Banners::getBanners1($vendor),
                    'banners2' => Banners::getBanners2(),
                    'categoriesAll' => $categoriesAll,
                    'market' => $market,
                    'marketName' => $marketName,
                ];
                return view('home', $ret);
            }
            return view('main', [
                'uselike' => $uselike,
                'cat' => $cat,
                'count_current' => $count_current,
                'count' => $count,
                'page' => $page,
                'pages' => (int)$t,
                'min' => $min,
                'max' => $max,
                'catNames' => $catNames,
                'subcat' => $subcat,
                'subcatCount' => count($subcat),
                'title' => Lang::get(79), // "Welcome"
                'market' => $market,
                'marketName' => $marketName,
                'foods' => $foods,
            ]);
        }else
            return response()->json([
                'uselike' => $uselike,
                'cat' => $cat,
                'foods' => $foods,
                'count_current' => $count_current,
                'count' => $count,
                'page' => $page,
                'pages' => (int) $t,
                'path' => $path,
                'min' => $min,
                'max' => $max,
            ], 200);
    }

    public function foodsInfo(Request $request){
        $id = $request->input('id') ?: 0;
        //
        return response()->json([
            'food' => MainController::getFood($id)
        ], 200);
    }

    public function setLang(Request $request){
        $lang = $request->input('lang') ?: 0;
        Lang::setDefLang($lang);
        return \Redirect::to('/');
    }

    public function details(Request $request){
        $id = $request->input('id');
        $food = MainController::getFood($id);
        //
        $cat = Categories::getIdByFoodId($id);
        $categories = Categories::get(true);
        $catNames = array();
        $catNames = Categories::getCategoryName($categories, $cat, $catNames);
        $catNames = array_reverse($catNames);
        //
        $marketName = "";
        $market = $request->input('market', '0') ?: '0';
        if ($market != '0') {
            $ts = DB::table("restaurants")->where('id', $market)->get()->first();
            if ($ts != null)
                $marketName = $ts->name;
        }
        return view('details', [
            'food' => $food,
            'catNames' => $catNames,
            'cat' => $cat,
            'market' => $market,
            'marketName' => $marketName,
        ]);
    }

    public static function getFood($id){
        //
        $food = DB::table('foods')->where("foods.id", $id)->
            leftjoin("image_uploads", 'image_uploads.id', '=', 'foods.imageid')->
            select('foods.*', 'image_uploads.filename as image')->get();

        Foods::fill($food);

        return ($food != null ? $food->first() : null);
    }


}
