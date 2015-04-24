<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Pengguna;

class Authenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	public function handle($request, Closure $next)
	{
		if (!Pengguna::validAccessToken()){
			if (Pengguna::expiredAccessToken()){
				return redirect()->route('oauth.do_authorization');
			} else {
				return redirect()->route('oauth.request_access_token');
			}
		}

		return $next($request);
		// if ($this->auth->guest())
		// {
		// 	if ($request->ajax())
		// 	{
		// 		return response('Unauthorized.', 401);
		// 	}
		// 	else
		// 	{
		// 		return redirect()->guest('auth/login');
		// 	}
		// }

		// return $next($request);
	}

}
