<?php


namespace App\Models;


use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModelSluggable extends Model
{
    use Sluggable;

    public static function boot()
    {
        parent::boot();

        self::slugging(function($model) {
            if (method_exists($model, 'needsSlugging')) {
                return $model->needsSlugging($model);
            }
        });

        self::slugged(function($model) {
            $slugName = defined(get_class($model). "::SLUG_NAME")
                ? $model::SLUG_NAME
                : 'slug';

            $slugPrefix = defined(get_class($model). "::SLUG_PREFIX")
                ? $model::SLUG_PREFIX
                : '';

            if (!self::checkSlug($model->$slugName, $slugPrefix)) {
                $sourceString = $model->getAttribute($model::SLUG_SOURCE);

                if (function_exists('transliterator_transliterate') && $sourceString) {
                    $slug = transliterator_transliterate(
                        'Any-Latin; Latin-ASCII; Lower()', $sourceString
                    );

                    $slug = SlugService::createSlug(
                        $model,
                        $slugName,
                        $slugPrefix . $slug
                    );

                    if (self::checkSlug($slug, $slugPrefix)) {
                        $model->$slugName = $slug;
                        return;
                    }
                }

                $randomWordPair = getRandomWordPairs();

                $model->$slugName = SlugService::createSlug(
                    $model,
                    $slugName,
                    $slugPrefix . ($randomWordPair[0] ?? '')
                );
            }
        });
    }

    /**
     * @param Slugify $engine
     * @param $attribute
     * @return Slugify
     */
    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        $engine->activateRuleSet('chinese');

        return $engine;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected static function checkSlug($slug, $prefix = '')
    {
        return trim($slug) && !Str::startsWith($slug, '-')
            && (!$prefix
                || $prefix && $slug !== $prefix && Str::startsWith($slug, $prefix));
    }

}
