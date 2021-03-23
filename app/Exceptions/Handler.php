<?php

namespace App\Exceptions;

use App\Traits\FormatApiResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use FormatApiResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson()) {
            $exceptionInstanceof = get_class($exception);
            switch ($exceptionInstanceof) {
                case AuthenticationException::class:
                    $messages[] = $exception->getMessage();
                    return $this->responseApi(compact('messages'), 401);
                case UnauthorizedHttpException::class:
                case AuthorizationException::class:
                    $messages[] = trans('auth.unauthorized');
                    return  $this->responseApi(compact('messages'), 403);
                case ModelNotFoundException::class:
                    $model = str_replace('App\\Models\\', '', $exception->getModel());
                    $model = strtolower($model);
                    $model = trans("errors.objects.$model");
                    $messages[] = trans('errors.model_not_found', compact('model'));
                    return $this->responseApi(compact('messages'), 404);
                case NotFoundHttpException::class:
                    $messages[] = trans('errors.http_not_found', ['path' => $request->path()]);
                    return $this->responseApi(compact('messages'), 404);
                case ValidationException::class:
                    $messages = ['errors' => $exception->errors()];
                    return $this->responseApi($messages, 422);
                default:
                    $messages[] = config('app.debug') ? $exception->getMessage() : trans('errors.unknow');
                    return $this->responseApi(compact('messages'), 500);
            }
        }
        return parent::render($request, $exception);
    }
}
