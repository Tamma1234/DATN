<?php

namespace App\Traits;

use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

trait FormatApiResponse
{
    /**
     * Parse response format
     *
     * @param mixed $data
     * @param string $statusCode
     * @return JsonResponse
     */
    public function responseApi($data, int $status = 200): JsonResponse
    {
        $data = Arr::wrap($data);
        if (config('app.debug')) {
            $data['debugs'] = [
                'queries' => $this->getQueries()
            ];
        }
        return response()->json($data, $status);
    }

    private function getQueries()
    {
        $result = [];
        $queries = DB::getQueryLog();
        foreach ($queries as $query) {
            $sql = $query['query'];
            $time = $query['time'];
            foreach ($query['bindings'] as $binding) {
                if (is_string($binding)) {
                    $binding = "'{$binding}'";
                } elseif ($binding === null) {
                    $binding = 'NULL';
                } elseif ($binding instanceof Carbon) {
                    $binding = "'{$binding->toDateTimeString()}'";
                } elseif ($binding instanceof DateTime) {
                    $binding = "'{$binding->format('Y-m-d H:i:s')}'";
                }
                $sql = preg_replace("/\?/", $binding, $sql, 1);
            }
            $result[] = [
                'sql' => $sql,
                'time' => $time
            ];
        }
        return $result;
    }
}
