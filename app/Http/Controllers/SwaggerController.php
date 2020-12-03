<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use L5Swagger\L5SwaggerServiceProvider;
/**
 * @OA\Info(title="Test",version="3")
 * Class SwaggerController
 * @package App\Http\Controllers
 */
class SwaggerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/swagger",
     *     summary="werew")
     * @OA\Response(
     *     response=200,
     *     description="描述")
     * @return string[]
     */
    public function doc()
    {
        return ['msg' => 'Hello World'];
    }

}
