<?php
$queryParams = $_GET;
unset($queryParams['page']);

function buildQueryString(array $params, $page): string {
  $params['page'] = $page;
  return http_build_query($params);
}
?>
<?php if($totalPages > 1): ?>
  <nav>
    <ul>
      <?php for($i = 1; $i <= $totalPages; $i++): ?>
        <li>
          <?php if ($i == $currentPage): ?>
            <span><?= $i ?></span>
          <?php else: ?>
            <a href="?<?= buildQueryString($queryParams, $i) ?>">
              <?= $i ?>
            </a>
          <?php endif; ?>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
<?php endif; ?>