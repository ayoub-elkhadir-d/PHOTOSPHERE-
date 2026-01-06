<!-- <?php
namespace App\Traits;

trait TaggableTrait
{
    protected array $tags = [];
    protected bool $tagsLoaded = false;

    protected function normalizeTag(string $tag): string
    {
        return strtolower(trim($tag));
    }

    protected function loadTagsFromDatabase(): void
    {
        if ($this->tagsLoaded) {
            return;
        }

        // مثال للتحميل (lazy load)
        // يجب تغييره حسب طريقة التخزين لديك
        $this->tags = $this->tagsRelation()->pluck('name')->toArray();

        $this->tagsLoaded = true;
    }

    public function addTag(string $tag): void
    {
        $this->loadTagsFromDatabase();
        $tag = $this->normalizeTag($tag);

        if (!in_array($tag, $this->tags)) {
            $this->tags[] = $tag;
        }
    }

    public function removeTag(string $tag): void
    {
        $this->loadTagsFromDatabase();
        $tag = $this->normalizeTag($tag);

        $this->tags = array_filter($this->tags, fn($t) => $t !== $tag);
    }

    public function getTags(): array
    {
        $this->loadTagsFromDatabase();
        return $this->tags;
    }

    public function hasTag(string $tag): bool
    {
        $this->loadTagsFromDatabase();
        return in_array($this->normalizeTag($tag), $this->tags);
    }

    public function clearTags(): void
    {
        $this->loadTagsFromDatabase();
        $this->tags = [];
    }

    // Utilitaires
    public function hasAllTags(array $tags): bool
    {
        $this->loadTagsFromDatabase();
        foreach ($tags as $tag) {
            if (!$this->hasTag($tag)) {
                return false;
            }
        }
        return true;
    }

    public function hasAnyTag(array $tags): bool
    {
        $this->loadTagsFromDatabase();
        foreach ($tags as $tag) {
            if ($this->hasTag($tag)) {
                return true;
            }
        }
        return false;
    }
} -->