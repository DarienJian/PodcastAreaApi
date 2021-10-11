<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Podcast extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'copyright',
        'cover_image',
        'description',
        'rss_link',
        'last_publish_date'
    ];

}
