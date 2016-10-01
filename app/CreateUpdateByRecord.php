<?php
/**
 * Created by PhpStorm.
 * User: mainul
 * Date: 8/8/16
 * Time: 9:50 PM
 */

namespace App;


use Illuminate\Support\Facades\DB;

trait CreateUpdateByRecord
{

    public static function boot() {
        parent::boot();

        /**
         * Entry Update Date On Save Data
         */
        static::updating(function($table)  {
            $table->updated_by = auth()->user()->id;
        });

        // create a event to happen on deleting
        //        static::deleting(function($table)  {
        //            $table->deleted_by = Auth::user()->username;
        //        });


        /**
         * Entry created by on Save Data
         */
        static::saving(function($table)  {
            $table->created_by = empty($table->created_by)?auth()->user()->id:$table->created_by;
            if (empty($table->slug) && in_array('slug', $table->fillable)) {
                $slug = str_slug(empty($table->slug)?$table->title:$table->slug);
                $count = DB::table($table->getTable())->where('slug','like',$slug.'%')->count();
                $table->slug = $slug.($count?'-'.$count:'');
            }
        });
    }


    /**
     * @return mixed
     * Get Created User Info
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }


    /**
     * @return mixed
     * Get Updated User Info
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}