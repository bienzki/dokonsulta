<?php

namespace App\Controllers;

use App\Models\FavoriteModel;

class Delete extends BaseController
{
    public function index($favoriteId) {
        $favoriteModel = new FavoriteModel();

        $favoriteModel->delete('favoriteId', $favoriteId);

        redirect()->to('/patients/favorites');
    }
}
