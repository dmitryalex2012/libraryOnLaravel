<?php


namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Book
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $description
 * @property string $book_cover
 * @property string $category
 * @property string $language
 * @property int $publishing_year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Book newModelQuery()
 * @method static Builder|Book newQuery()
 * @method static Builder|Book query()
 * @method static Builder|Book whereAuthor($value)
 * @method static Builder|Book whereBookCover($value)
 * @method static Builder|Book whereCategory($value)
 * @method static Builder|Book whereCreatedAt($value)
 * @method static Builder|Book whereDescription($value)
 * @method static Builder|Book whereId($value)
 * @method static Builder|Book whereLanguage($value)
 * @method static Builder|Book wherePublishingYear($value)
 * @method static Builder|Book whereTitle($value)
 * @method static Builder|Book whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Book extends Model
{
//    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author', 'description', 'book_cover', 'category', 'language',
        'publishing_year','created_at','updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
