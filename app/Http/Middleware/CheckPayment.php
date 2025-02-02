<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::with('school')->where('id', Auth::user()->id)->first();

        if($user && $user->school->payment_status != 'paid')
        {
            return redirect()->route('subscription.history')->with('danger', 'Payment is not completed');
            // return response()->json(['message' => 'Payment not made'], 401);
        }

        return $next($request);
    }
}
