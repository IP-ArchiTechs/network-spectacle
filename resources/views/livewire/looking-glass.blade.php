<div>
    <form wire:submit.prevent="submit">
        <div class="form-check">
            <input wire:model="router_action" class="form-check-input" type="radio" name="router_action"
                   id="router_action_ping" value="ping">
            <label class="form-check-label" for="router_action_ping">
                Ping
            </label>
        </div>
        <div class="form-check">
            <input wire:model="router_action" class="form-check-input" type="radio" name="router_action"
                   id="router_action_traceroute"
                   value="traceroute">
            <label class="form-check-label" for="router_action_traceroute">
                Traceroute
            </label>
        </div>
        <div class="mb-3">
            <input type="text" wire:model="target" class="form-control">
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
    <h3>Outputs</h3>
    <div>
        @foreach($outputs as $output)
            <div class="bg-dark text-white p-2 mb-2">
                <pre>
{{ $output }}
            </pre>
            </div>
        @endforeach
    </div>
</div>
