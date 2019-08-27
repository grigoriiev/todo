<nav class="pagination" role="navigation" aria-label="pagination">
<li class="page-item">
    <a href="<?=$paginator->getPrevUrl()?>" class="page-link"
       <?php if(!$paginator->getPrevUrl()):?> disabled <?php endif;?>
    >Предыдущая</a>
	</li>
    <?php foreach ($paginator->getPages() as $page): ?>
        <?php if ($page['url']): ?>
            <li  class="page-item">
                <a class="pagination-link <?php echo $page['isCurrent'] ? 'is-current' : ''; ?>" href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
            </li>
        <?php else: ?>
            <li  class="page-item"><span><?php echo $page['num']; ?></span></li>
        <?php endif; ?>
    <?php endforeach; ?>
   <li class="page-item">
    <a href="<?=$paginator->getNextUrl()?>" class="page-link"
        <?php if(!$paginator->getNextUrl()):?> disabled <?php endif;?>
    >Следующая</a>
</li>
    
</nav>