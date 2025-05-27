<?php

namespace App\Livewire\Tags;

use Livewire\Component;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;
    public $search = '';
    public $perPage = 12;
    public $isLoadingMore = false;

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadMore()
    {
        $this->isLoadingMore = true;
        $this->perPage += 12;
        $this->isLoadingMore = false;
    }


    public function toggleFollow(Tag $tag)
    {
        if (Auth::user()->isFollowedTag($tag)) {
            Auth::user()->followedTags()->detach($tag->id);
        } else {
            Auth::user()->followedTags()->attach($tag->id, ['action' => 'follow']);
        }
    }

    public function toggleHide(Tag $tag)
    {
        if (Auth::user()->isHiddenTag($tag)) {
            Auth::user()->hiddenTags()->detach($tag->id);
        } else {
            // Detach if already followed (optional, depending on your logic)
            Auth::user()->followedTags()->detach($tag->id);

            Auth::user()->hiddenTags()->detach($tag->id); // Ensure no conflict
            Auth::user()->hiddenTags()->attach($tag->id, ['action' => 'hide']);
        }
    }


    public function render()
    {
        $tags = Tag::withCount('posts')
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderByDesc('posts_count')
            ->paginate($this->perPage);

        return view('livewire.tags.index', ['tags' => $tags]);
    }
}