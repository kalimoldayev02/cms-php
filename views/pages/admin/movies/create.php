<?php
/**
 * @var \App\Kernel\View\View $view
 */
?>
<?php $view->component('head')?>
<p>CREATE MOVIE PAGE</p>
<br>
<form action="/admin/movies/create" method="POST">
    <div>
        <input type="text" name="title" placeholder="Title">
    </div>
    <br>
    <div>
        <button type="submit">SEND</button>
    </div>
</form>

<?php $view->component('end')?>
