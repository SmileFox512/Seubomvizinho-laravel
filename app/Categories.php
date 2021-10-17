<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Categories
{
    public static function get($all){
        $path = env('URL_DASHBOARD', null) . "/public/images/";

        // categories
        $cattext = "";
        if (!$all)
            $cattext = "AND categories.vendor=0";
        $categories = DB::select("SELECT categories.*, image_uploads.filename as image FROM categories
                                LEFT JOIN image_uploads ON image_uploads.id=categories.imageid
                                WHERE categories.visible=1 $cattext
                                ");
//        $categories = DB::table('categories')->where('categories.visible', "1")->
//            leftjoin("image_uploads", 'image_uploads.id', '=', 'categories.imageid')->
//            select('categories.*', 'image_uploads.filename as image');
//        if (!$all)
//            $categories = $categories->where('categories.vendor', '0');
//        $categories = $categories->get();
        foreach ($categories as &$value) {
            if ($value->image == null || $value->image == "")
                $value->image = $path . "noimage.png";
            else
                $value->image = $path . $value->image;
            if ($value->parent == '0')
                $value->parent = '-1';
        }
        return $categories;
    }

    public static function getCategoryName($categories, $cat, $catNames){
        foreach ($categories as &$value) {
            if ($value->id == $cat){
                $catNames[] = (object) array('id' => $value->id, 'name' => $value->name);
                $catNames = Categories::getCategoryName($categories, $value->parent, $catNames);
            }
        }
        return $catNames;
    }

    public static function getNameByFoodId($id){
        $foods = DB::table('foods')->where('id', '=', "$id")->get()->first();
        if ($foods == null)
            return "";
        $category = DB::table('categories')->where('id', '=', $foods->category)->get()->first();
        if ($category == null)
            return "";
        return $category->name;
    }

    public static function getIdByFoodId($id){
        $foods = DB::table('foods')->where('id', '=', "$id")->get()->first();
        if ($foods == null)
            return 0;
        return $foods->category;
    }

    public static function getCategoriesAndProductsForMainScreen($vendor, $parent){
        $market_search = '';
        if ($vendor != '0')
            $market_search = "foods.vendor=$vendor AND";
        // categories
        if ($vendor == '0') {
            $vendor_text = 'AND categories.vendor=0';
            $vendor_products = '';
        }else {
            $vendor_text = "AND (categories.vendor=$vendor OR categories.vendor='0')";
            $vendor_products = "AND foods.vendor=$vendor";
        }
        // select categories where present products (with search in subcategories)
        $categoriesAll = DB::select("SELECT categories.*, image_uploads.filename as filename FROM categories
                                                    LEFT JOIN image_uploads ON image_uploads.id=categories.imageid
                                                    WHERE
                                                    (categories.id IN
                                                    (SELECT categories.parent
                                                    FROM categories
                                                    LEFT JOIN image_uploads ON image_uploads.id=categories.imageid
                                                    LEFT JOIN foods ON foods.category=categories.id $vendor_products
                                                    WHERE visible='1' AND (parent=$parent OR parent IN (SELECT categories.id FROM categories WHERE parent=$parent)) $vendor_text
                                                    GROUP BY categories.id
                                                    HAVING COUNT(foods.id)>0
                                                    )
                                                    OR categories.id IN
                                                    (SELECT categories.id
                                                    FROM categories
                                                    LEFT JOIN image_uploads ON image_uploads.id=categories.imageid
                                                    LEFT JOIN foods ON foods.category=categories.id $vendor_products
                                                    WHERE visible='1' AND parent=$parent $vendor_text
                                                    GROUP BY categories.id
                                                    HAVING COUNT(foods.id)>0))
                                                    AND categories.parent=$parent");
        $path = env('URL_DASHBOARD', null);
        $path = $path . "/public/images/";
        foreach ($categoriesAll as &$value) {
            if ($value->filename == null || $value->filename == "")
                $value->filename = $path . "noimage.png";
            else
                $value->filename = $path . $value->filename;
            // products for category and sub category and sub sub category
            $value->foods = DB::select("SELECT foods.id, foods.name, foods.discountprice, foods.price, foods.restaurant, foods.images,
                            image_uploads.filename as image
                            FROM foods
                            LEFT JOIN image_uploads ON image_uploads.id=foods.imageid
                            WHERE $market_search (foods.category=$value->id OR foods.category IN (SELECT categories.id FROM categories WHERE parent=$value->id)
                                OR foods.category IN (SELECT categories.id FROM categories WHERE parent
                                    IN (SELECT categories.id FROM categories WHERE parent=$value->id))) AND foods.published=1
                                ORDER BY foods.updated_at DESC LIMIT 10
                            ");
            $value->foods = Foods::fill($value->foods);
        }
        return $categoriesAll;
    }
}
