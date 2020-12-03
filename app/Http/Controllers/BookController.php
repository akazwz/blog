<?php
namespace App\Http\Controllers;
use App\Models\Models\Book;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @OA\Info(title="图书",version="1")
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/book/{id}",
     *     @OA\Parameter(
     *     name="id",
     *     required=true,
     *     in="path"
     * ),
     *     @OA\Response(response=200,description="返回根据id查询的书")
     * )
     * @param $id
     * @return \Illuminate\Http\JsonResponse|JsonResponse
     */
    public function getBookById($id)
    {
        // 根据id查询
        $book = Book::query()->find($id);
        // return response()是返回想要 json()转换成json字符串但是是unicode setEncodingOptions设置编码
        return response()->json($book)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    /**
     * @OA\get(
     *     path="/api/allBook",
     *     @OA\Response(response=200,description="查询所有图书")
     * )
     * @return \Illuminate\Http\JsonResponse|JsonResponse
     */
    public function getAllBook()
    {
        $books = Book::all();
        return response()->json($books)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
