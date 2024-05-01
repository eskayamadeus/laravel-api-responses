<?php

use Illuminate\Http\JsonResponse;

if (! function_exists('respondWithSuccess')) {
    /**
     * Return a successful response, such as a list of items.
     *
     * @param  mixed|array  $data
     * @param  string  $message
     * @param  array  $meta
     */
    function respondWithSuccess($data, $message = null, $meta = null): JsonResponse
    {
        $arr = [
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ];

        $meta ? $arr['meta'] = $meta : false;

        return response()->json(
            $arr
        );
    }
}

if (! function_exists('respondWithFailure')) {
    /**
     * Return a failed response, such as validation errors.
     *
     * @param  mixed|array  $data
     * @param  string  $message
     * @param  int  $statusCode
     */
    function respondWithFailure($data, $message = null, $statusCode = 500): JsonResponse
    {
        $data = [
            'status' => 'fail',
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($data, $statusCode);
    }
}

if (! function_exists('respondCreated')) {
    /**
     * Return a created response.
     *
     * @param  mixed|array  $data
     * @param  string  $message
     */
    function respondCreated($data, $message = null): JsonResponse
    {
        return response()->json(
            [
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ],
            201
        );
    }
}
