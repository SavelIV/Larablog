<?php

namespace App\Http\Controllers\Cabinet\Settings;

use App\Http\Controllers\Controller;
use App\Service\UserImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit(): Application|Factory|View
    {
        $user = auth()->user();

        return view('cabinet.settings.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $data = request()->validate([
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users,email,' . $user->id,
            'image' => 'sometimes|image:jpg,jpeg,png',
        ]);

        $service = new UserImageService();
        $service->store($data);

        return redirect()->route('cabinet.settings')
            ->with('success','Settings updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function deleteImage(): RedirectResponse
    {
        $user = auth()->user();
        $user->update(['image' => 'images/default/userImage.png']);

        return redirect()->route('cabinet.settings')
            ->with('success', 'Your image deleted successfully!');
    }
}
