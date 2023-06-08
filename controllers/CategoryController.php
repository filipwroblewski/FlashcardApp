<?php
require_once '../models/CategoryModel.php';

class CategoryController {
    public function getAllCategories() {
        $categoryModel = new CategoryModel();
        return $categoryModel->getAllCategories();
    }
}
