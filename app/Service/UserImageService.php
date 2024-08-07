<?php

namespace App\Service;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;

class UserImageService
{
    /**
     * @param array $data
     * @return Authenticatable
     */
    public function store(array $data): Authenticatable
    {
        try {
            $user = auth()->user();
            $imagesFolder = 'images/user-' . $user->email;

            DB::beginTransaction();
            if (isset($data['image'])) {
                $imageFile = $data['image'];
                $imageFileName = 'image.' . $imageFile->getClientOriginalExtension();

                $imagePath = $imageFile->storeAs($imagesFolder, $imageFileName);
                $data['image'] = $this->resizeImage($imagePath);
            } elseif (isset($user->image)) {
                $data['image'] = $user->image;
            } else {
                $data['image'] = 'images/default/userImage.png';
            }

            $user->update($data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(501, $e->getMessage());
        }

        return $user;
    }

    /**
     * @param string $picture
     * @return string|bool
     */
    public function resizeImage(string $picture): string|bool
    {
        if (!$picture) {
            return false;
        }

        $width = config('app.userImage.width');
        $height = config('app.userImage.height');

        $manager = ImageManager::gd();
        $image = $manager->read("storage/" . $picture);
        $image->cover($width, $height);

        if (!$image->save("storage/" . $picture)) {
            return false;
        }

        return $picture;
    }
}
