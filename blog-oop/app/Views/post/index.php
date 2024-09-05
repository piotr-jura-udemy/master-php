<h2>All Posts</h2>

<form action="" method="GET">
  <input text="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search posts..."/>
  <button>Search</button>
</form>

<?= partial('_posts', ['posts' => $posts]) ?>

<?= partial('_pagination', ['currentPage' => $currentPage, 'totalPages' => $totalPages]) ?>