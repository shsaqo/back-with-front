<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 'url', 'color', 'name', 'description',
        'description_color', 'photo', 'sale', 'old_price',
        'price', 'count', 'sale_time_one_status', 'sale_time_two_status',
        'how_to_order_type', 'last_name', 'last_photo', 'phone_type',
        'info_short_description_important_text', 'youtube_link',
        'alert_1', 'alert_2', 'alert_3', 'alert_4', 'custom', 'color_two'
    ];


    public static function saveProduct(Request $request)
    {
        DB::beginTransaction();
        try {
            self::photo($request, 'image', 'photo');
            self::last_photo($request);
            self::isLastName($request);
            self::old_price($request);
            $product = self::create($request->all());
            self::shortDescription($request, $product);
            self::longDescription($request, $product);
            self::saveMultiSelectFiles($request, $product);
//            self::saveSliderPhoto($request, $product);
            self::addComment($request, $product);
            self::saleEndTime($product);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }

    }

    public static function saleEndTime($product)
    {
        $product->SaleTime()->create([
            'end_date' => now()->addDays(1)
        ]);
    }

    public static function photo(Request $request, string $input, string $output): void
    {
        if ($request->hasFile($input)) {
            $path = $request->file($input)->store('product-photo');
            $request->request->add([$output => $path]);
        }
    }

    public static function last_photo(Request $request): void
    {
        if ($request->hasFile('last_image')) {
            $path = $request->file('last_image')->store('product-photo');
            $request->request->add(['last_photo' => $path]);
        } else {
            $path = $request->file('image')->store('product-photo');
            $request->request->add(['last_photo' => $path]);
        }
    }

    public static function updateLastPhoto(Request $request)
    {
        if ($request->hasFile('last_image')) {
            $path = $request->file('last_image')->store('product-photo');
            $request->request->add(['last_photo' => $path]);
        }
    }

    public static function isLastName(Request $request): void
    {
        if (!isset($request->last_name)) {
            $request->request->add(['last_name' => $request->name]);
        }
    }

    public static function old_price(Request $request): void
    {
        $old_price = $request->price * 100 / (100 - $request->sale);
        $request->request->add(['old_price' => $old_price]);
    }

    public static function shortDescription(Request $request, $product, $update = false): void
    {
        if ($request->deleteShortPhoto == 'deleteShortPhoto' && !$request->hasFile('info_short_description_image')) {
            $request->request->add(['info_short_description_photo' => null]);
        } else {
            self::photo($request, 'info_short_description_image', 'info_short_description_photo');
        }

        if ($update) {
            $product->infoShortDescription()->where('info_short_description_text', null)->update($request->only(
                'info_short_description_photo', 'info_short_description_type', 'info_short_description'));

            if (isset($request->info_short_description_text) && count($request->info_short_description_text)) {
                $product->infoShortDescription()->where('info_short_description_text', '!=', null)->delete();
                foreach ($request->info_short_description_text as $info_short_description_text) {
                    $product->infoShortDescription()->create(['info_short_description_text' => $info_short_description_text]);
                }
            }
        } else {
            $product->infoShortDescription()->create($request->except('info_short_description_text'));
            if (isset($request->info_short_description_text) && count($request->info_short_description_text)) {
                foreach ($request->info_short_description_text as $info_short_description_text) {
                    $product->infoShortDescription()->create(['info_short_description_text' => $info_short_description_text]);
                }
            }
        }

    }

    public static function longDescription(Request $request, $product, $update = false): void
    {
        if ($request->deleteLongPhoto == 'deleteLongPhoto' && !$request->hasFile('info_long_description_image')) {
            $request->request->add(['info_long_description_photo' => null]);
        } else {
            self::photo($request, 'info_long_description_image', 'info_long_description_photo');
        }
        if ($update) {
            $product->infoLongDescription()->where('info_long_description_text', null)->update($request->only(
                'info_long_description', 'info_long_description_photo', 'info_long_description_type'));

            if (isset($request->info_long_description_text) && count($request->info_long_description_text)) {
                $product->infoLongDescription()->where('info_long_description_text', '!=', null)->delete();
                foreach ($request->info_long_description_text as $info_long_description_text) {
                    $product->infoLongDescription()->create(['info_long_description_text' => $info_long_description_text]);
                }
            }
        } else {
            $product->infoLongDescription()->create($request->except('info_long_description_text'));
            if (isset($request->info_long_description_text) && count($request->info_long_description_text)) {
                foreach ($request->info_long_description_text as $info_long_description_text) {
                    $product->infoLongDescription()->create(['info_long_description_text' => $info_long_description_text]);
                }
            }
        }

    }

    public static function saveSliderPhoto(Request $request, $product, $update = false): void
    {
        if ($update) {
            if ($request->hasFile('slider_image')) {
                foreach ($request->file('slider_image') as $photo) {
                    $path = $photo->store('product-photo');
                    $product->sliderPhoto()->Create(['slider_photo' => $path]);
                }
            }
        } else {
            if ($request->hasFile('slider_image')) {
                foreach ($request->file('slider_image') as $photo) {
                    $path = $photo->store('product-photo');
                    $product->sliderPhoto()->create(['slider_photo' => $path]);
                }
            }
        }

    }

    public static function saveMultiSelectFiles (Request $request, $product) {
        if (isset($request->multiSelectPath) && count($request->multiSelectPath)) {
            $data = array();
            $strArray = explode(',',$request->multiSelectPath[0]);
            foreach ($strArray as $item) {
                array_push($data, ['slider_photo' => $item]);
            }
            $product->sliderPhoto()->createMany($data);
        }

    }

    public static function deleteSliderItem(Request $request)
    {
        if (isset($request->slidersDeleteIds) && count($request->slidersDeleteIds)) {
            Slider::whereIn('id', $request->slidersDeleteIds)->delete();
        }
    }

    public static function addComment(Request $request, $product, $update = false)
    {
        if (isset($request->user_name) && count($request->user_name)) {
            $data = [];
            foreach ($request->user_name as $key => $user_name) {
                $data[$key]['user_name'] = $user_name;
            }
            if (isset($request->comment_id) && count($request->comment_id)) {
                foreach ($request->comment_id as $key => $comment_id) {
                    $data[$key]['comment_id'] = $comment_id;
                }
            } else {
                $data[$key]['comment_id'] = 0;
            }
            foreach ($request->comment_time as $key => $comment_time) {
                $data[$key]['comment_time'] = $comment_time;
            }
            foreach ($request->comment_text as $key => $comment_text) {
                $data[$key]['comment_text'] = $comment_text;
            }
            foreach ($request->comment_video as $key => $comment_video) {
                $data[$key]['comment_video'] = $comment_video;
            }
            foreach ($request->comment_type as $key => $comment_type) {
                if ($key == 0) {
                    $type = $comment_type;
                }
                $data[$key]['comment_type'] = $type;
            }
            foreach ($request->like as $key => $like) {
                $data[$key]['like'] = $like;
            }
            if ($request->hasFile('user_image')) {
                foreach ($request->file('user_image') as $key => $photo) {
                    $path = $photo->store('product-photo');
                    $data[$key]['user_photo'] = $path;
                }
            }
            if ($update) {
                foreach ($data as $index => $d) {
                    if (isset($d['comment_id']) && $commentFind = Comment::find($d['comment_id'])) {
                        $commentFind->update($d);
                    } else {
                        $product->comment()->create($d);
                    }
                }
//                foreach ($product->comment as $key => $comment) {
//                    foreach ($data as $index => $d) {
//                        if ($key == $index) {
//                            $comment->update($d);
//                        }
//                        if ($key < $index) {
//                            $product->comment()->create($d);
//                        }
//                    }
//                }
            } else {
                $product->comment()->createMany($data);
            }

        }
    }

    public static function deleteUserPhoto(Request $request)
    {
        if (isset($request->deleteUserPhoto) && count($request->deleteUserPhoto)) {
            Comment::whereIn('id', $request->deleteUserPhoto)->update(['user_photo' => null]);
        }
    }

    public static function deleteComment(Request $request)
    {
        if (isset($request->deleteComment) && count($request->deleteComment)) {
            Comment::whereIn('id', $request->deleteComment)->delete();
        }
    }

    public static function updateProduct(Request $request, $product)
    {
        DB::beginTransaction();
        try {
            if (isset($request->price) || isset($request->sale)) {
                self::old_price($request);
            }
            self::photo($request, 'image', 'photo');
            self::updateLastPhoto($request);
            self::deleteSliderItem($request);
            self::deleteUserPhoto($request);
            $product->update($request->all());
            self::shortDescription($request, $product, true);
            self::longDescription($request, $product, true);
//            self::saveSliderPhoto($request, $product, true);
            self::saveMultiSelectFiles($request, $product);
            self::addComment($request, $product, true);
            self::deleteComment($request);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return back();
        }
    }

    public static function DeleteProduct($slug)
    {
        DB::beginTransaction();
        try {
            $item = Product::where('url', $slug)->first();
            if (isset($item->comment) && count($item->comment)) {
                $item->comment()->delete();
            }
            if (isset($item->sliderPhoto) && count($item->sliderPhoto)) {
                $item->sliderPhoto()->delete();
            }
            $item->infoLongDescription()->delete();
            $item->infoShortDescription()->delete();
            $item->delete();
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

//    public function getCreatedAtAttribute($date)
//    {
//        return Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('Y/m/d');
//    }

    public function infoShortDescription()
    {
        return $this->hasMany(InfoShortDescriptionList::class);
    }

    public function infoLongDescription()
    {
        return $this->hasMany(InfoLongDescriptionList::class);
    }

    public function sliderPhoto()
    {
        return $this->hasMany(Slider::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function saleTime()
    {
        return $this->hasOne(SaleTime::class);
    }

}
