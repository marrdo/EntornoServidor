<div>
    <form action="" method="">
        <label for="contador"></label><br>
        <input type="number" id="contador" wire:model="counter"><br>
        <button wire:click="incrementar" class="text-white" type="button">Sumar</button><br>
        <button wire:click="decrementar" class="text-white" type="button">Restar</button>
    </form>
</div>