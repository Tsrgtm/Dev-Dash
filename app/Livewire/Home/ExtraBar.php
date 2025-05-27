<?php

namespace App\Livewire\Home;

use Livewire\Component;
use App\Models\User;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Collection;

class ExtraBar extends Component
{
    public $topUsers;
    public Collection $topTags;
    public Collection $topPosts;

    public function mount()
    {
        $this->getTopUsers();
        $this->loadTopTags();
        $this->loadTopPosts();
    }

    public function getTopUsers(): void
    {
        $this->topUsers = User::withCount([
            'posts as recent_posts_count' => function ($query) {
                $query->where('created_at', '>=', now()->subDays(7));
            },
            'comments as recent_comments_count' => function ($query) {
                $query->where('created_at', '>=', now()->subDays(7));
            },
            // Add more relations if needed, like likes, activities etc.
        ])
            ->get()
            ->map(function ($user) {
                $user->activity_score = $user->recent_posts_count * 2 + $user->recent_comments_count; // weight scores if needed
                return $user;
            })
            ->sortByDesc('activity_score')
            ->take(10); // Top 10
    }

    public function loadTopTags(): void
    {
        $this->topTags = Tag::withCount(['posts', 'followers'])
            ->get()
            ->map(function ($tag) {
                // Weight: 70% for posts, 30% for followers
                $score = ($tag->posts_count * 0.7) + ($tag->followers_count * 0.3);
                $tag->score = $score;
                return $tag;
            })
            ->sortByDesc('score')
            ->take(15);
    }

    public function loadTopPosts(): void
    {
        $this->topPosts = Post::select('id', 'title', 'slug', 'user_id', 'created_at') // exclude content
            ->withCount(['comments', 'reactions'])
            ->where('created_at', '>=', now()->subDays(30)) // recent (last 30 days)
            ->get()
            ->map(function ($post) {
                $score = ($post->comments_count * 0.7) + ($post->reactions_count * 0.3);
                $post->score = $score;
                return $post;
            })
            ->sortByDesc('score')
            ->take(5)
            ->values(); // reindex after sorting
    }

    public function toggleFollow($id)
    {
        $targetUser = User::findOrFail($id);
        $currentUser = auth()->user();

        if ($targetUser->isFollowedBy($currentUser)) {
            $targetUser->followers()->detach($currentUser->id);
        } else {
            $targetUser->followers()->attach($currentUser->id);
        }
    }

    public function clearCache()
    {
        $this->getTopUsers();
        $this->loadTopTags();
        $this->loadTopPosts();
    }


    public function render()
    {
        return view('livewire.home.extra-bar');
    }
}
