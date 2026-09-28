<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceProcessSection extends Model
{
    use HasFactory;

    protected $table = 'service_process_sections';

    protected $fillable = [
        'tag',
        'title',
        'steps',
        'status',
    ];

    protected $casts = [
        'steps' => 'array',
    ];

    public static array $defaultStepImages = [
        'images/6a5f78bd3fbca2eb73cf453b_Service-process-image-one.avif',
        'images/6a5f78bd3fbca2eb73cf453c_Service-process-image-two.avif',
        'images/6a5f78bd3fbca2eb73cf453d_Service-process-image-three.avif',
        'images/6a5f78bd3fbca2eb73cf453e_Service-process-image-four.avif',
    ];

    public static function getSettings(): self
    {
        $settings = self::first();

        if (! $settings) {
            $settings = self::create([
                'tag' => 'OUR PROCESS',
                'title' => 'How we bring your dream wedding to life',
                'steps' => [
                    [
                        'step_number' => '01',
                        'title' => 'Planning',
                        'description' => 'From themes to timelines, we curate every detail for a seamless experience.',
                        'image' => 'images/6a5f78bd3fbca2eb73cf453b_Service-process-image-one.avif',
                    ],
                    [
                        'step_number' => '02',
                        'title' => 'Design phase',
                        'description' => 'Transforming your vision into cohesive decor, florals, and spatial layouts.',
                        'image' => 'images/6a5f78bd3fbca2eb73cf453c_Service-process-image-two.avif',
                    ],
                    [
                        'step_number' => '03',
                        'title' => 'Execution',
                        'description' => 'Coordinating vendors, schedules, and production to execute flawlessly on site.',
                        'image' => 'images/6a5f78bd3fbca2eb73cf453d_Service-process-image-three.avif',
                    ],
                    [
                        'step_number' => '04',
                        'title' => 'On-site support',
                        'description' => 'From arrivals to the final dance, we oversee every single moment to create a celebration.',
                        'image' => 'images/6a5f78bd3fbca2eb73cf453e_Service-process-image-four.avif',
                    ],
                ],
                'status' => 'active',
            ]);
        }

        return $settings;
    }

    public function getStepImageUrl(int $index): string
    {
        $steps = $this->steps ?? [];
        $path = $steps[$index]['image'] ?? (self::$defaultStepImages[$index] ?? null);

        return self::getImageUrl($path);
    }

    public static function getImageUrl(?string $path): string
    {
        if (! $path) {
            return asset('images/6a5f78bd3fbca2eb73cf453b_Service-process-image-one.avif');
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (str_starts_with($path, 'images/') || str_starts_with($path, 'assets/')) {
            return asset($path);
        }

        return Storage::disk('public')->url($path);
    }
}
