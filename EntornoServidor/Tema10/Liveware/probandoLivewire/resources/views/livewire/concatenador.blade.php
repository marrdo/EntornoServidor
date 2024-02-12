<div>
    <button type="button" wire:click='actualizaCadena' class="dark:text-white">Actualiza</button>
    <button type="button" wire:click='borrarCadena' class="dark:text-white">Borrar</button>
    <p class="dark:text-white">{{$cadena}}</p>
    

    <form action="" wire:submit='actualizaCadena'>
        <input type="text" name="" id="" wire:model.live="cadena">    
        <button type="submit" class="dark:text-white">Envía las cosas</button>
    </form>
</div>
