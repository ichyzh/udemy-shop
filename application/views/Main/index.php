<h1>Hello</h1>
<p><?php echo $name?></p>
<p><?=$age?></p>
<?php debug($names); ?>
<?php foreach($posts as $post): ?>
    <h3><?=$post->title?></h3>
<?php endforeach; ?>
