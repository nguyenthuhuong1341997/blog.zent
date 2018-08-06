<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts'; // bảng posts trong database
    protected $fillable = [
    		'title', 
    		'thumbnail', 
    		'description', 
    		'content',
    		'slug',
    		'user_id',
    		'category_id',
    		'view_count'
    	]; // một mảng tên các cột trong bảng posts ở database
    	// không cần thêm các cột như id, created_at, updated_at, deleted_at vào
    	// vì nó là những cột mặc định

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function posts(){
        return $this->belongsToMany('App\Tag','post_tags','post_id','tag_id');
    }
}
