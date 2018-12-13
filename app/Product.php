<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
     public $table = "products";

    // protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'product_name','product_code','category_id','description','product_ios_img_small','product_ios_img_large','status',
    ];

    //custom timestamps name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function category() {
        
        return $this->belongsTo(Category::class);
        
    }

    /* public function deleteImage($id) {


    } */
    
}
