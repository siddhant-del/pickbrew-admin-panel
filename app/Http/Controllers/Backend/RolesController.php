<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Services\PermissionService;
use App\Services\RolesService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    public function __construct(
        private readonly RolesService $rolesService,
        private readonly PermissionService $permissionService
    ) {
    }

    public function index(): Renderable
    {
        $this->checkAuthorization(Auth::user(), ['role.view']);

        $perPage = config('settings.default_pagination') ?? 10;
        $search = request()->input('search') !== '' ? request()->input('search') : null;

        return view('backend.pages.roles.index', [
            'roles' => $this->rolesService->getPaginatedRolesWithUserCount($search, intval($perPage)),
            'breadcrumbs' => [
                'title' => __('Roles'),
            ],
        ]);
    }

    public function create(): Renderable
    {
        $this->checkAuthorization(Auth::user(), ['role.create']);

        return view('backend.pages.roles.create', [
            'roleService' => $this->rolesService,
            'all_permissions' => $this->permissionService->getAllPermissionModels(),
            'permission_groups' => $this->permissionService->getDatabasePermissionGroups(),
            'breadcrumbs' => [
                'title' => __('New Role'),
                'items' => [
                    [
                        'label' => __('Roles'),
                        'url' => route('admin.roles.index'),
                    ],
                ],
            ],
        ]);
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = $this->rolesService->createRole($request->name, $request->input('permissions', []));

        session()->flash('success', __('Role has been created.'));

        $this->storeActionLog(ActionType::CREATED, ['role' => $role]);

        return redirect()->route('admin.roles.index');
    }

    public function edit(int $id): Renderable|RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['role.edit']);

        $role = $this->rolesService->findRoleById($id);
        if (! $role) {
            session()->flash('error', __('Role not found.'));

            return back();
        }

        return view('backend.pages.roles.edit', [
            'role' => $role,
            'roleService' => $this->rolesService,
            'all_permissions' => $this->permissionService->getAllPermissionModels(),
            'permission_groups' => $this->permissionService->getDatabasePermissionGroups(),
            'breadcrumbs' => [
                'title' => __('Edit Role'),
                'items' => [
                    [
                        'label' => __('Roles'),
                        'url' => route('admin.roles.index'),
                    ],
                ],
            ],
        ]);
    }

    public function update(UpdateRoleRequest $request, int $id): RedirectResponse
    {
        $role = $this->rolesService->findRoleById($id);

        if (! $role) {
            session()->flash('error', __('Role not found.'));

            return back();
        }

        $this->preventSuperAdminRoleModification($role, 'modified');

        $role = $this->rolesService->updateRole($role, $request->name, $request->input('permissions', []));

        session()->flash('success', __('Role has been updated.'));
        $this->storeActionLog(ActionType::UPDATED, ['role' => $role]);

        return back();
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['role.delete']);

        $role = $this->rolesService->findRoleById($id);

        if (! $role) {
            session()->flash('error', __('Role not found.'));

            return back();
        }

        $this->preventSuperAdminRoleModification($role, 'deleted');

        $this->rolesService->deleteRole($role);
        $this->storeActionLog(ActionType::DELETED, ['role' => $role]);
        session()->flash('success', __('Role has been deleted.'));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Delete multiple roles at once
     */
    public function bulkDelete(Request $request): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['role.delete']);

        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.roles.index')
                ->with('error', __('No roles selected for deletion'));
        }

        $deletedCount = 0;

        foreach ($ids as $id) {
            $role = $this->rolesService->findRoleById((int) $id);

            if (! $role) {
                continue;
            }

            // Skip Superadmin role.
            if ($role->name === 'Superadmin') {
                continue;
            }

            $this->rolesService->deleteRole($role);
            $this->storeActionLog(ActionType::DELETED, ['role' => $role]);

            $deletedCount++;
        }

        if ($deletedCount > 0) {
            session()->flash('success', __(':count roles deleted successfully', ['count' => $deletedCount]));
        } else {
            session()->flash('error', __('No roles were deleted. Selected roles may include protected roles.'));
        }

        return redirect()->route('admin.roles.index');
    }
}
