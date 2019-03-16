<?php
/*
 * This file is part of Laravel Access Protect.
 *
 * (c) Goran Krgovic <gorankrgovic1@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);


namespace Gox\Laravel\Http\Middleware;

use Closure;
use Illuminate\Contracts\Encryption\DecryptException;


class AccessProtect
{

    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $password = config('access-protect.passwords');

        if ( empty ( $password ) ) {
            return $next($request);
        }

        $passwords = explode(',', $password);

        if (in_array($request->get('access-protected'), $passwords)) {
            setcookie('access-protected', encrypt($request->get('access-protected')), 0, '/');
            return redirect($request->url());
        }

        try {
            $usersPassword = decrypt(array_get($_COOKIE, 'access-protected'));
            if (in_array($usersPassword, $passwords)) {
                return $next($request);
            }
        } catch (DecryptException $e) {
            // empty value in cookie
        }

        return response(view('access-protect::access-protect-form'), config('access-protect.response_code'));
    }
}