<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price',
        'image',
        'manufacturer',
        'engine',
        'wheel',
        'engine_type',
    ];

    /**
     * @param $query
     * @param $priceFrom
     * @param $priceTo
     *
     * @return mixed
     */
    public function scopePriceRange($query, $priceFrom, $priceTo): mixed
    {
        return $query->when($priceFrom, function ($q) use ($priceFrom) {
            return $q->where('price', '>=', $priceFrom);
        })
            ->when($priceTo, function ($q) use ($priceTo) {
                return $q->where('price', '<=', $priceTo);
            });
    }

    /**
     * @param $query
     * @param $manufacturers
     *
     * @return mixed
     */
    public function scopeOfManufacturers($query, $manufacturers): mixed
    {
        return $query->when($manufacturers, function ($q) use ($manufacturers) {
            return $q->whereIn('manufacturer', $manufacturers);
        });
    }

    /**
     * @param $query
     * @param $engineType
     *
     * @return mixed
     */
    public function scopeEngineType($query, $engineType): mixed
    {
        return $query->when($engineType, function ($q) use ($engineType) {
            return $q->where('engine_type', $engineType);
        });
    }

    /**
     * @param Builder $query
     * @param string $term
     *
     * @return mixed
     */
    public function scopeSearch(Builder $query, string $term): mixed
    {
        return $query->when(
            $term,
            fn($q) => $q->where(
                fn($query) => $query->where('name', 'like', "$term")->orWhere('description', 'like', "$term")
            )
        );
    }
}
