<?php

namespace App;

use Intervention\Image\Facades\Image;

class Main extends MainController
{
    public function index()
    {
        $tasks = $this->createConnection();

        $data = ['data' => $tasks->getList()];

        $data['title'] = 'Список задач';

        $this->view->renderTwig('main', $data);
    }

    public function addTask()
    {
        $tasks = $this->createConnection();

        $result = $tasks->addTask($_POST);
    }

    // функция для создания класса модели
    private function createConnection()
    {
        $connection = $this->model->getConnection();

        $tasks = new Tasks($connection);

        return $tasks;
    }

//    public function image()
//    {
//        $image = Image::make('./img/bg/best.jpg')
//            ->resize(200,null, function ($constraint) {
//                $constraint->aspectRatio();
//            })
//            ->text('WATERMARK', 20, 10, function($font) {
//                $font->file(__DIR__.'/../fonts/Gagalin-Regular.woff');
//                $font->size(30);
//                $font->color('#c00');
//                $font->align('left');
//                $font->valign('left');
//                $font->angle(-45);
//            })
//            ->rotate(45)
//            ->save('./img/copy/best_copy.png');
//        echo "<img src='/img/copy/best_copy.png'>";
//    }
}