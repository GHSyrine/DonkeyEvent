<h1><?=$data->getName()?></h1>
<img src="<?=$data->getImage() ?? "" ?>" title="" alt="" height="300px"/>
<p>
    <?=$data->getDescription()?>
    <hr>
    <span>Date de réalisation:  <?=$data->getReleaseDate() ?? ""?></span>
</p>

