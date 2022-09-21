<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Gate Declaration | defining post update
        /*Gate::define('update_post',function(User $user,Post $post){
            return $user->id === $post->user_id;
        });
        */

         //Gate Declaration | defining post delete
        /*Gate::define('update_delete',function(User $user,Post $post){
            return $user->id === $post->user_id;
        });
        */
    }
}
