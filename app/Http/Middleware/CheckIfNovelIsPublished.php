<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Novel;

class CheckIfNovelIsPublished
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $novel_id = $request->route('novel');

        $novel = Novel::find($novel_id);

        if (!$novel->is_published) {
            if (auth()->user() && auth()->user()->id === $novel->user_id) {
                return $next($request);
            } else {
                return redirect()->back()->with(['error', 'Unauthorized Action']);
            }
        }
        return $next($request);
    }
}
