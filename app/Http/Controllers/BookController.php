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
     *     path="/api/book/get/{id}",
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

    /**
     * @OA\Get(
     *     path="/api/book/price/{sort}",
     *     @OA\Parameter(
     *     name="sort",
     *     required=true,
     *     in="path"),
     *     @OA\Response(response=200,description="查询图书,传参为1从贵到便宜，传参其他从便宜到贵")
     * )
     * @param $sort
     * @return \Illuminate\Http\JsonResponse|JsonResponse
     */
    public function getBookByPrice($sort)
    {
        if ($sort == 1){
            $books = Book::all()->sortBy('book_price',SORT_DESC,true)->first();
        }else{
            $books = Book::all()->sortBy('book_price',SORT_ASC,false)->first();
        }

        return response()->json($books)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    /**
     * @OA\Get(
     *     path="/api/books/price/{sort}",
     *     @OA\Parameter(
     *     name="sort",
     *     required=true,
     *     in="path"),
     *     @OA\Response(response=200,description="查询图书,传参为1从贵到便宜，传参其他从便宜到贵")
     * )
     * @param $sort
     * @return \Illuminate\Http\JsonResponse|JsonResponse
     */
    public function getBooksByPrice($sort)
    {
        if ($sort == 1){
            $books = Book::all()->sortBy('book_price',SORT_DESC,true);
        }else{
            $books = Book::all()->sortBy('book_price',SORT_ASC,false);
        }
        return response()->json($books)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }


}
