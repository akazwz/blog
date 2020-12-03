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
     *     path="/api/swagger/doc",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function doc()
    {
        return ['msg' => 'Hello World'];
    }

}
