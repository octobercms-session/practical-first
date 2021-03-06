<?php namespace October\Demo\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Coyl\Git\Git;

class ExpertsMiddleware
{
    /**
     * The Laravel Application
     *
     * @var Application
     */
    protected $app;

    /**
     * Create a new middleware instance.
     *
     * @param  Application $app
     * @return void
     */

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {

        $response = $next($request);

        if($request->branch){
            $repo = Git::open(base_path());  // -or- Git::create('/path/to/repo')
//        dd($repo->getActiveBranch());
            $repo->checkout($request->branch);
            $response->setContent(file_get_contents('http://127.0.0.1:8001'));

        }


//        $repo->checkout($repo->branches()[1]);
//        dd($repo->branches());
//        dd($request->all(),base_path());


        return $response;
    }
}
