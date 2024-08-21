<div>
    <x-search-form/>
    <x-authors-card :editors="$editors"/>
    <x-category-card :categories="$categories"/>
    <x-tags-card :tags="$tags"/>
    <x-recent-post :recentPosts="$recentPosts"/>
    <x-social-link/>
</div>
