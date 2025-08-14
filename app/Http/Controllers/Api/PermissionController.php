<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\PermissionResource;
use App\Services\PermissionService;
use Dedoc\Scramble\Attributes\QueryParameter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends ApiController
{
    public function __construct(private readonly PermissionService $permissionService)
    {
    }

    /**
     * Permissions list.
     *
     * @tags Permissions
     */
    #[QueryParameter('search', description: 'Search term for filtering permissions by name or group.', type: 'string', example: 'user')]
    #[QueryParameter('group_name', description: 'Filter permissions by group name.', type: 'string', example: 'user')]
    public function index(Request $request): JsonResponse
    {
        $this->checkAuthorization(Auth::user(), ['role.view']);

        $search = $request->input('search');
        $groupName = $request->input('group_name');

        $permissions = $this->permissionService->getAllPermissionsWithFilters($search, $groupName);

        return $this->resourceResponse(
            PermissionResource::collection($permissions),
            'Permissions retrieved successfully'
        );
    }

    /**
     * Show Permission.
     *
     * @tags Permissions
     */
    public function show(int $id): JsonResponse
    {
        $this->checkAuthorization(Auth::user(), ['role.view']);

        $permission = $this->permissionService->getPermissionById($id);

        if (! $permission) {
            return $this->errorResponse('Permission not found', 404);
        }

        return $this->resourceResponse(
            new PermissionResource($permission),
            'Permission retrieved successfully'
        );
    }

    /**
     * Permission Groups.
     *
     * @tags Permissions
     */
    public function groups(): JsonResponse
    {
        $this->checkAuthorization(Auth::user(), ['role.view']);

        $groups = $this->permissionService->getDatabasePermissionGroups();

        return $this->successResponse($groups, 'Permission groups retrieved successfully');
    }
}
