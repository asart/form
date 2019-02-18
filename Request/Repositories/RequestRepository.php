<?php

namespace app\Request\Repositories;

use app\Request\Models\Request;

class RequestRepository
{
    public function get($id) : Request
    {
        if (!($request = Request::findOne($id))) {
            throw new NotFoundException('request is not found');
        }

        return $request;
    }

    public function getAll() : array
    {
        return Request::find()->all();
    }

    public function save(Request $request)
    {
        if (!$request->save()) {
            throw new \RuntimeException('request saving error');
        }
    }

    public function remove(Request $request)
    {
        if (!$request->delete()) {
            throw new \RuntimeException('request removing error');
        }
    }

    public function query()
    {
        return Request::find()->orderBy(['id' => SORT_DESC]);
    }
}
