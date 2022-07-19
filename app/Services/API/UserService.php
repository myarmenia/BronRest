<?php

namespace App\Services\API;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\FileSystemService;
use Illuminate\Support\Arr;

class UserService
{

    public $fileServ;

    public function __construct()
    {
        $this->fileServ = new FileSystemService('avatar');
    }

  public function update(array|object $data)
  {

    $user = Auth::user();
    $updated = $user->update(Arr::except($data, ['avatar']));

    if(isset($data['avatar']))
    {
            if($user['avatar']){
                $this->fileServ->delete($user['avatar']);
            }
            $img = $this->fileServ->createImage($user['id'],$data['avatar']);
            $user['avatar'] = $img;
            $user->save();
    }

    return $updated;
  }

}
