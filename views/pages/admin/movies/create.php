<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\System\Session $session
 */
?>
<?php $view->component('head')?>
<p>CREATE MOVIE PAGE</p>
<br>
<form action="/admin/movies/create" method="POST">
    <div>
        <input type="text" name="title" placeholder="Title">
        <?php if ($session->has('title')) {
            foreach ($session->getFlash('title') as $errorMessage) {?>
                <li style="color: red"><?= $errorMessage ?></li>
            <?php }
        }?>
    </div>
    <br>
    <div>
        <button type="submit">SEND</button>
    </div>
</form>

<?php $view->component('end')?>
