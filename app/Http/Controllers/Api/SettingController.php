<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\Setting\UpdateSettingsRequest;
use App\Http\Resources\SettingResource;
use App\Services\SettingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends ApiController
{
    public function __construct(private readonly SettingService $settingService)
    {
    }

    /**
     * Settings list.
     *
     * @tags Settings
     */
    public function index(Request $request): JsonResponse
    {
        $this->checkAuthorization(Auth::user(), ['settings.view']);
        $settings = $this->settingService->getAllSettings(
            $request->input('search'),
            $request->integer('autoload')
        );

        return $this->resourceResponse(
            SettingResource::collection($settings),
            'Settings retrieved successfully'
        );
    }

    /**
     * Show Setting.
     *
     * @tags Settings
     */
    public function show(string $option_name): JsonResponse
    {
        $this->checkAuthorization(Auth::user(), ['settings.view']);

        $setting = $this->settingService->getSettingByKey($option_name);

        if (! $setting) {
            return $this->errorResponse('Setting not found', 404);
        }

        return $this->resourceResponse(
            new SettingResource($setting),
            'Setting retrieved successfully'
        );
    }

    /**
     * Update Settings.
     *
     * @tags Settings
     */
    public function update(UpdateSettingsRequest $request): JsonResponse
    {
        $settings = $request->input('settings', []);
        $updatedSettings = [];

        foreach ($settings as $key => $value) {
            $setting = $this->settingService->updateOrCreateSetting((string) $key, $value);
            $updatedSettings[] = $setting;
        }

        $this->logAction('Settings Updated', null, ['updated_keys' => array_keys($settings)]);

        return $this->resourceResponse(
            SettingResource::collection(collect($updatedSettings)),
            'Settings updated successfully'
        );
    }
}
