<div>
    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <input type="text" wire:model="target" class="form-control">
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
    <h3>Output</h3>
    <pre>
{{ $output }}
</pre>
</div>
