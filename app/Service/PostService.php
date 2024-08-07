<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;

class PostService
{
    /**
     * @param array $data
     * @param Post|null $post
     * @return Post
     */
    public function store(array $data, Post $post = null): Post
    {
        try {
            $imagesFolder = 'images/post-' . date('Y-m-d_H-i-s');

            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['main_image'])) {
                $mainImageFile = $data['main_image'];
                $mainImageFileName = 'main_image.' . $mainImageFile->getClientOriginalExtension();

                $mainImagePath = $mainImageFile->storeAs($imagesFolder, $mainImageFileName); // images/post-2024-07-16_23-00-40/main_image.jpg
                $data['main_image'] = $this->resizeImage($mainImagePath, 'postMainImage');
            } elseif (isset($post->main_image)) {
                $data['main_image'] = $post->main_image;
            } else {
                $data['main_image'] = 'images/default/blog_1.jpg';
            }

            if (isset($data['preview_image'])) {
                $previewImageFile = $data['preview_image'];
                $previewImageFileName = 'preview_image.' . $previewImageFile->getClientOriginalExtension();

                $previewImagePath = $previewImageFile->storeAs($imagesFolder, $previewImageFileName);
                $data['preview_image'] = $this->resizeImage($previewImagePath, 'postPreviewImage');
            } elseif (isset($post->preview_image)) {
                $data['preview_image'] = $post->preview_image;
            } else {
                $data['preview_image'] = 'images/default/blog_2.jpg';
            }

            if (isset($post)) {
                $post->update($data);
                if (isset($tagIds)) {
                    $post->tags()->sync($tagIds);
                } else {
                    $post->tags()->detach();
                }
            } else {
                $post = Post::firstOrCreate($data);
                if (isset($tagIds)) {
                    $post->tags()->attach($tagIds);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(501, $e->getMessage());
        }

        return $post;
    }

    /**
     * @param string $picture
     * @param string $pictureType
     * @return string|bool
     */
    public function resizeImage(string $picture, string $pictureType): string|bool
    {
        if (!$picture || !$pictureType) {
            return false;
        }

        $width = config('app.' . $pictureType . '.width');
        $height = config('app.' . $pictureType . '.height');

        $manager = ImageManager::gd();
        $image = $manager->read("storage/" . $picture);
        $image->cover($width, $height);
        $image->place('assets/images/larablog.png', 'bottom-right', 10, 10, 25);

        if (!$image->save("storage/" . $picture)) {
            return false;
        }

        return $picture;
    }
}
