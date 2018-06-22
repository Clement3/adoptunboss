<form method="POST" action='<?= $helper->base_url('event/'.$event['id'].'/delete')?>'>
    
    <p><label>Etes vous sur de vouloir supprimer ? </label></p>
    <p><input type ='submit' value="Supprimer" id='submit'/></p>
</form>