<?php
namespace TestCMS\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class XSS
{
    public function handle(Request $request, Closure $next)
    {
        $input = $request->all();
//        $linesStart = strpos( $request->all(),"&lt;script" );

        array_walk_recursive($input, function(&$input) {
//            $linesEnd = strpos($input,"&lt;/script" );
//        $linesStart = strpos($input,"&lt;script" );
//        $leng = $linesEnd - $linesStart;
//        if($linesEnd) {
////            dd($leng);
//            $input = substr($input, $linesEnd,$leng);
//        }
            $input = str_replace("&lt;script","",$input);
            $input = str_replace("&lt;/script","",$input);

            $input = str_replace("<script","",$input);
            $input = str_replace("</script","",$input);
//            $input = strip_tags($input);
        });

        $request->merge($input);
        return $next($request);
    }
}
