<section class="briefs summaries">
  <?php $articles = $site->grandChildren()->visible()->sortBy('date', 'desc')->paginate(12) ?>
  <?php foreach($articles as $article): ?>
  
    <?php if ($article->parent()->slug() == "episode"): ?>
      <!-- EPISODE BRIEF -->
      <article class="episode brief">
        <header>
          <h2 class="title">
            <a href="<?php echo $article->url() ?>">
              <span class="name">
                <?php echo html($article->title()) ?>
              </span>
            </a>
          </h2>
          <time class="published released">
            <span class="date">
              <?php echo date('l, F jS Y', $article->date()) ?>
            </span>
            @
            <span class="time">
              <?php echo date("g:ia", strtotime($article->time())) ?>
            </span>
          </time>
        </header>
        <?php if($image = $article->image()): ?>
          <a class="image-holder" href="<?php echo $article->url() ?>" title="<?php echo html($article->title()) ?>">
            <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
            <?php if ($article->tags() != ""):
              $etags = explode(",", $article->tags());
            ?>
              <div class="hover-cover">
                <ul class="tags">
                  <?php foreach($etags as $etag): ?>
                  <li><?php echo $etag ?></li>
                  <?php endforeach ?>
                </ul>
              </div>
            <?php endif ?>
          </a>
        <?php endif ?>
        <summary>
          <?php if ($article->cast() != ""):
            $persons = explode(",", $article->cast());
          ?>
            <ul class="cast ridiculists">
              <?php foreach($persons as $person): ?>
                <li><?php echo $person ?></li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
          <div class="content">
            <p><?php echo excerpt($article->text(), 222) ?></p>
          </div>
        </summary>
        <span class="episode-number"><?php echo $article->uid(); ?></span>
        <a class="disqus-comment-count" href="<?php echo $article->url() ?>#disqus_thread" data-disqus-identifier="<?php echo $article->uri(); ?>"></a>
      </article>
    <?php endif ?>
    <?php if ($article->parent()->slug() == "also-made"): ?>
      <!-- ALSO MADE BRIEF -->
      <article class="also-made brief">
        <header>
          <h2 class="title">
            <a href="<?php echo $article->url() ?>">
              <?php echo html($article->title()) ?>
            </a>
          </h2>
          <time class="published released">
            <span class="date">
              <?php echo date('l, F jS Y', $article->date()) ?>
            </span>
            @
            <span class="time">
              <?php echo date("g:ia", strtotime($article->time())) ?>
            </span>
          </time>
        </header>
        <?php if($image = $article->image()): ?>
          <a class="image-holder" href="<?php echo $article->url() ?>" title="<?php echo $article->title(); ?>">
            <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
            <?php if ($article->tags() != ""):
              $etags = explode(",", $article->tags());
            ?>
              <div class="hover-cover">
                <ul class="tags">
                  <?php foreach($etags as $etag): ?>
                  <li><?php echo $etag ?></li>
                  <?php endforeach ?>
                </ul>
              </div>
            <?php endif ?>
          </a>
        <?php endif ?>
        <summary>
          <?php if ($article->cast() != ""):
            $persons = explode(",", $article->cast());
          ?>
            <ul class="cast authors">
              <?php foreach($persons as $person): ?>
                <li><?php echo $person ?></li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
          <div class="content">
            <p><?php echo excerpt($article->text(), 222) ?></p>
          </div>
        </summary>
        <a class="disqus-comment-count" href="<?php echo $article->url() ?>#disqus_thread" data-disqus-identifier="<?php echo $article->uri(); ?>"></a>
      </article>
    <?php endif ?>
    <?php if ($article->parent()->slug() == "wrote"): ?>
      <!-- WROTE BRIEF -->
      <article class="wrote brief">
        <header>
          <h2 class="title">
            <a href="<?php echo $article->url() ?>">
              <?php echo html($article->title()) ?>
            </a>
          </h2>
          <time class="published released">
            <span class="date">
              <?php echo date('l, F jS Y', $article->date()) ?>
            </span>
            @
            <span class="time">
              <?php echo date("g:ia", strtotime($article->time())) ?>
            </span>
          </time>
        </header>
        <?php if($image = $article->image()): ?>
          <a class="image-holder" href="<?php echo $article->url() ?>" title="<?php echo $article->title(); ?>">
            <img src="<?php echo $article->url() ?>/<?php echo $image->filename() ?>" class="cover" alt="<?php echo $article->title(); ?>" />
            <?php if ($article->tags() != ""):
              $etags = explode(",", $article->tags());
            ?>
              <div class="hover-cover">
                <ul class="tags">
                  <?php foreach($etags as $etag): ?>
                  <li><?php echo $etag ?></li>
                  <?php endforeach ?>
                </ul>
              </div>
            <?php endif ?>
          </a>
        <?php endif ?>
        <summary>
          <?php if ($article->cast() != ""):
            $persons = explode(",", $article->cast());
          ?>
            <ul class="cast ridiculists authors">
              <?php foreach($persons as $person): ?>
              <li><?php echo $person ?></li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
          <?php if ($article->author() != ""): ?>
            <div class="author-block">
              by: 
              <span class="author"><?php echo $article->author() ?></span>
            </div>
          <?php endif ?>
          <div class="content">
            <p><?php echo excerpt($article->text(), 222) ?></p>
          </div>
					<span class="time-estimate"><?php echo $article->text()->readingtime() ?></span>
          <a class="disqus-comment-count" href="<?php echo $article->url() ?>#disqus_thread" data-disqus-identifier="<?php echo $article->uri(); ?>"></a>
        </summary>
      </article>
    <?php endif ?>
  <?php endforeach ?>
</section>

<?php if($articles->pagination()->hasPages()): ?>
  <nav class="pagination">
    
    <?php if($articles->pagination()->hasPrevPage()) { ?>
      <a class="prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">
        <svg class="mobile-only" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
          <title>Previous Page</title>
          <path d="M202.8 159.4H223c3.6 0 6.9.3 10 1 3 .7 5.6 1.8 7.7 3.3 2.1 1.5 3.8 3.5 4.9 6 1.2 2.5 1.8 5.5 1.8 9.2 0 3.5-.6 6.5-1.8 9.1-1.2 2.6-2.8 4.7-5 6.3-2.1 1.7-4.7 2.9-7.7 3.8-3 .8-6.3 1.3-9.9 1.3h-11.9v26.2h-8.4v-66.2zm19.2 33c5.8 0 10-1.1 12.8-3.3 2.8-2.2 4.2-5.6 4.2-10.3 0-4.8-1.4-8.1-4.2-9.9-2.8-1.8-7.1-2.8-12.8-2.8h-10.9v26.3H222zM313.1 225.5l-15.9-27.9h-12v27.9h-8.4v-66h20.6c3.4 0 6.5.3 9.3 1 2.9.6 5.3 1.7 7.3 3.2 2 1.5 3.6 3.4 4.8 5.7 1.1 2.4 1.7 5.2 1.7 8.7 0 5.2-1.3 9.3-4 12.4-2.7 3.1-6.3 5.2-10.8 6.3l16.7 28.8h-9.3zm-27.9-34.8h11.1c5.2 0 9.1-1.1 11.9-3.2 2.8-2.1 4.1-5.3 4.1-9.6 0-4.4-1.4-7.4-4.1-9.2-2.8-1.7-6.7-2.6-11.9-2.6h-11.1v24.6zM351.5 159.4h38.1v7h-29.7v20.7H385v7.1h-25.1v24h30.7v7.1h-39.1v-65.9zM411.6 159.4h9l10.6 35.6c1.2 4 2.3 7.6 3.2 11 .9 3.4 2 7 3.3 10.9h.4c1.2-3.9 2.3-7.5 3.2-10.9.9-3.4 2-7 3.1-11l10.6-35.6h8.6l-20.9 66h-9.8l-21.3-66z"/>
          <path d="M202.3 273.4h20.2c3.6 0 6.9.3 10 1 3 .7 5.6 1.8 7.7 3.3 2.1 1.5 3.8 3.5 4.9 6 1.2 2.5 1.8 5.5 1.8 9.2 0 3.5-.6 6.5-1.8 9.1-1.2 2.6-2.8 4.7-5 6.3-2.1 1.7-4.7 2.9-7.7 3.8-3 .8-6.3 1.3-9.9 1.3h-11.9v26.2h-8.4v-66.2zm19.2 33c5.8 0 10-1.1 12.8-3.3 2.8-2.2 4.2-5.6 4.2-10.3 0-4.8-1.4-8.1-4.2-9.9-2.8-1.8-7.1-2.8-12.8-2.8h-10.9v26.3h10.9zM301.5 319.3h-24.1l-6.3 20.1h-8.6l22.3-66h9.5l22.3 66h-9l-6.1-20.1zm-2.1-6.8l-3.1-10.1c-1.2-3.7-2.4-7.4-3.4-11-1.1-3.7-2.1-7.4-3.2-11.2h-.4c-1 3.8-2 7.6-3.1 11.2-1.1 3.7-2.2 7.3-3.4 11l-3.1 10.1h19.7zM337.4 306.4c0-5.3.8-10.1 2.3-14.3 1.5-4.2 3.6-7.8 6.3-10.8s5.9-5.2 9.6-6.8c3.7-1.6 7.8-2.4 12.2-2.4 4.6 0 8.4.9 11.4 2.6 3.1 1.7 5.6 3.6 7.5 5.6l-4.7 5.3c-1.7-1.7-3.6-3.2-5.8-4.4-2.2-1.2-5-1.8-8.3-1.8-3.4 0-6.4.6-9.1 1.9-2.7 1.2-5 3-6.8 5.3-1.9 2.3-3.3 5.1-4.4 8.4-1 3.3-1.6 7-1.6 11.1 0 4.2.5 7.9 1.5 11.2 1 3.3 2.4 6.2 4.2 8.5 1.8 2.4 4.1 4.2 6.8 5.4 2.7 1.3 5.9 1.9 9.4 1.9 2.3 0 4.6-.4 6.7-1.1 2.1-.7 3.8-1.7 5.2-2.9v-17.2h-14V305h21.6v28c-2.1 2.2-5 4-8.5 5.5s-7.5 2.2-11.9 2.2-8.4-.8-12-2.3-6.7-3.8-9.4-6.7c-2.6-2.9-4.7-6.5-6.1-10.8-1.4-4.3-2.1-9.1-2.1-14.5zM419.4 273.4h38.1v7h-29.7v20.7h25.1v7.1h-25.1v24h30.7v7.1h-39.1v-65.9z"/>
          <path d="M250 463.3c-1 0-2-.4-2.8-1.2L37.9 252.8c-1.6-1.6-1.6-4.1 0-5.7L247.2 37.9c1.6-1.6 4.1-1.6 5.7 0 1.6 1.6 1.6 4.1 0 5.7L46.4 250l206.4 206.4c1.6 1.6 1.6 4.1 0 5.7-.8.8-1.8 1.2-2.8 1.2z" id="Layer_6"/>
        </svg>
        <svg class="desktop-only" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 100">
          <title>Previous Page</title>
          <path d="M63.3 35.5h9.6c1.7 0 3.3.2 4.8.5 1.4.3 2.7.8 3.7 1.6 1 .7 1.8 1.7 2.4 2.9.6 1.2.8 2.6.8 4.4 0 1.7-.3 3.1-.8 4.3-.6 1.2-1.4 2.2-2.4 3-1 .8-2.2 1.4-3.7 1.8-1.4.4-3 .6-4.7.6h-5.7V67h-4V35.5zm9.1 15.7c2.8 0 4.8-.5 6.1-1.6 1.3-1 2-2.7 2-4.9 0-2.3-.7-3.8-2-4.7-1.3-.9-3.4-1.3-6.1-1.3h-5.2v12.5h5.2zM108.2 67l-7.6-13.3h-5.7V67h-4V35.5h9.8c1.6 0 3.1.2 4.4.5 1.4.3 2.5.8 3.5 1.5s1.7 1.6 2.3 2.7c.5 1.1.8 2.5.8 4.1 0 2.5-.6 4.4-1.9 5.9-1.3 1.5-3 2.5-5.1 3l8 13.7h-4.5zM94.9 50.4h5.3c2.5 0 4.4-.5 5.7-1.5 1.3-1 2-2.5 2-4.6 0-2.1-.7-3.5-2-4.4-1.3-.8-3.2-1.2-5.7-1.2h-5.3v11.7zM118.8 35.5H137v3.4h-14.2v9.9h12v3.4h-12v11.4h14.6V67h-18.6V35.5zM139.8 35.5h4.3l5 17c.6 1.9 1.1 3.6 1.5 5.2.4 1.6 1 3.3 1.6 5.2h.2c.6-1.9 1.1-3.6 1.5-5.2.4-1.6.9-3.3 1.5-5.2l5-17h4.1l-10 31.5h-4.7l-10-31.5zM178.5 35.5h9.6c1.7 0 3.3.2 4.8.5 1.4.3 2.7.8 3.7 1.6 1 .7 1.8 1.7 2.4 2.9.6 1.2.8 2.6.8 4.4 0 1.7-.3 3.1-.8 4.3-.6 1.2-1.4 2.2-2.4 3-1 .8-2.2 1.4-3.7 1.8-1.4.4-3 .6-4.7.6h-5.7V67h-4V35.5zm9.2 15.7c2.8 0 4.8-.5 6.1-1.6 1.3-1 2-2.7 2-4.9 0-2.3-.7-3.8-2-4.7-1.3-.9-3.4-1.3-6.1-1.3h-5.2v12.5h5.2zM218.2 57.4h-11.5l-3 9.6h-4.1l10.7-31.5h4.5L225.4 67h-4.3l-2.9-9.6zm-1-3.3l-1.5-4.8c-.6-1.8-1.1-3.5-1.6-5.3-.5-1.7-1-3.5-1.5-5.4h-.2l-1.5 5.4c-.5 1.7-1.1 3.5-1.6 5.3l-1.5 4.8h9.4zM227.6 51.2c0-2.5.4-4.8 1.1-6.8s1.7-3.7 3-5.1c1.3-1.4 2.8-2.5 4.6-3.2 1.8-.8 3.7-1.1 5.8-1.1 2.2 0 4 .4 5.4 1.2 1.5.8 2.6 1.7 3.6 2.7l-2.3 2.5c-.8-.8-1.7-1.5-2.8-2.1-1-.6-2.4-.8-4-.8s-3 .3-4.3.9c-1.3.6-2.4 1.4-3.3 2.5-.9 1.1-1.6 2.4-2.1 4s-.7 3.3-.7 5.3.2 3.8.7 5.4c.5 1.6 1.1 2.9 2 4.1.9 1.1 2 2 3.3 2.6 1.3.6 2.8.9 4.5.9 1.1 0 2.2-.2 3.2-.5s1.8-.8 2.5-1.4V54h-6.7v-3.3h10.3v13.2c-1 1.1-2.4 1.9-4.1 2.6-1.7.7-3.6 1-5.7 1s-4-.4-5.7-1.1c-1.7-.7-3.2-1.8-4.5-3.2-1.2-1.4-2.2-3.1-2.9-5.1-.6-2-.9-4.3-.9-6.9zM259 35.5h18.1v3.4H263v9.9h12v3.4h-12v11.4h14.6V67H259V35.5z"/>
          <path d="M60.6 90.2c-.5 0-1-.2-1.4-.6L21 51.4c-.8-.8-.8-2 0-2.8l38.2-38.2c.8-.8 2-.8 2.8 0 .8.8.8 2 0 2.8L25.2 49.9 62 86.7c.8.8.8 2 0 2.8-.3.5-.8.7-1.4.7z"/>
        </svg>
      </a>
    <?php } else { ?>
      <div class="prev"></div>
    <?php } ?>
    
    <?php if($articles->pagination()->hasNextPage()): ?>
      <a class="next" href="<?php echo $articles->pagination()->nextPageURL() ?>">
        <svg class="mobile-only" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500">
          <title>Next Page</title>
          <path d="M250 463.3c-1 0-2-.4-2.8-1.2-1.6-1.6-1.6-4.1 0-5.7L453.6 250 247.2 43.6c-1.6-1.6-1.6-4.1 0-5.7 1.6-1.6 4.1-1.6 5.7 0l209.3 209.3c1.6 1.6 1.6 4.1 0 5.7L252.8 462.1c-.8.8-1.8 1.2-2.8 1.2z" id="Layer_2"/>
          <path d="M42.5 157.4h8.7L75 198.9l7.1 13.7h.4c-.2-3.4-.4-6.8-.7-10.4-.2-3.6-.4-7.1-.4-10.6v-34.1h8v66h-8.7l-24-41.6-7.1-13.6h-.4c.3 3.4.5 6.8.8 10.2.2 3.5.4 6.9.4 10.4v34.5h-8v-66zM123.7 157.4h38.1v7h-29.7v20.7h25.1v7.1h-25.1v24h30.7v7.1h-39.1v-65.9zM204.6 189.3l-17.9-31.9h9.3l9 16.9c.9 1.5 1.7 3 2.5 4.5.8 1.4 1.7 3.1 2.7 5.1h.4c.9-1.9 1.8-3.6 2.5-5.1.7-1.4 1.5-2.9 2.3-4.5l8.8-16.9h8.9l-18 32.3 19.2 33.7H225l-9.7-17.8c-.9-1.6-1.8-3.3-2.7-5-.9-1.7-1.9-3.6-3-5.6h-.6c-.9 2-1.8 3.9-2.7 5.6-.9 1.7-1.7 3.4-2.5 5l-9.6 17.8h-8.9l19.3-34.1zM272.3 164.5h-19.9v-7h48.3v7h-19.9v59h-8.5v-59z"/>
          <path d="M42.5 275.4h20.2c3.6 0 6.9.3 10 1 3 .7 5.6 1.8 7.7 3.3 2.1 1.5 3.8 3.5 4.9 6 1.2 2.5 1.8 5.5 1.8 9.2 0 3.5-.6 6.5-1.8 9.1-1.2 2.6-2.8 4.7-5 6.3-2.1 1.7-4.7 2.9-7.7 3.8-3 .8-6.3 1.3-9.9 1.3H50.8v26.2h-8.4v-66.2zm19.2 33c5.8 0 10-1.1 12.8-3.3 2.8-2.2 4.2-5.6 4.2-10.3 0-4.8-1.4-8.1-4.2-9.9-2.8-1.8-7.1-2.8-12.8-2.8H50.8v26.3h10.9zM141.7 321.3h-24.1l-6.3 20.1h-8.6l22.3-66h9.5l22.3 66h-9l-6.1-20.1zm-2.1-6.8l-3.1-10.1c-1.2-3.7-2.4-7.4-3.4-11-1.1-3.7-2.1-7.4-3.2-11.2h-.4c-1 3.8-2 7.6-3.1 11.2-1.1 3.7-2.2 7.3-3.4 11l-3.1 10.1h19.7zM177.6 308.4c0-5.3.8-10.1 2.3-14.3 1.5-4.2 3.6-7.8 6.3-10.8 2.7-3 5.9-5.2 9.6-6.8 3.7-1.6 7.8-2.4 12.2-2.4 4.6 0 8.4.9 11.4 2.6 3.1 1.7 5.6 3.6 7.5 5.6l-4.7 5.3c-1.7-1.7-3.6-3.2-5.8-4.4-2.2-1.2-5-1.8-8.3-1.8-3.4 0-6.4.6-9.1 1.9-2.7 1.2-5 3-6.8 5.3-1.9 2.3-3.3 5.1-4.4 8.4-1 3.3-1.6 7-1.6 11.1 0 4.2.5 7.9 1.5 11.2 1 3.3 2.4 6.2 4.2 8.5 1.8 2.4 4.1 4.2 6.8 5.4 2.7 1.3 5.9 1.9 9.4 1.9 2.3 0 4.6-.4 6.7-1.1 2.1-.7 3.8-1.7 5.2-2.9v-17.2h-14V307h21.6v28c-2.1 2.2-5 4-8.5 5.5s-7.5 2.2-11.9 2.2-8.4-.8-12-2.3-6.7-3.8-9.4-6.7c-2.6-2.9-4.7-6.5-6.1-10.8-1.4-4.3-2.1-9.1-2.1-14.5zM259.6 275.4h38.1v7H268v20.7h25v7.1h-25v24h30.7v7.1h-39.1v-65.9z"/>
        </svg>
        <svg class="desktop-only" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 100">
          <title>Next Page</title>
          <path d="M238.9 90.2c-.5 0-1-.2-1.4-.6-.8-.8-.8-2 0-2.8L274.3 50l-36.8-36.8c-.8-.8-.8-2 0-2.8.8-.8 2-.8 2.8 0l38.2 38.2c.8.8.8 2 0 2.8l-38.2 38.2c-.4.4-.9.6-1.4.6zM21.9 35.5H26l11.4 19.8 3.4 6.5h.2c-.1-1.6-.2-3.3-.3-5-.1-1.7-.2-3.4-.2-5.1V35.5h3.8V67h-4.1L28.7 47.1l-3.4-6.5h-.2c.1 1.6.2 3.2.4 4.9.1 1.6.2 3.3.2 5V67h-3.8V35.5zM52.9 35.5H71v3.4H56.9v9.9h12v3.4h-12v11.4h14.6V67H52.9V35.5zM83.8 50.7l-8.5-15.2h4.4l4.3 8.1 1.2 2.1c.4.7.8 1.5 1.3 2.4h.2c.4-.9.8-1.7 1.2-2.4.3-.7.7-1.4 1.1-2.1l4.2-8.1h4.2l-8.6 15.4 9 16.1h-4.4l-4.6-8.5c-.4-.8-.8-1.6-1.3-2.4-.4-.8-.9-1.7-1.4-2.7h-.2c-.4 1-.9 1.8-1.3 2.7l-1.2 2.4-4.6 8.5h-4.2l9.2-16.3zM108.4 38.8h-9.5v-3.4h23v3.4h-9.5V67h-4V38.8zM137.3 35.5h9.6c1.7 0 3.3.2 4.8.5 1.4.3 2.7.8 3.7 1.6 1 .7 1.8 1.7 2.4 2.9.6 1.2.8 2.6.8 4.4 0 1.7-.3 3.1-.8 4.3-.6 1.2-1.4 2.2-2.4 3-1 .8-2.2 1.4-3.7 1.8-1.4.4-3 .6-4.7.6h-5.7V67h-4V35.5zm9.2 15.7c2.8 0 4.8-.5 6.1-1.6 1.3-1 2-2.7 2-4.9 0-2.3-.7-3.8-2-4.7-1.3-.9-3.4-1.3-6.1-1.3h-5.2v12.5h5.2zM177 57.4h-11.5l-3 9.6h-4.1L169 35.5h4.5L184.2 67h-4.3l-2.9-9.6zm-1-3.3l-1.5-4.8c-.6-1.8-1.1-3.5-1.6-5.3-.5-1.7-1-3.5-1.5-5.4h-.2l-1.5 5.4c-.5 1.7-1.1 3.5-1.6 5.3l-1.5 4.8h9.4zM186.4 51.2c0-2.5.4-4.8 1.1-6.8s1.7-3.7 3-5.1c1.3-1.4 2.8-2.5 4.6-3.2 1.8-.8 3.7-1.1 5.8-1.1 2.2 0 4 .4 5.4 1.2 1.5.8 2.6 1.7 3.6 2.7l-2.3 2.5c-.8-.8-1.7-1.5-2.8-2.1-1-.6-2.4-.8-4-.8s-3 .3-4.3.9c-1.3.6-2.4 1.4-3.3 2.5-.9 1.1-1.6 2.4-2.1 4s-.7 3.3-.7 5.3.2 3.8.7 5.4c.5 1.6 1.1 2.9 2 4.1.9 1.1 2 2 3.3 2.6 1.3.6 2.8.9 4.5.9 1.1 0 2.2-.2 3.2-.5s1.8-.8 2.5-1.4v-8.2H200v-3.3h10.3V64c-1 1.1-2.4 1.9-4.1 2.6-1.7.7-3.6 1-5.7 1s-4-.4-5.7-1.1c-1.7-.7-3.2-1.8-4.5-3.2-1.2-1.4-2.2-3.1-2.9-5.1-.7-2.1-1-4.4-1-7zM217.8 35.5H236v3.4h-14.2v9.9h12v3.4h-12v11.4h14.6V67h-18.6V35.5z"/>
        </svg>
      </a>
    <?php endif ?>
    
  </nav>
<?php endif ?>