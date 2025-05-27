<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Livewire\WithPagination;

class GlobalSearch extends Component
{
    use WithPagination;
    public string $query = '';
    public string $filter = 'all';
    public $results = [];
    // public bool $openSearch = false;

    public function updatedQuery()
    {
        $this->results = $this->getResultsProperty();
    }

    public function updatedFilter()
    {
        $this->results = $this->getResultsProperty();
    }

    public function mount()
    {
        $this->results = $this->getResultsProperty();
        // dd($this->results);
    }

    public function getResultsProperty()
    {
        if (strlen($this->query) < 1) {
            return collect();
        }

        $results = collect();

        $postLimit = $this->filter === 'all' ? 5 : 10;
        $userLimit = $this->filter === 'all' ? 5 : 10;
        $tagLimit = $this->filter === 'all' ? 5 : 10;

        if ($this->filter === 'all' || $this->filter === 'posts') {
            $posts = Post::where('title', 'like', '%' . $this->query . '%')
                ->limit($postLimit)
                ->get()
                ->map(function ($post) {
                    return [
                        'type' => 'post',
                        'title' => $post->title,
                        'author' => $post->user->username ?? null,
                        'slug' => $post->slug,
                        'date' => $post->created_at->diffForHumans(),
                    ];
                });

            $results = $results->concat($posts);
        }

        if ($this->filter === 'all' || $this->filter === 'users') {
            $usersQuery = User::query();

            if (auth()->check()) {
                $usersQuery->where('id', '!=', auth()->id());
            }

            $users = $usersQuery->where(function ($query) {
                $query->where('name', 'like', '%' . $this->query . '%')
                    ->orWhere('username', 'like', '%' . $this->query . '%');
            })
                ->limit($userLimit)
                ->get()
                ->map(function ($user) {
                    return [
                        'type' => 'user',
                        'name' => $user->name,
                        'username' => $user->username,
                        'avatar' => $user->avatar,
                        'avatar_temporary' => $user->avatar_temporary,
                    ];
                });

            $results = $results->concat($users);
        }

        if ($this->filter === 'all' || $this->filter === 'tags') {
            $tags = Tag::where('name', 'like', '%' . $this->query . '%')
                ->limit($tagLimit)
                ->get()
                ->map(function ($tag) {
                    return [
                        'type' => 'tag',
                        'name' => $tag->name,
                        'slug' => $tag->slug,
                        'color' => $tag->color,
                    ];
                });

            $results = $results->concat($tags);
        }

        return $results->shuffle()->values()->all();
    }



    public function render()
    {
        return view('livewire.global-search');
    }
}

