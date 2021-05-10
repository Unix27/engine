<?php


namespace App\Http\Controllers\Auth\Traits;


use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


trait AjaxAuthResponses
{
    /**
     * @param string $url
     * @return JsonResponse
     */
    public function successResponse(string $url): JsonResponse
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'next_url' => $url,
        ], Response::HTTP_OK);
    }


    /**
     * @param string $url
     * @return JsonResponse
     */
    public function successResponseWithStatus(string $url, $status): JsonResponse
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'next_url' => $url,
            'status' => $status
        ], Response::HTTP_OK);
    }


    /**
     * @param string $message
     * @return JsonResponse
     */
    public function successResetLinkResponse(string $message): JsonResponse
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => $message,
        ], Response::HTTP_OK);
    }


    /**
     * @return JsonResponse
     */
    public function toManyAttemptsResponse(): JsonResponse
    {
        return response()->json([
            'status' => Response::HTTP_TOO_MANY_REQUESTS,
            'message' => trans("auth.throttle", ['seconds' => '30']),
        ]);
    }


    /**
     * @param array $error
     * @return JsonResponse
     */
    public function errorResponse(array  $error): JsonResponse
    {
        return response()->json([
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'errors' => $error
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}