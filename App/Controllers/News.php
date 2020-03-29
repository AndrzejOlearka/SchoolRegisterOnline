<?php

namespace App\Controllers;

use Core\Request\Response;
use Core\Controller\Controller;
use App\Lib\Actions\News\{NewsEditor, NewsCreator};

/**
 * News controller
 *
 */
class News extends Controller
{
    /**
     * Get classes with basic data
     *
     * @return void
     */
    protected function getAllNews()
    {
        Response::json($this->provider->getNews()->getOriginalData());
    }

    protected function addNews(){
        $action = new NewsCreator($this->provider);
        Response::json($action->create(), $action->getResult(), $action->getErrors());
    }

    protected function editNews(){
        $action = new NewsEditor($this->provider);
        Response::json($action->edit(), $action->getResult(), $action->getErrors());
    }
    
    protected function deleteNews(){
        Response::json($this->provider->deleteNews());
    }
}
