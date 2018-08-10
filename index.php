<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blagir</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <header>
        <div>
            <div class="logo" onclick="location.href='/'">Blagir</div>
            <form id="search" action="/">
                <input type="text" name="search" placeholder="search">
                <img class="icon" src="/svg/search.svg" alt="to find!" onclick="document.getElementById('search').submit()">
            </form>
        </div>
    </header>
    <div class="holder"></div>
    <div id="content">
        <? for ($i = 0; $i < 60; $i++): ?>
            <div class="post">
                <div class="time"><?= random_int(1, 20) ?> may</div>
                <? $authors = array('bozat', 'nekosora', 'zodrax', 'kawai', 'kitty'); ?>
                <? $author = $authors[random_int(0, count($authors) - 1)]; ?>
                <div class="author"><a href="?author=<?= $author ?>">@<?= $author ?></a></div>
                <? $img = random_int(0, 9); ?>
                <? if ($img !== 0): ?>
                    <img src="/img/<?= $img ?>.jpg" style="width: 100%;">
                <? endif; ?>
                <div class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Adipisci ea, recusandae dignissimos corrupti consequatur consectetur vitae iure eligendi
                    earum deserunt iusto dolores!
                </div>
                <div class="tags">
                    <? $tags = array('nature', 'photo', 'walking', 'traveling') ?>
                    <? foreach ($tags as $tag): ?><a class="tag" href="/?tag=<?= $tag ?>"><?= $tag ?></a><? endforeach; ?>
                </div>
            </div>
        <? endfor; ?>
    </div>
    <script src="/main.js"></script>
</body>
</html>