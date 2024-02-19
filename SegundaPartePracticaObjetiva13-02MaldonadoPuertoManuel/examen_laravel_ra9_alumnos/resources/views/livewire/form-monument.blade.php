<div>
    <form action="" method="">
        <label for="contador"></label><br>
        <input type="number" id="contador" wire:model="counter"><br>
        <button wire:click="incrementar" class="text-white">Sumar</button><br>
        <button wire:click="decrementar" class="text-white">Restar</button>
    </form>
</div>