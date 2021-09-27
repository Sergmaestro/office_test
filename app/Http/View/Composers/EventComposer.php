<?php


namespace App\Http\View\Composers;

use App\Repositories\{UserRepository};
use Illuminate\Support\Facades\{Auth, Cache};
use Illuminate\View\View;

class EventComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();
        $latestEvent = $latestIdeas = null;
        $latestIdeasCount = $latestIdeasSeeMore = $totalApplicationsCount = $totalCount = 0;

        if ($user) {
            $latestEvent = Cache::tags(['latestEvent'])->remember(
                UserRepository::getCacheKeyLatestEvent($user->id),
                config('cache.ttl'),
                function() use ($user) {
                     return $user->events()->orderByDesc('event_user.id')
                        ->first(['events.slug', 'events.image', 'events.name']);
                }
            );

            /** @var UserRepository $userRepository */
            $userRepository = app(UserRepository::class);

            $latestIdeasWithCount = $userRepository->getLatestIdeas($user);
            $latestIdeas = $latestIdeasWithCount['ideas'];
            $latestIdeasCount = $latestIdeas->count();
            $latestIdeasSeeMore = $latestIdeasWithCount['seeMoreIdeas'];

            $totalCount = $latestIdeas->sum(function($idea) use (&$totalApplicationsCount) {
                $totalApplicationsCount += $idea->applications_count ?? 0;
                return $idea->new_comments_count + $idea->new_likes_count + $idea->admin_status + ($idea->applications_count ?? 0);
            });
        }

        $view->with(compact('latestEvent', 'latestIdeas', 'latestIdeasCount', 'latestIdeasSeeMore',
            'totalCount', 'totalApplicationsCount'));
    }

}
