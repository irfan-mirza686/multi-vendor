<?php
namespace App\Services;

use App\Models\{
    Admin,
};

class AdminService
{
    /************************************************/

    public function updateProfile($request, $id)
    {
        $admin = Admin::select('image')->where('id', $id)->first();
        $filename = '';
        if (isset($request['profile_pic']) && !empty($request['profile_pic'])) {
            $filename = uploadImage($request['profile_pic'], filePath('admins'), $admin->image);

        } else {
            $filename = $admin->image;
        }
        Admin::whereId($id)->update([
            'name' => $request['name'],
            'image' => $filename
        ]);
    }
    /************************************************/
    public function all()
    {
        return Admin::with('groups')->get();
    }
    /************************************************/
    public function store($data, $id = null)
    {
        if ($id == null) {
            $create = new Admin;

        } else if ($id != null) {
            $create = Admin::find($id);

        }

        if (isset($data['image']) && !empty($data['image'])) {
            $filename = uploadImage($data['image'], filePath('admins'), $create->image);
            $create->image = $filename;
        }
        $settings = [
            'themeMode' => 'lightmode',
            'headerColor' => '',
            'sidebarColor' => '',
        ];

        $create->name = $data['name'];
        $create->email = $data['email'];
        $create->password = bcrypt($data['password']);
        $create->group_id = $data['group_id'];
        $create->settings = $settings;
        $create->status = $data['status'];
        return $create;
    }
    /************************************************/
}
