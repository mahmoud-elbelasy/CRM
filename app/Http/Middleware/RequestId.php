<?php

namespace App\Http\Middleware;
use Closure;
use Ramsey\Uuid\Uuid;
use function PHPUnit\Framework\isNull;

class RequestId
{
    public function handle($request,Closure $next)
    {
        $uuid = $request->headers->get('X-Request-ID');
        if (isNull($uuid))
        {
            $uuid = Uuid::uuid4()->tostring();
            $request->headers->set('X-Request-ID', $uuid);
        }
        $response = $next($request);
        $request->headers->set('X-Request-ID', $uuid);
        return $response;
    }

}
