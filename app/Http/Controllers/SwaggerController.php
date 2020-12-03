<?php

namespace App\Http\Controllers;

/**
 *
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
