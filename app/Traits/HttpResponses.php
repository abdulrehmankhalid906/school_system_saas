<?php

namespace App\Traits;

trait HttpResponses {

    public function success($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => $message ?? 'Operation perform successfully'
        ], $code);
    }

    public function error($data, $message = null, $code)
    {
        return response()->json([
            'status' => false,
            'data' => $data,
            'message' => $message ?? 'Something went wrong'
        ], $code);
    }

}
